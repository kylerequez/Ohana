<?php
require_once dirname(__DIR__) . "/models/Account.php";
require_once dirname(__DIR__) . '/config/app-config.php';
require_once dirname(__DIR__) . '/config/app-config.php';
class ChatbotController
{
    private ?ChatbotServices $services = null;
    private ?LogServices $logservices = null;

    public function __construct(ChatbotServices $services, ?LogServices $logServices)
    {
        $this->services = $services;
        $this->logservices = $logServices;
    }

    public function processSettingsRequest(string $method, ?string $id): void
    {
        if ($id) {
            $this->processSettingsResourceRequest($method, $id);
        } else {
            $this->processSettingsCollectionRequest($method);
        }
    }

    public function processSettingsCollectionRequest(string $method)
    {
        switch ($method) {
            case "GET":
                header("Location: http://" . DOMAIN_NAME . "/dashboard/chatbot-settings");
                break;
            case "POST":
                if (!$this->services->updateSettings($_POST, $_FILES)) {
                    $this->processSettingsCollectionRequest("GET");
                }
                $user = unserialize($_SESSION["user"]);
                $log = $user->getFullName() . " has updated the Chatbot Settings";
                if (!$this->logservices->addLog($log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processSettingsCollectionRequest("GET");
                break;
        }
    }

    public function processResponsesRequest(string $method, ?string $id): void
    {
        if ($id) {
            $this->processResponsesResourceRequest($method, $id);
        } else {
            $this->processResponsesCollectionRequest($method);
        }
    }

    public function processResponsesResourceRequest(string $method, string $id): void
    {
        switch ($method) {
            case "GET":
                if (!$this->services->deleteResponse($id)) {
                    $this->processResponsesCollectionRequest($method);
                }
                $user = unserialize($_SESSION["user"]);
                $log = $user->getFullName() . " has deleted Response ID $id";
                if (!$this->logservices->addLog($log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processResponsesCollectionRequest($method);
                break;
            case "POST":
                if (!$this->services->updateResponse($id, $_POST)) {
                    $this->processResponsesCollectionRequest("GET");
                }
                $user = unserialize($_SESSION["user"]);
                $log = $user->getFullName() . " has updated Response ID $id";
                if (!$this->logservices->addLog($log)) {
                    $_SESSION["msg"] .= "There was an error in the logging of the action.";
                }
                $this->processResponsesCollectionRequest("GET");
                break;
        }
    }

    public function processResponsesCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                header("Location: http://" . DOMAIN_NAME . "/dashboard/chatbot-responses");
                break;
            case "POST":
                if (!$this->services->addResponse($_POST)) {
                    $this->processResponsesCollectionRequest("GET");
                    break;
                }
                $user = unserialize($_SESSION["user"]);
                $log = $user->getFullName() . " has added a response";
                if ($this->logservices->addLog($log) == false) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processResponsesCollectionRequest("GET");
                break;
        }
    }
}
