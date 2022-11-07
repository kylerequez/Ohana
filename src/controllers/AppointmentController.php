<?php
require_once dirname(__DIR__) . '/models/Account.php';

class AppointmentController
{
    private ?AppointmentServices $services = null;
    private ?LogServices $logservices = null;

    public function __construct(AppointmentServices $services, ?LogServices $logServices)
    {
        $this->services = $services;
        $this->logservices = $logServices;
    }

    // STAFF
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
                if (!$this->services->deleteAppointment($id)) {
                    $this->processCollectionRequest($method);
                }
                $user = unserialize($_SESSION["user"]);
                $log = $user->getFullName() . " has deleted Account ID $id";
                if (!$this->logservices->addLog($log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processCollectionRequest($method);
                break;
            case "POST":
                break;
        }
    }

    public function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                $_SESSION["appointments"] = serialize($this->services->getAllAppointments());
                header("Location: http://localhost/dashboard/calendar");
                break;
            case "POST":
                break;
        }
    }
}
