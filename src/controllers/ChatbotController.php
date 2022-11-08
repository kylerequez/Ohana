<?php
require_once dirname(__DIR__) . "/models/Account.php";
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
                header("Location: http://localhost/dashboard/chatbot-settings");
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
                break;
            case "POST":
                break;
        }
    }

    public function processResponsesCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                $_SESSION["cb_responses"] = serialize($this->services->getAllResponses());
                header("Location: http://localhost/dashboard/chatbot-responses");
                break;
            case "POST":
                break;
        }
    }
}
