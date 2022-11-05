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
                $_SESSION["users"] = serialize($this->services->getUserAccounts());
                header("Location: http://localhost/dashboard/customers");
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
                if (!$this->services->deleteAccount($id)) {
                    $this->processStaffCollectionRequest($method);
                }
                $user = unserialize($_SESSION["user"]);
                $log = $user->getFullName() . " has deleted Account ID $id";
                if (!$this->logservices->addLog($log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processStaffCollectionRequest($method);
                break;
                // Staff Update
            case "POST":
                echo "UPDATE";
                if (!isset($_SESSION)) session_start();
                if (!$this->services->updateAccount($id, $_POST)) {
                    $this->processStaffCollectionRequest("GET");
                }
                $user = unserialize($_SESSION["user"]);
                $log = $user->getFullName() . " has updated Account ID $id";
                if (!$this->logservices->addLog($log)) {
                    $_SESSION["msg"] .= "There was an error in the logging of the action.";
                }
                $this->processStaffCollectionRequest("GET");
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
                if (!$this->services->addAccount($_POST)) {
                    $this->processStaffCollectionRequest("GET");
                }
                $user = unserialize($_SESSION["user"]);
                $log = $user->getFullName() . " has added a staff account";
                if ($this->logservices->addLog($log) == false) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processStaffCollectionRequest("GET");
                break;
        }
    }

    // Account Functionality
    public function loginRequest(string $method): void
    {
        switch ($method) {
            // OTP Login 
            case "GET":
                if ($this->services->verifyLogin($_GET)) {
                    $account = unserialize($_SESSION["user"]);
                    if($account->getType() == "USER"){
                        unset($_SESSION["userOtp"]);
                        header("Location: http://localhost/home");
                    } else {
                        header("Location: http://localhost/dashboard");
                    }
                } else {
                    header("Location: http://localhost/verifylogin");
                }
                break;
            // Account login request
            case "POST":
                if (!isset($_SESSION)) session_start();
                if(!$this->services->loginRequest($_POST)){
                    header("Location: http://localhost/login");
                }
                header("Location: http://localhost/verifylogin");
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
        switch ($method) {
            case "GET":
                if ($this->services->forgotPasswordRequest($email)) {
                    // echo "true";
                    header("Location: http://localhost/forgot-confirm");
                } else {
                    // echo "false";
                    header("Location: http://localhost/forgot");
                }
                break;
            case "POST":
                if ($this->services->changePasswordRequest($email)) {
                    header("Location: http://localhost/userpasschanged");
                } else {
                    header("Location: http://localhost/forgot/$email");
                }
                break;
        }
    }

    public function registrationRequest($method): void
    {
        switch ($method) {
            case "GET":
                if ($this->services->verifyRegistration($_GET)) {
                    header("Location: http://localhost/registercomplete");
                } else {
                    header("Location: http://localhost/confirmregister");
                }
                break;
            case "POST":
                if (!isset($_SESSION)) session_start();
                if ($this->services->addAccount($_POST)) {
                    if ($this->services->registrationRequest($_POST)) {
                        header("Location: http://localhost/confirmregister");
                    } else {
                        header("Location: http://localhost/register");
                    }
                } else {
                    header("Location: http://localhost/register");
                }
                break;
        }
    }
}
