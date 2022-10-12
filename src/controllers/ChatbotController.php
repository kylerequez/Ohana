<?php

class ChatbotController
{
    private ?ChatbotServices $services = null;
    private ?LogServices $logservices = null;

    public function __construct(ChatbotServices $services, ?LogServices $logServices)
    {
        $this->services = $services;
        $this->logservices = $logServices;
    }

    public function processAdminRequest(string $method, ?string $id): void
    {
        if ($id) {
            $this->processAdminResourceRequest($method, $id);
        } else {
            $this->processAdminCollectionRequest($method);
        }
    }

    public function processAdminResourceRequest(string $method, $id)
    {
    }

    public function processAdminCollectionRequest(string $method)
    {
        switch ($method) {
            case "GET":
                if (isset($_SESSION)) session_start();
                $_SESSION["cb_settings"] = serialize($this->services->getAllSettings());
                header("Location: http://localhost/dashboard/chatbot-settings");
        }
    }
}
