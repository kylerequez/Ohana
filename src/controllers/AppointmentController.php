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
                break;
            case "POST":
                break;
        }
    }

    public function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                echo "Wow";
                if (!isset($_SESSION)) session_start();
                $_SESSION["appointments"] = serialize($this->services->getAllAppointments());
                print(json_encode($_SESSION["appointments"]));
                
                header("Location: http://localhost/dashboard/calendar");
                break;
            case "POST":
                break;
        }
    }
}