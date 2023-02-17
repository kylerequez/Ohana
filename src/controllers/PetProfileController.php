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
            case "GET":
                if (!$this->services->deletePetProfile($id)) {
                    $this->processCollectionRequest("GET");
                }
                $account = unserialize($_SESSION["user"]);
                $log = $account->getFullName() . " has deleted Pet Profile ID $id";
                if (!$this->logservices->addLog($account->getId(), $account->getType(), $log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processCollectionRequest("GET");
                exit();
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
                if (!$this->services->updatePetProfile($id, $_POST)) {
                    $this->processCollectionRequest("GET");
                }
                $account = unserialize($_SESSION["user"]);
                $log = $account->getFullName() . " has updated Pet Profile ID $id";
                if (!$this->logservices->addLog($account->getId(), $account->getType(), $log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processCollectionRequest("GET");
                exit();
        }
    }

    public function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                $_SESSION["profiles"] = serialize($this->services->getOhanaPets());
                header("Location: https://" . DOMAIN_NAME . "/dashboard/pet-profiles");
                exit();
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
                $account = unserialize($_SESSION["user"]);
                $_POST["image"] = file_get_contents($_FILES["image"]["tmp_name"]);
                $_POST["accountId"] = $account->getType() != "USER" ? 1 : $account->getId();
                if (!$this->services->addPetProfile($_POST)) {
                    $this->processCollectionRequest("GET");
                }
                $log = $account->getFullName() . " has added a Pet Profile.";
                if (!$this->logservices->addLog($account->getId(), $account->getType(), $log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processCollectionRequest("GET");
                exit();
        }
    }

    public function processAdminStudRequest(string $method, ?string $id): void
    {
        if ($id) {
            $this->processAdminStudResourceRequest($method, $id);
        } else {
            $this->processAdminStudCollectionRequest($method);
        }
    }

    public function processAdminStudResourceRequest(string $method, string $id): void
    {
        switch ($method) {
            case "GET":
                header("Location: https://" . DOMAIN_NAME . "/dashboard/stud-profiles");
                exit();
            case "POST":
                exit();
        }
    }

    public function processAdminStudCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                exit();
            case "POST":
                exit();
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
                exit();
            case "POST":
                exit();
        }
    }

    public function processRehomingCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                header("Location: https://" . DOMAIN_NAME . "/puppies");
                exit();
            case "POST":

                exit();
        }
    }

    public function processStudRequest(string $method, ?string $id): void
    {
        if ($id) {
            $this->processStudResourceRequest($method, $id);
        } else {
            $this->processStudCollectionRequest($method);
        }
    }

    public function processStudResourceRequest(string $method, string $id): void
    {
        switch ($method) {
            case "GET":
                exit();
            case "POST":
                exit();
        }
    }

    public function processStudCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                header("Location: https://" . DOMAIN_NAME . "/stud");
                exit();
            case "POST":
                exit();
        }
    }

    public function displayPetProfile(string $id): void
    {
        $user = unserialize($_SESSION["user"]);
        $profile = $this->services->getPetProfileById($id, $user->getId());
        if (empty($profile)) {
            header("Location: https://" . DOMAIN_NAME . "/ownedpets");
        }
        header("Location: https://" . DOMAIN_NAME . "/ownedpets/" . $profile->getName());
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
                if (!$this->services->deletePetProfile($id)) {
                    $this->processCustomerCollectionRequest("GET");
                }
                $_SESSION['msg'] = "You have successfully deleted a Pet Profile.";
                $this->processCustomerCollectionRequest("GET");
                exit();
            case "POST":
                $account = unserialize($_SESSION["user"]);
                $_POST["accountId"] = $account->getType() != "USER" ? 1 : $account->getId();
                $_POST["ownerName"] = $account->getType() == "USER" ? $account->getFname() . " " . $account->getLname() : "OHANA KENNEL BUSINESS";
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
                        $this->processCustomerCollectionRequest("GET");
                        exit();
                    }
                    if ($_FILES['image']['size'] > 1000000) {
                        $_SESSION["msg"] = "The image size must not be greater than 1 MB.";
                        $this->processCustomerCollectionRequest("GET");
                        exit();
                    }
                } else {
                    $_POST["image"] = base64_decode($_POST["old_image"]);
                }
                if (!$this->services->updatePetProfile($id, $_POST)) {
                    $this->processCustomerCollectionRequest("GET");
                }
                $_SESSION['msg'] = "You have successfully updated a Pet Profile.";
                $this->processCustomerCollectionRequest("GET");
                exit();
        }
    }

    public function processCustomerCollectionRequest($method): void
    {
        switch ($method) {
            case "GET":
                header("Location: https://" . DOMAIN_NAME . "/ownedpets");
                exit();
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
                    $this->processCustomerCollectionRequest("GET");
                    exit();
                }
                if ($_FILES['image']['size'] > 1000000) {
                    $_SESSION["msg"] = "The image size must not be greater than 1 MB.";
                    $this->processCustomerCollectionRequest("GET");
                    exit();
                }
                $account = unserialize($_SESSION["user"]);
                $_POST["image"] = file_get_contents($_FILES["image"]["tmp_name"]);
                $_POST["accountId"] = $account->getType() != "USER" ? 1 : $account->getId();
                $_POST["ownerName"] = ($account->getType() == "USER") ? $account->getFname() . " " . $account->getLname() : "OHANA KENNEL BUSINESS";
                $_POST["price"] = 0;
                if (!$this->services->addPetProfile($_POST)) {
                }
                $this->processCustomerCollectionRequest("GET");
                exit();
        }
    }
}
