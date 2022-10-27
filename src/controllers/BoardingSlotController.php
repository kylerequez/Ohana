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
        if ($id) {
            $this->processResourceRequest($method, $id);
        } else {
            $this->processCollectionRequest($method);
        }
    }

    public function processResourceRequest(string $method, ?string $id): void
    {
        switch ($method) {
                // Boarding Slot Delete
            case "GET":
                if (!$this->services->deleteSlot($id)) {
                    $this->processCollectionRequest($method);
                }
                $user = unserialize($_SESSION["user"]);
                $log = $user->getFullName() . " has deleted Slot ID $id";
                if (!$this->logservices->addLog($log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processCollectionRequest("GET");
                break;
                // Boarding Slot Update
            case "POST":
                if (!empty($_FILES["image"]["tmp_name"])) {
                    $_POST["image"] = file_get_contents($_FILES["image"]["tmp_name"]);
                } else {
                    $_POST["image"] = base64_decode($_POST["old_image"]);
                }
                if (!$this->services->updateBoardingSlot($id, $_POST)) {
                    $this->processCollectionRequest("GET");
                }
                $user = unserialize($_SESSION["user"]);
                $log = $user->getFullName() . " has updated Slot ID $id";
                if (!$this->logservices->addLog($log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processCollectionRequest("GET");
                break;
        }
    }

    public function processCollectionRequest(string $method): void
    {
        echo "$method";
        switch ($method) {
                // Boarding Slot Display
            case "GET":
                $_SESSION["slots"] = serialize($this->services->getAllBoardingSlots());
                header("Location: http://localhost/dashboard/petboarding");
                break;
                // Add Boarding Slot
            case "POST":
                $user = unserialize($_SESSION["user"]);
                $_POST["image"] = file_get_contents($_FILES["image"]["tmp_name"]);
                $_POST["accountId"] = $user->getType() != "USER" ? 1 : $user->getId();
                if (!$this->services->addBoardingSlot($_POST)) {
                    $this->processCollectionRequest("GET");
                }
                $log = $user->getFullName() . " has added a Pet Boarding Slot.";
                if (!$this->logservices->addLog($log)) {
                    $_SESSION["msg"] = "There was an error in adding the log.";
                }
                $this->processCollectionRequest("GET");
                break;
        }
    }
}
.