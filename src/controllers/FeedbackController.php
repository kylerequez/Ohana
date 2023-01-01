<?php
require_once dirname(__DIR__) . "/models/Account.php";
require_once dirname(__DIR__) . '/config/app-config.php';
require_once dirname(__DIR__) . '/config/app-config.php';
class FeedbackController
{
    private ?FeedbackServices $services = null;

    public function __construct(FeedbackServices $services)
    {
        $this->services = $services;
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
                exit();
            case "POST":
                exit();
        }
    }

    public function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                exit();
            case "POST":
                if (!$this->services->addFeedback($_POST)) {
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                }
                header("Location: https://" . DOMAIN_NAME . "/transactions");
                exit();
        }
    }
}
