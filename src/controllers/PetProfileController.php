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
                if ($this->services->deletePetProfile($id)) {
                    $_SESSION["msg"][] = "You have successfully deleted Pet Profile ID $id!";
                    $user = unserialize($_SESSION["user"]);
                    $log = $user->getFullName() . " has deleted Account ID $id";
                    if (!$this->logservices->addLog($log)) {
                        $_SESSION["msg"][] = "There was an error in the logging of the action.";
                    }
                } else {
                    $_SESSION["msg"][] = "There was an error in deleting the pet profile.";
                }
                $this->processCollectionRequest("GET");
                break;
            // Update Pet Profile
            case "POST":
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
                $data = $_POST;
                $data["image"] = file_get_contents($_FILES["image"]["tmp_name"]);
                if (!isset($_SESSION)) session_start();
                $user = unserialize($_SESSION["user"]);
                $data["accountId"] = $user->getType() != "USER" ? 1 : $user->getId();
                if ($this->services->addPetProfile($data)) {
                    $_SESSION["msg"] = "You have successfully added a pet profile!";
                } else {
                    $_SESSION["msg"] = "There was an error in adding the pet profile.";
                }
                $this->processCollectionRequest("GET");
                break;
        }
    }
}
