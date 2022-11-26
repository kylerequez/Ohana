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
                $_SESSION["logs"] = serialize($this->services->getLogsPagination(!isset($_GET["limit"]) ? _RESOURCE_PER_PAGE_ : $_GET["limit"], !isset($_GET["offset"]) ? _BASE_OFFSET_ : $_GET["offset"]));
                $page = !isset($_GET["page"]) ? 1 : $_GET["page"];
                $_SESSION["totalLogs"] = $this->services->getTotalLogCount();
                header("Location: http://" . DOMAIN_NAME . "/dashboard/logs?page=$page");
                break;
        }
    }
}
