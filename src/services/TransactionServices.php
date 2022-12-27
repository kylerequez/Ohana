<?php
include_once dirname(__DIR__) . '/config/app-config.php';
include_once dirname(__DIR__) . '/models/Cart.php';
class TransactionServices
{
    private ?TransactionDAO $dao = null;
    private ?OrderDAO $order = null;
    private ?PetProfileDAO $petProfile = null;
    private ?StudHistoryDAO $studHistory = null;
    private ?BoardingSlotDAO $slot = null;

    public function __construct(TransactionDAO $dao, OrderDAO $order, ?PetProfileDAO $petProfile, ?StudHistoryDAO $studHistory, ?BoardingSlotDAO $slot)
    {
        $this->dao = $dao;
        $this->order = $order;
        $this->petProfile = $petProfile;
        $this->studHistory = $studHistory;
        $this->slot = $slot;
    }

    public function uploadProofOfPayment(string $id, array $data): bool
    {
        $image = $data['image'];
        if (!$this->dao->uploadProofOfPayment($id, $image)) {
            $_SESSION['msg'] = "There was an error in uploading the proof of payment. Please try again.";
            return false;
        }
        $_SESSION['msg'] = "You have successfully uploaded the proof of payment for the transaction.";
        return true;
    }

    public function proceedToUpload(string $reference, array $data): void
    {
        if ($data['mode'] == 'CASH') {
            $this->completeTransaction($reference, $data);
        } else if ($data['mode'] == 'BANK TRANSFER' || $data['mode'] == 'GCASH') {
            header("Location:  https://" . DOMAIN_NAME . "/upload-proof?reference=$reference&mode=" . trim($data['mode']));
        } else {
            $_SESSION['msg'] = "There was an error in selecting the mode of payment.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }

    public function completeTransaction(string $reference, array $data): void
    {
        date_default_timezone_set('Asia/Manila');
        $user = unserialize($_SESSION['user']);
        $cart = unserialize($_SESSION['cart']);
        $price = $cart->getTotal();
        $image = isset($data['image']) ? $data['image'] : null;
        $transaction = new Transaction($user->getId(), $reference, $price, new DateTime("now"), "PENDING", $image, trim($data['mode']));
        if (!$this->dao->addTransaction($transaction)) {
            $_SESSION['msg'] = "There was an error in adding the transaction in the database. SQL Error.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        $id = $this->dao->searchTransactionIdByReference($reference);
        $orders = $cart->getListOfOrders();
        foreach ($orders as $order) {
            $order->setTransactionId($id);
            if (!$this->order->addOrder($order)) {
                $_SESSION['msg'] = "There was an error in adding the order in the database. SQL Error.";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                if (!$this->petProfile->setStatusToSold($order->getPetId())) {
                    $_SESSION['msg'] = "There was an error in updating the pet profile in the database. SQL Error.";
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }
        }
        $cart->emptyCart();
        $_SESSION['cart'] = serialize($cart);
        header("Location: https://" . DOMAIN_NAME . "/invoice/$reference");
    }

    public function proceedToCheckout(array $data): bool
    {
        $stud = $data['studReference'];
        $partner = $data['partnerReference'];
        $choice = $data['petBoardingChoice'];
        $id = isset($data['slotId']) ? $data['slotId'] : null;

        $_SESSION['studReference'] = $stud;
        $_SESSION['partnerReference'] = $partner;
        $_SESSION['petBoardingChoice'] = $choice;
        $_SESSION['id'] = $id;
        return true;
    }

    public function proceedToUploadStud(string $reference, array $data): void
    {
        if ($data['mode'] == 'CASH') {
            $this->completeTransactionStud($reference, $data);
        } else if ($data['mode'] == 'BANK TRANSFER' || $data['mode'] == 'GCASH') {
            header("Location:  https://" . DOMAIN_NAME . "/upload-proof?reference=$reference&mode=" . trim($data['mode']) . "&from=STUD");
        } else {
            $_SESSION['msg'] = "There was an error in selecting the mode of payment.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }

    public function completeTransactionStud(string $reference, array $data): void
    {
        date_default_timezone_set('Asia/Manila');

        $user = unserialize($_SESSION['user']);
        $maleId = $_SESSION['studReference'];
        $femaleId = $_SESSION['partnerReference'];
        $choice = $_SESSION['petBoardingChoice'];
        $id = $_SESSION['id'];

        $profile = $this->petProfile->getPetByReference($maleId);
        $image = $profile->getImage();
        $price = $profile->getPrice();

        $transaction = new Transaction($user->getId(), $reference, $price, new DateTime("now"), "PENDING", $image, trim($data['mode']));
        if (!$this->dao->addTransaction($transaction)) {
            $_SESSION['msg'] = "There was an error in adding the transaction in the database. SQL Error.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        $order = new Order("STUD", $this->dao->searchTransactionIdByReference($reference), $profile->getId(), $profile->getName(), $image, $profile->getPrice());
        if (!$this->order->addOrder($order)) {
            $_SESSION['msg'] = "There was an error in adding the order in the database. SQL Error.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        $record = new StudHistory((int)$maleId, (int)$femaleId, null, "SCHEDULED");
        if (!$this->studHistory->addRecord($record)) {
            $_SESSION['msg'] = "There was an error in adding the record in the database. SQL Error.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        };
        if ($choice == 'NO') {
            header("Location: https://" . DOMAIN_NAME . "/invoice/$reference");
        }
        $profile = $this->petProfile->searchById($femaleId);
        $slot = $this->slot->searchById($id);
        $slot->setIsAvailable(false);
        $slot->setPetId($profile->getId());
        $slot->setPetName($profile->getName());
        if (!$this->slot->updateBoardingSlot($slot)) {
            $_SESSION['msg'] = "There was an error in updating the boarding slot in the database. SQL Error.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        header("Location: https://" . DOMAIN_NAME . "/invoice/$reference");
    }

    public function getModeOfPaymentCount(string $mode): mixed
    {
        return $this->dao->getModeOfPaymentCount($mode);
    }

    public function getAllTransactions(): mixed
    {
        $transactions = $this->dao->getAllTransactions();
        if (is_null($transactions)) {
            return $transactions;
        }
        foreach ($transactions as $transaction) {
            $orders = $this->order->searchByTransactionId($transaction->getId());
            $transaction->setListOfOrders($orders);
        }
        return $transactions;
    }

    public function getTransactionsFromStartToEnd(DateTime $start, DateTime $end): mixed
    {
        $transactions = $this->dao->getTransactionsFromStartToEnd($start, $end);
        if (is_null($transactions)) {
            return $transactions;
        }
        foreach ($transactions as $transaction) {
            $orders = $this->order->searchByTransactionId($transaction->getId());
            $transaction->setListOfOrders($orders);
        }
        return $transactions;
    }

    public function searchByReference(string $reference): mixed
    {
        $transaction = $this->dao->searchByReference($reference);
        if (is_null($transaction)) {
            return $transaction;
        }
        $orders = $this->order->searchByTransactionId($transaction->getId());
        $transaction->setListOfOrders($orders);
        return $transaction;
    }

    public function getTransactionsCount(): mixed
    {
        return $this->dao->getTransactionsCount();
    }

    public function getUserTransactions(string $id): mixed
    {
        $transactions = $this->dao->searchByAccountId($id);
        if (is_null($transactions)) {
            return $transactions;
        }
        foreach ($transactions as $transaction) {
            $orders = $this->order->searchByTransactionId($transaction->getId());
            $transaction->setListOfOrders($orders);
        }
        return $transactions;
    }

    public function updateStatus(string $id, array $data): bool
    {
        if (empty($this->dao->searchByTransactionId($id))) {
            $_SESSION["msg"] = "The transaction does not exist.";
            return false;
        }
        if (!$this->dao->updateStatus($id, $data["status"])) {
            $_SESSION["msg"] = "There was an error in updating the transaction status. SQL Error.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully updated Transaction ID $id.";
        return true;
    }

    public function exportSalesReport(array $data): void
    {
        $transactions = $this->getTransactionsFromStartToEnd(new DateTime($data["start"]), new DateTime($data["end"]));

        foreach ($transactions as $transaction) {
            print_r($transaction);
            print_r($transaction->getListOfOrders());
        }
    }
}
