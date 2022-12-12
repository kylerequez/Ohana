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

    public function processCustomerResourceRequest(string $method, ?string $id): void
    {
        switch ($method) {
            case "GET":

                break;
            case "POST":
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
        if($reference) {

        } else {
            
        }
    }
}
