<?php
include_once dirname(__DIR__) . '/config/app-config.php';
include_once dirname(__DIR__) . '/models/Cart.php';
class TransactionServices
{
    private ?TransactionDAO $dao = null;
    private ?OrderDAO $order = null;
    private ?PetProfileDAO $petProfile = null;

    public function __construct(TransactionDAO $dao, OrderDAO $order, ?PetProfileDAO $petProfile)
    {
        $this->dao = $dao;
        $this->order = $order;
        $this->petProfile = $petProfile;
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

    public function proceedToUploadStud(string $reference, array $data): void
    {
        if ($data['mode'] == 'CASH') {
            $this->completeTransactionStud($reference, $data);
        } else if ($data['mode'] == 'BANK TRANSFER' || $data['mode'] == 'GCASH') {
            header("Location:  https://" . DOMAIN_NAME . "/upload-proof?reference=$reference&mode=" . trim($data['mode']));
        } else {
            $_SESSION['msg'] = "There was an error in selecting the mode of payment.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }

    public function completeTransactionStud(string $reference, array $data): void
    {
        date_default_timezone_set('Asia/Manila');
        print_r($data);
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
            $_SESSION["msg"] = "There was an error in updating the transaction status.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully updated Transaction ID $id.";
        return true;
    }
}
