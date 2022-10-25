<?php
require_once dirname(__DIR__) . '/models/Account.php';

class AccountController
{
    private ?AccountServices $services = null;
    private ?LogServices $logservices = null;

    public function __construct(AccountServices $services, ?LogServices $logServices)
    {
        $this->services = $services;
        $this->logservices = $logServices;
    }

    // USER
    public function processUserRequest(string $method, ?string $id): void
    {
        if ($id) {
            $this->processUserResourceRequest($method, $id);
        } else {
            $this->processUserCollectionRequest($method);
        }
    }

    public function processUserResourceRequest(string $method, ?string $id): void
    {
    }

    public function processUserCollectionRequest(string $method): void
    {
        switch ($method) {
                // User Display
            case "GET":
                if (!isset($_SESSION)) session_start();
                $_SESSION["users"] = serialize($this->services->getUserAccounts());

                header("Location: http://localhost/dashboard/customers");
                break;
                // User registration
            case "POST":
                if (!isset($_SESSION)) session_start();
                $data = $_POST;
                if ($this->services->addAccount($data)) {
                    // redirect to registered landing
                    header("Location: http://localhost/login");
                    //echo "Added";
                } else {
                    //echo "ERROR";
                }
                break;
        }
    }

    // STAFF
    public function processStaffRequest(string $method, ?string $id): void
    {
        if ($id) {
            echo "STAFF RESOURCE";
            $this->processStaffResourceRequest($method, $id);
        } else {
            echo "STAFF COLLECTION";
            $this->processStaffCollectionRequest($method);
        }
    }

    public function processStaffResourceRequest(string $method, ?string $id): void
    {
        switch ($method) {
                // Staff Delete
            case "GET":
                echo "DELETE";
                if (!isset($_SESSION)) session_start();
                if ($this->services->deleteAccount($id)) {
                    $user = unserialize($_SESSION["user"]);
                    $log = $user->getFullName() . " has deleted Account ID $id";
                    if (!$this->logservices->addLog($log)) {
                        $_SESSION["msg"] = "There was an error in the logging of the action.";
                    }
                    $this->processStaffCollectionRequest($method);
                } else {
                    echo "Not deleted";
                }
                break;
                // Staff Update
            case "POST":
                echo "UPDATE";
                if (!isset($_SESSION)) session_start();
                $data = $_POST;
                if ($this->services->updateAccount($id, $data)) {
                    $user = unserialize($_SESSION["user"]);
                    $log = $user->getFullName() . " has updated Account ID $id";
                    if (!$this->logservices->addLog($log)) {
                        $_SESSION["msg"] = "There was an error in the logging of the action.";
                    }
                    $this->processStaffCollectionRequest("GET");
                } else {
                }
                break;
        }
    }

    public function processStaffCollectionRequest(string $method): void
    {
        switch ($method) {
                // Staff Display
            case "GET":
                if (!isset($_SESSION)) session_start();
                $_SESSION["staff"] = serialize($this->services->getStaffAccounts());

                header("Location: http://localhost/dashboard/staff");
                break;
                // Add Staff
            case "POST":
                if (!isset($_SESSION)) session_start();
                $data = $_POST;
                if ($this->services->addAccount($data) == true) {
                    $_SESSION["msg"] = "You have successfully added a new staff account.";
                    $user = unserialize($_SESSION["user"]);
                    $log = $user->getFullName() . " has added a staff account";
                    if ($this->logservices->addLog($log) == false) {
                        $_SESSION["msg"] = "There was an error in the logging of the action.";
                    }
                    $this->processStaffCollectionRequest("GET");
                } else {
                    $this->processStaffCollectionRequest("GET");
                }
                break;
        }
    }

    // Account Functionality
    public function loginRequest(string $method): void
    {
        switch ($method) {
                // Account login
            case "POST":
                if (!isset($_SESSION)) session_start();
                $account = $this->services->loginAccount($_POST["email"], $_POST["password"]);
                if (!is_null($account)) {
                    if ($account->getType() === "USER") {
                        // USER
                        //echo "USER REDIRECT";
                        header("Location: http://localhost/home");
                    } else {
                        // echo "TEST";
                        header("Location: http://localhost/dashboard");
                    }
                } else {
                    header("Location: http://localhost/login");
                }
                break;
        }
    }

    public function logoutRequest(): void
    {
        // Account logout
        if (!isset($_SESSION)) session_start();
        if ($this->services->logoutAccount()) {
            header("Location: http://localhost/login");
        } else {
            $_SESSION["msg"] = "There was an error on log out. Please try again.";
        }
    }

    public function forgotPasswordRequest($method, $email): void
    {
        switch($method)
        {
            
        }
    }
}
