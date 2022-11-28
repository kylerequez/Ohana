<?php
require_once dirname(__DIR__) . "/models/Account.php";
require_once dirname(__DIR__) . '/config/app-config.php';
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
                $_SESSION["profiles"] = serialize($this->services->getOhanaPetsPagination(!isset($_GET["limit"]) ? _RESOURCE_PER_PAGE_ : $_GET["limit"], !isset($_GET["offset"]) ? _BASE_OFFSET_ : $_GET["offset"]));
                $page = !isset($_GET["page"]) ? 1 : $_GET["page"];
                $_SESSION["totalProfiles"] = $this->services->getTotalPetProfilesCount();
                header("Location: http://" . DOMAIN_NAME . "/dashboard/petprofiles?page=$page");
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

    public function processRehomingRequest(string $method, ?string $id): void
    {
        if ($id) {
            $this->processRehomingResourceRequest($method, $id);
        } else {
            $this->processRehomingCollectionRequest($method);
        }
    }

    public function processRehomingResourceRequest(string $method, string $id): void
    {
        switch ($method) {
            case "GET":
                $_SESSION["rehoming-profile"] = serialize($this->services->getOhanaPet($id));
                header("Location: http://" . DOMAIN_NAME . "/puppy-info");
                break;
            case "POST":

                break;
        }
    }

    public function processRehomingCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                $_SESSION["rehoming"] = serialize($this->services->getRehomingPets());
                header("Location: http://" . DOMAIN_NAME . "/puppies");
                break;
            case "POST":

                break;
        }
    }

    public function displayPetProfile(string $id): void
    {
        $user = unserialize($_SESSION["user"]);
        $profile = $this->services->getPetProfileById($id, $user->getId());
        if (empty($profile)) {
            header("Location: http://" . DOMAIN_NAME . "/ownedpets");
        }
        $_SESSION["profile"] = serialize($profile);
        header("Location: http://" . DOMAIN_NAME . "/ownedpets/" . $profile->getName());
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
                // DELETE
                break;
            case "POST":
                $account = unserialize($_SESSION["user"]);
                $_POST["accountId"] = $account->getType() != "USER" ? 1 : $account->getId();
                $_POST["ownerName"] = $account->getType() != "USER" ? $account->getFname() . " " . $account->getLname() : "OHANA KENNEL BUSINESS";
                if (!empty($_FILES["image"]["tmp_name"])) {
                    $_POST["image"] = file_get_contents($_FILES["image"]["tmp_name"]);
                } else {
                    $_POST["image"] = base64_decode($_POST["old_image"]);
                }
                if (!$this->services->updatePetProfile($id, $_POST)) {
                    $this->processCustomerCollectionRequest("GET");
                }
                $this->processCustomerCollectionRequest("GET");
                break;
        }
    }

    public function processCustomerCollectionRequest($method): void
    {
        switch ($method) {
            case "GET":
                $account = unserialize($_SESSION['user']);
                $_SESSION["profiles"] = serialize($this->services->getUserPetProfile(($account->getType() == "USER") ? $account->getId() : "1"));
                header("Location: http://" . DOMAIN_NAME . "/ownedpets");
                break;
            case "POST":
                $account = unserialize($_SESSION["user"]);
                $_POST["image"] = file_get_contents($_FILES["image"]["tmp_name"]);
                $_POST["accountId"] = $account->getType() != "USER" ? 1 : $account->getId();
                $_POST["ownerName"] = ($account->getType() == "USER") ? $account->getFname() . " " . $account->getLname() : "OHANA KENNEL BUSINESS";
                $_POST["price"] = 0;
                if (!$this->services->addPetProfile($_POST)) {
                }

                $this->processCustomerCollectionRequest("GET");
                break;
        }
    }
}
