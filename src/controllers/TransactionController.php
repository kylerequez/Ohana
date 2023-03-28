<?php
require_once dirname(__DIR__) . "/models/Transaction.php";
require_once dirname(__DIR__) . "/models/Account.php";
require_once dirname(__DIR__) . '/config/app-config.php';
class TransactionController
{
    private ?TransactionServices $services = null;
    private ?LogServices $logservices = null;

    public function __construct(TransactionServices $services, ?LogServices $logservices)
    {
        $this->services = $services;
        $this->logservices = $logservices;
    }

    public function processCustomerRequest(string $method, ?string $id): void
    {
        if ($id) {
            $this->processCustomerResourceRequest($method, $id);
        } else {
            $this->processCustomerCollectionRequest($method);
        }
    }

    public function processCustomerResourceRequest(string $method, string $id): void
    {
        switch ($method) {
            case "GET":
                exit();
            case "POST":
                $_POST["image"] = file_get_contents($_FILES["image"]["tmp_name"]);
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                if (false === $ext = array_search(
                    $finfo->file($_FILES['image']['tmp_name']),
                    array(
                        'jpg' => 'image/jpeg',
                        'png' => 'image/png',
                    ),
                    true
                )) {
                    $_SESSION["msg"] = "The file type is not accepted. Please upload a file with the following format: JPG and PNG.";
                    $this->processCustomerCollectionRequest("GET");
                    exit();
                }
                if ($_FILES['image']['size'] > 1000000) {
                    $_SESSION["msg"] = "The image size must not be greater than 1 MB.";
                    $this->processCustomerCollectionRequest("GET");
                    exit();
                }
                if (!$this->services->uploadProofOfPayment($id, $_POST)) {
                    $this->processCustomerCollectionRequest("GET");
                }
                $this->processCustomerCollectionRequest("GET");
                exit();
        }
    }

    public function processCustomerCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                header("Location: https://" . DOMAIN_NAME . "/transactions");
                exit();
            case "POST":
                exit();
        }
    }

    public function processRequest(string $method, ?string $id): void
    {
        if ($id) {
            $this->processResourceRequest($method, $id);
        } else {
            $this->processCollectionRequest($method);
        }
    }

    public function processResourceRequest(string $method, ?string $id): void
    {
        switch ($method) {
            case "GET":

                exit();
            case "POST":
                if (!$this->services->updateStatus($id, $_POST)) {
                    $this->processCollectionRequest("GET");
                    exit();
                }
                $account = unserialize($_SESSION["user"]);
                $log = $account->getFullName() . " has set the status of Transaction ID $id to " . $_POST["status"];
                if (!$this->logservices->addLog($account->getId(), $account->getType(), $log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processCollectionRequest("GET");
                exit();
        }
    }

    public function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                header("Location: https://" . DOMAIN_NAME . "/dashboard/transactions");
                exit();
            case "POST":
                exit();
        }
    }

    public function processCheckoutRequest(string $method, ?string $reference): void
    {
        if ($reference) {
            switch ($method) {
                case "GET":
                    $this->services->proceedToUpload($reference, $_GET);
                    exit();
                case "POST":
                    $this->services->completeTransaction($reference, $_POST);
                    exit();
            }
        }
    }

    public function processStudCheckoutRequest(string $method, ?string $reference): void
    {
        if ($reference) {
            switch ($method) {
                case "GET":
                    $this->services->proceedToUploadStud($reference, $_GET);
                    exit();
                case "POST":
                    $this->services->completeTransactionStud($reference, $_POST);
                    exit();
            }
        }
    }

    public function processStudBooking(string $method): void
    {
        switch ($method) {
            case "POST":
                if (!$this->services->proceedToCheckout($_POST)) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
                header("Location: https://" . DOMAIN_NAME . "/checkout/" . uniqid('OKPH-') . "?from=STUD");
                exit();
        }
    }
}
