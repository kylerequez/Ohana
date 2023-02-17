<?php
require_once dirname(__DIR__) . "/models/Account.php";
require_once dirname(__DIR__) . '/config/app-config.php';
class StudHistoryControler
{
    private ?StudHistoryServices $services = null;
    private ?LogServices $logservices = null;

    public function __construct(StudHistoryServices $services, ?LogServices $logservices)
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

    public function processResourceRequest(string $method, string $id): void
    {
        switch ($method) {
            case "GET":
                if (!$this->services->deleteRecord($id)) {
                    $this->processCollectionRequest("GET");
                }
                $account = unserialize($_SESSION["user"]);
                $log = $account->getFullName() . " has deleted Stud History $id";
                if (!$this->logservices->addLog($account->getId(), $account->getType(), $log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processCollectionRequest("GET");
                exit();
            case "POST":
                if (!$this->services->updateRecord($id, $_POST)) {
                    $this->processCollectionRequest("GET");
                }
                $account = unserialize($_SESSION["user"]);
                $log = $account->getFullName() . " has updated Stud History $id";
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
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            case "POST":
                if (!$this->services->addRecord($_POST)) {
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                }
                $account = unserialize($_SESSION["user"]);
                $log = $account->getFullName() . " has added a new stud record.";
                if (!$this->logservices->addLog($account->getId(), $account->getType(), $log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                    $this->processCollectionRequest("GET");
                }
                $this->processCollectionRequest("GET");
                exit();
        }
    }
}
