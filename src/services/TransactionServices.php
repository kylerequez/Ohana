<?php
include_once dirname(__DIR__) . '/config/app-config.php';
include_once dirname(__DIR__) . '/models/PDF.php';
include_once dirname(__DIR__) . '/models/Cart.php';
include_once dirname(__DIR__) . '/vendor/autoload.php';
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
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        $start = new DateTime($data["start"]);
        $end = new DateTime($data["end"]);
        $transactions = $this->getTransactionsFromStartToEnd($start, $end);
        foreach ($transactions as $transaction) {
            // print_r($transaction);
            // print_r($transaction->getListOfOrders());
        }
        ob_start();
        // create new PDF document
        $pdf = new PDF("L", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);
        $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));
        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
        // ---------------------------------------------------------
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->SetFont('dejavusans', '', 14, '', true);
        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();
        $rehoming = 0;
        $stud = 0;
        foreach ($transactions as $transaction) {
            foreach ($transaction->getListOfOrders() as $order) {
                if ($order->getType() == "REHOMING") {
                    $rehoming++;
                } else {
                    $stud++;
                }
            }
        }
        // Set some content to print
        $html = "
        <div style=\"\">
            <h1 style=\"text-align:center; \">Sales Report for {$start->format("M. d, Y")} to {$end->format("M. d, Y")}</h1>
            <table cellspacing=\"0\" cellpadding=\"6\" border=\"1\" style=\"border-color:black; \">
                <thead>
                    <tr style=\"background-color:#db6551;color:white;\">
                        <th style=\"font-weight:bold;\">Reference ID</th>
                        <th style=\"font-weight:bold;\">Type</th>
                        <th style=\"font-weight:bold;\">Customer</th>
                        <th style=\"font-weight:bold;\">Price</th>
                    </tr>
                </thead>
                <tbody>
           ";
        $total = 0.00;
        foreach ($transactions as $transaction) {
            foreach ($transaction->getListOfOrders() as $order) {
                $html .= "
                    <tr>
                        <td>{$transaction->getReference()}</td>
                        <td>" . ucfirst(strtolower($order->getType())) . "</td>
                        <td>{$transaction->getFname()} {$transaction->getLname()}</td>
                        <td>₱ " . number_format($order->getPrice(), 2) . "</td>
                    </tr>
                ";
                $total += $order->getPrice();
            }
        }
        $html .= "
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan=\"3\" style=\"text-align:right; font-weight:bold; \">Total Revenue:</td>
                        <td>₱ " . number_format($total, 2) . "</td>
                    </tr>
                    <tr>
                        <td colspan=\"3\" style=\"text-align:right; font-weight:bold; \">Total Stud Transactions:</td>
                        <td>{$stud}</td>
                    </tr>
                    <tr>
                        <td colspan=\"3\" style=\"text-align:right; font-weight:bold; \">Total Puppies Sold:</td>
                        <td>{$rehoming}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        ";
        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        ob_end_clean();
        $pdf->Output('Sales Report for ' . $start->format('M. d, Y') . ' to ' . $end->format('M. d, Y') . '.pdf', 'D');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
