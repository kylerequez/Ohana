<?php

require_once dirname(__DIR__) . '/models/Account.php';
require_once dirname(__DIR__) . '/config/app-config.php';

class VaccineRecordController
{
    private ?VaccineRecordServices $services = null;
    private ?LogServices $logservices = null;
    public function __construct(VaccineRecordServices $services, LogServices $logservices)
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
                if (!$this->services->deleteVaccineRecord($id)) {
                    $this->processCollectionRequest($method);
                }
                $user = unserialize($_SESSION["user"]);
                $log = $user->getFullName() . " has deleted Vaccine Record ID $id";
                if (!$this->logservices->addLog($user->getId(), $user->getType(), $log)) {
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
                if (!$this->services->updateVaccineRecord($id, $_POST)) {
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
                header("Location: " . $_SERVER['HTTP_REFERER']);
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
                $user = unserialize($_SESSION["user"]);
                $_POST["image"] = file_get_contents($_FILES["image"]["tmp_name"]);
                $_POST["accountId"] = $user->getType() != "USER" ? 1 : $user->getId();
                if (!$this->services->addVaccineRecord($_POST)) {
                    $this->processCollectionRequest("GET");
                }
                $log = $user->getFullName() . " has added a vaccine record.";
                if (!$this->logservices->addLog($user->getId(), $user->getType(), $log)) {
                    $_SESSION["msg"] = "There was an error in adding the log.";
                }
                $this->processCollectionRequest("GET");
                exit();
        }
    }
}
