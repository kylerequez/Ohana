<?php
require_once dirname(__DIR__) . '/models/Account.php';
require_once dirname(__DIR__) . '/config/app-config.php';
class AppointmentController
{
    private ?AppointmentServices $services = null;
    private ?LogServices $logservices = null;

    public function __construct(AppointmentServices $services, ?LogServices $logServices)
    {
        $this->services = $services;
        $this->logservices = $logServices;
    }

    public function processRequest(string $method, ?string $id): void
    {
        if (isset($id)) {
            $this->processResourceRequest($method, $id);
        } else {
            $this->processCollectionRequest($method);
        }
    }

    public function processResourceRequest(string $method, ?string $id): void
    {
        switch ($method) {
            case "GET":
                if (!$this->services->deleteAppointment($id)) {
                    $this->processCollectionRequest($method);
                }
                $user = unserialize($_SESSION["user"]);
                $log = $user->getFullName() . " has deleted Appointment ID $id";
                if (!$this->logservices->addLog($user->getId(), $user->getType(), $log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processCollectionRequest($method);
                exit();
            case "POST":
                if (!$this->services->updateAppointment($id, $_POST)) {
                    $this->processCollectionRequest("GET");
                }
                $user = unserialize($_SESSION["user"]);
                $log = $user->getFullName() . " has updated Appointment ID $id";
                if (!$this->logservices->addLog($user->getId(), $user->getType(), $log)) {
                    $_SESSION["msg"] .= "There was an error in the logging of the action.";
                }
                $this->processCollectionRequest("GET");
                exit();
        }
    }

    public function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                header("Location: https://" . DOMAIN_NAME . "/dashboard/appointments");
                exit();
        }
    }

    public function processUserRequest(string $method, ?int $id): void
    {
        if (isset($id)) {
            $this->processUserResourceRequest($method, $id);
        } else {
            $this->processUserCollectionRequest($method);
        }
    }

    public function processUserResourceRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                exit();
            case "POST":
                exit();
        }
    }

    public function processUserCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                header("Location: https://" . DOMAIN_NAME . "/appointments");
                exit();
            case "POST":
                exit();
        }
    }

    public function processVisitRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                exit();
            case "POST":
                if (!$this->services->addAppointment($_POST)) {
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                    exit();
                }
                header("Location: https://" . DOMAIN_NAME . "/appointments/get");
                exit();
        }
    }

    public function processRehomingRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                exit();
            case "POST":
                if (!$this->services->addAppointment($_POST)) {
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                    exit();
                }
                header("Location: https://" . DOMAIN_NAME . "/user-feedback");
                exit();
        }
    }

    public function processStudRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                exit();
            case "POST":
                if (!$this->services->addAppointment($_POST)) {
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                    exit();
                }
                header("Location: https://" . DOMAIN_NAME . "/user-feedback");
                exit();
        }
    }
}
