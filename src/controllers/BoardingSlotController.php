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
                if (!isset($_SESSION)) session_start();
                if ($this->services->deleteSlot($id)) {
                    echo "TEST";
                    $user = unserialize($_SESSION["user"]);
                    $log = $user->getFullName() . " has deleted Slot ID $id";
                    if (!$this->logservices->addLog($log)) {
                        $_SESSION["msg"] = "There was an error in the logging of the action.";
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
                echo "UPDATE";
                $data = $_POST;
                if(!empty($_FILES["image"]["tmp_name"])) {
                    $data["image"] = file_get_contents($_FILES["image"]["tmp_name"]);
                } else {
                    $data["image"] = base64_decode($_POST["old_image"]);
                }
                // print_r($data);
                // echo empty($data["petName"]) ? "LOL" : "NO";
                // echo $data["petName"];
                if (!isset($_SESSION)) session_start();
                if($this->services->updateBoardingSlot($id, $data)){
                    $_SESSION["msg"] = "You have successfully updated Slot ID $id!";
                    $user = unserialize($_SESSION["user"]);
                    $log = $user->getFullName() . " has updated Slot ID $id";
                    if (!$this->logservices->addLog($log)) {
                        $_SESSION["msg"] = "There was an error in the logging of the action.";
                    }
                } else {
                    $_SESSION["msg"] = "There was an error in updating the boarding slot.";
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
                $data = $_POST;
                $data["image"] = file_get_contents($_FILES["image"]["tmp_name"]);
                if (!isset($_SESSION)) session_start();
                $user = unserialize($_SESSION["user"]);
                $data["accountId"] = $user->getType() != "USER" ? 1 : $user->getId();
                if ($this->services->addBoardingSlot($data)) {
                    $log = $user->getFullName() . " has added a Pet Boarding Slot.";
                    if (!$this->logservices->addLog($log)) {
                        $_SESSION["msg"] = "There was an error in adding the log.";
                    } else {
                        $_SESSION["msg"] = "You have successfully added a pet profile!";
                    }
                    $_SESSION["msg"] = "You have successfully added a pet boarding slot!";
                } else {
                    $_SESSION["msg"] = "There was an error in adding the pet boarding slot.";
                }
                $this->processCollectionRequest("GET");
                break;
        }
    }
}
