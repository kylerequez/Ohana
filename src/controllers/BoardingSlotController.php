<?php

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
        
    }

    public function processCollectionRequest(string $method): void
    {
        switch($method)
        {
            // Boarding Slot Display
            case "GET":
                $_SESSION["slots"] = $this->services->getAllBoardingSlots();
                header("Location: http://localhost/dashboard/slots");
                break;
            case "POST":

                break;
        }
    }
}