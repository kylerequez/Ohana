<?php
require_once dirname(__DIR__) . '/models/Account.php';
require_once dirname(__DIR__) . '/models/BoardingSlot.php';

class BoardingSlotController
{
    private ?BoardingSlotServices $services = null;
    private ?LogServices $logservices = null;

    public function __construct(BoardingSlotServices $services, ?LogServices $logServices)
    {
        $this->services = $services;
        $this->logservices = $logServices;
    }

    public function processRequest(string $method, ?string $id): void
    {
        if($id)
        {
            $this->processResourceRequest($method, $id);
        } else {
            $this->processCollectionRequest($method);
        }
    }

    public function processResourceRequest(string $method, ?string $id): void
    {
        switch($method)
        {
            // Boarding Slot Delete
            case "GET":
                if (!isset($_SESSION)) session_start();
                if($this->services->deleteSlot($id)){
                    echo "TEST";
                    $user = unserialize($_SESSION["user"]);
                    $log = $user->getFullName() . " has deleted Slot ID $id";
                    if(!$this->logservices->addLog($log))
                    {
                        $_SESSION["msg"] = "Error on adding log";
                    }
                    $_SESSION["msg"] = "Slot ID $id was successfully deleted!";
                    $this->processCollectionRequest("GET");
                    break;
                } else {
                    $_SESSION["msg"] = "There was an error in deleting Slot ID $id";
                    header("Location: http://localhost/dashboard/petboarding");
                }
                break;
            case "POST":
                
                break;
        }
    }

    public function processCollectionRequest(string $method): void
    {
        switch($method)
        {
            // Boarding Slot Display
            case "GET":
                $_SESSION["slots"] = serialize($this->services->getAllBoardingSlots());
                header("Location: http://localhost/dashboard/petboarding");
                break;
            case "POST":

                break;
        }
    }
}