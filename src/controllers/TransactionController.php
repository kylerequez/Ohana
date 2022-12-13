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
                break;
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
                    break;
                }
                if ($_FILES['image']['size'] > 1000000) {
                    $_SESSION["msg"] = "The image size must not be greater than 1 MB.";
                    $this->processCustomerCollectionRequest("GET");
                    break;
                }
                if (!$this->services->uploadProofOfPayment($id, $_POST)) {
                    $this->processCustomerCollectionRequest("GET");
                }
                $this->processCustomerCollectionRequest("GET");
                break;
        }
    }

    public function processCustomerCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                header("Location: http://" . DOMAIN_NAME . "/transactions");
                break;
            case "POST":
                break;
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

                break;
            case "POST":
                if (!$this->services->updateStatus($id, $_POST)) {
                    $this->processCollectionRequest("GET");
                    break;
                }
                $this->processCollectionRequest("GET");
                break;
        }
    }

    public function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                header("Location: http://" . DOMAIN_NAME . "/dashboard/transactions");
                break;
            case "POST":
                break;
        }
    }

    public function processCheckoutRequest(string $method, ?string $reference): void
    {
        if ($reference) {
            switch ($method) {
                case "GET":
                    $this->services->proceedToUpload($reference, $_GET);
                    break;
            }
        } else {
        }
    }
}
