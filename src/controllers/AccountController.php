<?php
require_once dirname(__DIR__) . '/models/Account.php';
require_once dirname(__DIR__) . '/models/Cart.php';
require_once dirname(__DIR__) . '/config/app-config.php';
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
            case "GET":
                $_SESSION["users"] = serialize($this->services->getUserAccountsPagination(!isset($_GET["limit"]) ? _RESOURCE_PER_PAGE_ : $_GET["limit"], !isset($_GET["offset"]) ? _BASE_OFFSET_ : $_GET["offset"]));
                $page = !isset($_GET["page"]) ? 1 : $_GET["page"];
                $_SESSION["totalUsers"] = $this->services->getTotalUserCount();
                header("Location: http://localhost/dashboard/customers?page=$page");
                break;
        }
    }

    public function processEditAccount(string $method): void
    {
        switch ($method) {
            case "POST":
                $user = unserialize($_SESSION["user"]);
                if (!$this->services->updateAccount($user->getId(), $_POST)) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    break;
                }
                $_SESSION["msg"] = "You have successfully updated your account!";
                $_SESSION["user"] = serialize($this->services->searchById($user->getId()));
                header('Location: ' . $_SERVER['HTTP_REFERER']);
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
                $_SESSION["staff"] = serialize($this->services->getStaffAccountsPagination(!isset($_GET["limit"]) ? _RESOURCE_PER_PAGE_ : $_GET["limit"], !isset($_GET["offset"]) ? _BASE_OFFSET_ : $_GET["offset"]));
                $page = !isset($_GET["page"]) ? 1 : $_GET["page"];
                $_SESSION["totalStaff"] = $this->services->getTotalStaffCount();
                header("Location: http://localhost/dashboard/staff?page=$page");
                break;
                // Add Staff
            case "POST":
                if (!$this->services->addAccount($_POST)) {
                    $this->processStaffCollectionRequest("GET");
                    break;
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
                    if ($account->getType() == "USER") {
                        unset($_SESSION["userOtp"]);
                        unset($_SESSION["email"]);
                        $_SESSION["cart"] = serialize(new Cart());
                        header("Location: http://localhost/home");
                        break;
                    } else {
                        header("Location: http://localhost/dashboard");
                        break;
                    }
                } else {
                    header("Location: http://localhost/verifylogin");
                    break;
                }
                break;
                // Account login request
            case "POST":
                if (!isset($_SESSION)) session_start();
                if (!$this->services->loginRequest($_POST)) {
                    header("Location: http://localhost/login");
                    break;
                }
                header("Location: http://localhost/verifylogin");
                break;
        }
    }

    public function logoutRequest(): void
    {
        // Account logout
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
                    header("Location: http://localhost/forgot-password/confirm");
                    break;
                } else {
                    header("Location: http://localhost/forgot-password");
                    break;
                }
                break;
            case "POST":
                if ($this->services->changePasswordRequest($email)) {
                    header("Location: http://localhost/forgot-password/success");
                    break;
                } else {
                    header("Location: http://localhost/forgot-password/change/" . $_SESSION["token"]);
                    break;
                }
                break;
        }
    }

    public function resendForgotPasswordRequest(string $method, string $email, string $token): void
    {
        switch ($method) {
            case "GET":
                $this->services->resendForgotPasswordRequest($email, $token);
                header("Location: http://localhost/forgot-password/confirm");
                break;
        }
    }

    public function registrationRequest($method): void
    {
        switch ($method) {
            case "GET":
                if ($this->services->verifyRegistration($_GET)) {
                    header("Location: http://localhost/register/success");
                    break;
                } else {
                    header("Location: http://localhost/register/confirm");
                    break;
                }
                break;
            case "POST":
                if (!isset($_SESSION)) session_start();
                if ($this->services->addAccount($_POST)) {
                    if ($this->services->registrationRequest($_POST)) {
                        header("Location: http://localhost/register/confirm");
                        break;
                    } else {
                        header("Location: http://localhost/register");
                        break;
                    }
                } else {
                    header("Location: http://localhost/register");
                    break;
                }
                break;
        }
    }

    public function resendRegistrationRequest(string $method, string $email, string $token): void
    {
        switch ($method) {
            case "GET":
                $this->services->resendRegistrationRequest($email, $token);
                header("Location: http://localhost/register/confirm");
                break;
        }
    }
}
