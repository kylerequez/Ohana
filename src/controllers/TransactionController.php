<?php
require_once dirname(__DIR__) . "/models/Transaction.php";
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
                break;
        }
    }

    public function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                $_SESSION["transactions"] = serialize($this->services->getAllTransactionsPagination(!isset($_GET["limit"]) ? _RESOURCE_PER_PAGE_ : $_GET["limit"], !isset($_GET["offset"]) ? _BASE_OFFSET_ : $_GET["offset"]));
                $page = !isset($_GET["page"]) ? 1 : $_GET["page"];
                $_SESSION["totalTransactions"] = $this->services->getTotalTransactionsCount();
                header("Location: http://localhost/dashboard/transactions?page=$page");
                break;
            case "POST":
                break;
        }
    }
}
