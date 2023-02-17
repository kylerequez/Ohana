<?php
require_once dirname(__DIR__) . '/models/Account.php';
require_once dirname(__DIR__) . '/models/BoardingSlot.php';
require_once dirname(__DIR__) . '/config/app-config.php';

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
                if (!$this->logservices->addLog($user->getId(), $user->getType(), $log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processCollectionRequest("GET");
                exit();
                // Boarding Slot Update
            case "POST":
                if (!empty($_FILES["image"]["tmp_name"])) {
                    $_POST["image"] = file_get_contents($_FILES["image"]["tmp_name"]);
                    $finfo = new finfo(FILEINFO_MIME_TYPE);
                    if (false === $ext = array_search(
                        $finfo->file($_FILES['image']['tmp_name']),
                        array(
                            'jpg' => 'image/jpeg',
                            'png' => 'image/png',
                        ),
                        true
                    )) {
                        $_SESSION["msg"] = "The file type is not accepted. Please upload a file with the following format: JPG and PNG.";
                        $this->processCollectionRequest("GET");
                        exit();
                    }
                    if ($_FILES['image']['size'] > 1000000) {
                        $_SESSION["msg"] = "The image size must not be greater than 1 MB.";
                        $this->processCollectionRequest("GET");
                        exit();
                    }
                } else {
                    $_POST["image"] = base64_decode($_POST["old_image"]);
                }
                if (!$this->services->updateBoardingSlot($id, $_POST)) {
                    $this->processCollectionRequest("GET");
                }
                $user = unserialize($_SESSION["user"]);
                $log = $user->getFullName() . " has updated Slot ID $id";
                if (!$this->logservices->addLog($user->getId(), $user->getType(), $log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processCollectionRequest("GET");
                exit();
        }
    }

    public function processCollectionRequest(string $method): void
    {
        switch ($method) {
                // Boarding Slot Display
            case "GET":
                header("Location: https://" . DOMAIN_NAME . "/dashboard/petboarding");
                exit();
                // Add Boarding Slot
            case "POST":
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                if (false === $ext = array_search(
                    $finfo->file($_FILES['image']['tmp_name']),
                    array(
                        'jpg' => 'image/jpeg',
                        'png' => 'image/png',
                    ),
                    true
                )) {
                    $_SESSION["msg"] = "The file type is not accepted. Please upload a file with the following format: JPG and PNG.";
                    $this->processCollectionRequest("GET");
                    exit();
                }
                if ($_FILES['image']['size'] > 1000000) {
                    $_SESSION["msg"] = "The image size must not be greater than 1 MB.";
                    $this->processCollectionRequest("GET");
                    exit();
                }
                $user = unserialize($_SESSION["user"]);
                $_POST["image"] = file_get_contents($_FILES["image"]["tmp_name"]);
                $_POST["accountId"] = $user->getType() != "USER" ? 1 : $user->getId();
                if (!$this->services->addBoardingSlot($_POST)) {
                    $this->processCollectionRequest("GET");
                }
                $log = $user->getFullName() . " has added a Pet Boarding Slot.";
                if (!$this->logservices->addLog($user->getId(), $user->getType(), $log)) {
                    $_SESSION["msg"] = "There was an error in adding the log.";
                }
                $this->processCollectionRequest("GET");
                exit();
        }
    }
}
