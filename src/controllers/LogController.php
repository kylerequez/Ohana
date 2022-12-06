<?php
require_once dirname(__DIR__) . '/config/app-config.php';
class LogController
{
    private ?LogServices $services = null;

    public function __construct(LogServices $services)
    {
        $this->services = $services;
    }

    public function processLogRequest(string $method, ?string $id): void
    {
        if ($id) {
            $this->processLogResourceRequest($method, $id);
        } else {
            $this->processLogCollectionRequest($method);
        }
    }

    public function processLogResourceRequest(string $method, ?string $id): void
    {
    }

    public function processLogCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                header("Location: http://" . DOMAIN_NAME . "/dashboard/logs");
                break;
        }
    }
}
