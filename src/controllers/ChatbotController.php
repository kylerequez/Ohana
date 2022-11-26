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

    public function processSettingsResourceRequest(string $method, $id)
    {
    }

    public function processSettingsCollectionRequest(string $method)
    {
        switch ($method) {
            case "GET":
                $_SESSION["cb_settings"] = serialize($this->services->getAllSettings());
                header("Location: http://" . DOMAIN_NAME . "/dashboard/chatbot-settings");
                break;
            case "POST":
                if (!empty($_FILES["image"]["tmp_name"])) {
                    $_POST["image"] = file_get_contents($_FILES["image"]["tmp_name"]);
                } else {
                    $_POST["image"] = base64_decode($_POST["old_image"]);
                }
                if (!$this->services->updateSettings($_POST)) {
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
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                $_SESSION["cb_responses"] = serialize($this->services->getResponsesPagination(!isset($_GET["limit"]) ? _RESOURCE_PER_PAGE_ : $_GET["limit"], !isset($_GET["offset"]) ? _BASE_OFFSET_ : $_GET["offset"]));
                $page = !isset($_GET["page"]) ? 1 : $_GET["page"];
                $_SESSION["totalResponses"] = $this->services->getTotalResponses();
                header("Location: http://" . DOMAIN_NAME . "/dashboard/chatbot-responses?page=$page");
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
