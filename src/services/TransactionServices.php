<?php
include_once dirname(__DIR__) . '/config/app-config.php';
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
        $transactions = $this->getTransactionsFromStartToEnd(new DateTime($data["start"]), new DateTime($data["end"]));

        foreach ($transactions as $transaction) {
            print_r($transaction);
            print_r($transaction->getListOfOrders());
        }
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 001');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
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

        // set text shadow effect
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

        // Set some content to print
        $html = <<<EOD
<h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
<i>This is the first example of TCPDF library.</i>
<p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
<p>Please check the source code documentation and other examples for further information.</p>
<p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
EOD;

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        ob_end_clean();
        $pdf->Output('example_001.pdf', 'D');

        //============================================================+
        // END OF FILE
        //============================================================+
    }
}
