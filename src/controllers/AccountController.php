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
                header("Location: http://" . DOMAIN_NAME . "/dashboard/customers?page=$page");
                break;
        }
    }

    public function processEditAccount(string $method): void
    {
        switch ($method) {
            case "GET":
                $user = unserialize($_SESSION["user"]);
                if (!$this->services->updatePassword($_GET)) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    break;
                }
                $_SESSION["user"] = serialize($this->services->searchById($user->getId()));
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                break;
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

    public function processStaffRequest(string $method, ?string $id): void
    {
        if ($id) {
            $this->processStaffResourceRequest($method, $id);
        } else {
            $this->processStaffCollectionRequest($method);
        }
    }

    public function processStaffResourceRequest(string $method, ?string $id): void
    {
        switch ($method) {
            case "GET":
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
            case "POST":
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

            case "GET":
                $_SESSION["staff"] = serialize($this->services->getStaffAccounts());
                // $page = !isset($_GET["page"]) ? 1 : $_GET["page"];
                // $_SESSION["totalStaff"] = $this->services->getTotalStaffCount();
                // header("Location: http://" . DOMAIN_NAME . "/dashboard/staff?page=$page");
                header("Location: http://" . DOMAIN_NAME . "/dashboard/staff");
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
                        unset($_SESSION["token"]);
                        $_SESSION["cart"] = serialize(new Cart());
                        header("Location: http://" . DOMAIN_NAME . "/home");
                        break;
                    } else {
                        header("Location: http://" . DOMAIN_NAME . "/dashboard");
                        break;
                    }
                } else {
                    header("Location: http://" . DOMAIN_NAME . "/verifylogin");
                    break;
                }
                break;
            case "POST":
                if (!isset($_SESSION)) session_start();
                if (!$this->services->loginRequest($_POST)) {
                    header("Location: http://" . DOMAIN_NAME . "/login");
                    break;
                }
                header("Location: http://" . DOMAIN_NAME . "/verifylogin");
                break;
        }
    }

    public function resendLoginRequest(string $method, string $email, string $token): void
    {
        switch ($method) {
            case "GET":
                if (!$this->services->resendLoginRequest($email, $token)) {
                    header("Location: http://" . DOMAIN_NAME . "/verifylogin");
                    break;
                }
                header("Location: http://" . DOMAIN_NAME . "/verifylogin");
                break;
        }
    }

    public function logoutRequest(): void
    {
        if ($this->services->logoutAccount()) {
            header("Location: http://" . DOMAIN_NAME . "/login");
        } else {
            $_SESSION["msg"] = "There was an error on log out. Please try again.";
        }
    }

    public function forgotPasswordRequest($method, $email): void
    {
        switch ($method) {
            case "GET":
                if ($this->services->forgotPasswordRequest($email)) {
                    header("Location: http://" . DOMAIN_NAME . "/forgot-password/confirm");
                    break;
                } else {
                    header("Location: http://" . DOMAIN_NAME . "/forgot-password");
                    break;
                }
                break;
            case "POST":
                if ($this->services->changePasswordRequest($email)) {
                    header("Location: http://" . DOMAIN_NAME . "/forgot-password/success");
                    break;
                } else {
                    header("Location: http://" . DOMAIN_NAME . "/forgot-password/change/" . $_SESSION["token"]);
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
                header("Location: http://" . DOMAIN_NAME . "/forgot-password/confirm");
                break;
        }
    }

    public function registrationRequest($method): void
    {
        switch ($method) {
            case "GET":
                if ($this->services->verifyRegistration($_GET)) {
                    header("Location: http://" . DOMAIN_NAME . "/register/success");
                    break;
                } else {
                    header("Location: http://" . DOMAIN_NAME . "/register/confirm");
                    break;
                }
                break;
            case "POST":
                if (!isset($_SESSION)) session_start();
                if ($this->services->addAccount($_POST)) {
                    if ($this->services->registrationRequest($_POST)) {
                        unset($_SESSION["msg"]);
                        header("Location: http://" . DOMAIN_NAME . "/register/confirm");
                        break;
                    } else {
                        header("Location: http://" . DOMAIN_NAME . "/register");
                        break;
                    }
                } else {
                    header("Location: http://" . DOMAIN_NAME . "/register");
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
                header("Location: http://" . DOMAIN_NAME . "/register/confirm");
                break;
        }
    }
}
