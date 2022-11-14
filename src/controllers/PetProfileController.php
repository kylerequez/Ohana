<?php
require_once dirname(__DIR__) . "/models/Account.php";
class PetProfileController
{
    private ?PetProfileServices $services = null;
    private ?LogServices $logservices = null;

    public function __construct(PetProfileServices $services, ?LogServices $logservices)
    {
        $this->services = $services;
        $this->logservices = $logservices;
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
                // Delete Pet Profile
            case "GET":
                if (!$this->services->deletePetProfile($id)) {
                    $this->processCollectionRequest("GET");
                }
                $account = unserialize($_SESSION["user"]);
                $log = $account->getFullName() . " has deleted Pet Profile ID $id";
                if (!$this->logservices->addLog($log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processCollectionRequest("GET");
                break;
                // Update Pet Profile
            case "POST":
                if (!empty($_FILES["image"]["tmp_name"])) {
                    $_POST["image"] = file_get_contents($_FILES["image"]["tmp_name"]);
                } else {
                    $_POST["image"] = base64_decode($_POST["old_image"]);
                }
                if (!$this->services->updatePetProfile($id, $_POST)) {
                    $this->processCollectionRequest("GET");
                }
                $account = unserialize($_SESSION["user"]);
                $log = $account->getFullName() . " has updated Pet Profile ID $id";
                if (!$this->logservices->addLog($log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processCollectionRequest("GET");
                break;
        }
    }

    public function processCollectionRequest(string $method): void
    {
        switch ($method) {
                // Display Pet Profiles
            case "GET":
                $_SESSION["profiles"] = serialize($this->services->getOhanaPets());
                header("Location: http://localhost/dashboard/petprofiles");
                break;
                // Add Pet Profile
            case "POST":
                $account = unserialize($_SESSION["user"]);
                $_POST["image"] = file_get_contents($_FILES["image"]["tmp_name"]);
                $_POST["accountId"] = $account->getType() != "USER" ? 1 : $account->getId();
                if (!$this->services->addPetProfile($_POST)) {
                    $this->processCollectionRequest("GET");
                }
                $log = $account->getFullName() . " has added a Pet Profile.";
                if (!$this->logservices->addLog($log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processCollectionRequest("GET");
                break;
        }
    }

    public function displayPetProfile($method, $id): void
    {
        switch($type){
            case "rehoming":
                $_SESSION["profiles"] = serialize($this->services->getOhanaPets());
                header("Location: http://localhost/puppies");
                break;
            case "stud":
                break;
        }
    }

    public function displayPetProfiles(string $type): void
    {
        switch($type){
            case "rehoming":
                $_SESSION["profiles"] = serialize($this->services->getOhanaPets());
                header("Location: http://localhost/puppies");
                break;
            case "stud":
                break;
        }
    }

    public function processCustomerRequest(string $method, ?string $id): void
    {
        if ($id) {
            $this->processCustomerResourceRequest($method, $id);
        } else {
            $this->processCustomerCollectionRequest($method);
        }
    }

    public function processCustomerResourceRequest($method, $id): void
    {
        switch ($method) {
            case "GET":
                
                break;
            case "POST":
                break;
        }
    }

    public function processCustomerCollectionRequest($method): void
    {
        switch ($method) {
            case "GET":
                $account = unserialize($_SESSION['user']);
                $id = $account->getId();
                $_SESSION["profiles"] = serialize($this->services->getUserPetProfile($id));
                header("Location: http://localhost/ownedpets");
                break;
            case "POST":
                break;
        }
    }
}
