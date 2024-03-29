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
                header("Location: https://" . DOMAIN_NAME . "/dashboard/customers");
                exit();
        }
    }

    public function processEditAccount(string $method): void
    {
        switch ($method) {
            case "GET":
                $user = unserialize($_SESSION["user"]);
                if (!$this->services->updatePassword($_GET)) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit();
                }
                $_SESSION["user"] = serialize($this->services->searchById($user->getId()));
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            case "POST":
                $user = unserialize($_SESSION["user"]);
                if (!$this->services->updateAccount($user->getId(), $_POST)) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit();
                }
                $_SESSION["msg"] = "You have successfully updated your account!";
                $_SESSION["user"] = serialize($this->services->searchById($user->getId()));
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
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
                if (!$this->logservices->addLog($user->getId(), $user->getType(), $log)) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processStaffCollectionRequest($method);
                exit();
            case "POST":
                if (!$this->services->updateAccount($id, $_POST)) {
                    $this->processStaffCollectionRequest("GET");
                }
                $user = unserialize($_SESSION["user"]);
                $log = $user->getFullName() . " has updated Account ID $id";
                if (!$this->logservices->addLog($user->getId(), $user->getType(), $log)) {
                    $_SESSION["msg"] .= "There was an error in the logging of the action.";
                }
                $this->processStaffCollectionRequest("GET");
                exit();
        }
    }

    public function processStaffCollectionRequest(string $method): void
    {
        switch ($method) {

            case "GET":
                header("Location: https://" . DOMAIN_NAME . "/dashboard/staff");
                exit();
                // Add Staff
            case "POST":
                if (!$this->services->addAccount($_POST)) {
                    $this->processStaffCollectionRequest("GET");
                    exit();
                }
                $user = unserialize($_SESSION["user"]);
                $log = $user->getFullName() . " has added a staff account";
                if ($this->logservices->addLog($user->getId(), $user->getType(), $log) == false) {
                    $_SESSION["msg"] = "There was an error in the logging of the action.";
                }
                $this->processStaffCollectionRequest("GET");
                exit();
        }
    }

    // Account Functionality
    public function loginRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                if ($this->services->verifyLogin($_GET)) {
                    $account = unserialize($_SESSION["user"]);
                    unset($_SESSION["userOtp"]);
                    unset($_SESSION["email"]);
                    unset($_SESSION["token"]);
                    unset($_SESSION['time']);
                    $_SESSION["cart"] = serialize(new Cart());
                    if ($account->getType() == "USER") {
                        header("Location: https://" . DOMAIN_NAME . "/home");
                        exit();
                    } else {
                        header("Location: https://" . DOMAIN_NAME . "/dashboard/home");
                        exit();
                    }
                } else {
                    header("Location: https://" . DOMAIN_NAME . "/verifylogin");
                    exit();
                }
                exit();
            case "POST":
                if (!isset($_SESSION)) session_start();
                if (!$this->services->loginRequest($_POST)) {
                    header("Location: https://" . DOMAIN_NAME . "/login");
                    exit();
                }
                date_default_timezone_set('Asia/Manila');
                $_SESSION['time'] = time();
                unset($_SESSION["msg"]);
                header("Location: https://" . DOMAIN_NAME . "/verifylogin");
                exit();
        }
    }

    public function resendLoginRequest(string $method, string $email, string $token): void
    {
        switch ($method) {
            case "GET":
                if (!$this->services->resendLoginRequest($email, $token)) {
                    header("Location: https://" . DOMAIN_NAME . "/verifylogin");
                    exit();
                }
                header("Location: https://" . DOMAIN_NAME . "/verifylogin");
                exit();
        }
    }

    public function logoutRequest(): void
    {
        if ($this->services->logoutAccount()) {
            header("Location: https://" . DOMAIN_NAME . "/login");
        } else {
            $_SESSION["msg"] = "There was an error on account log out. Please try again.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }

    public function forgotPasswordRequest($method, $email): void
    {
        switch ($method) {
            case "GET":
                if (!isset($_SESSION)) session_start();
                if ($this->services->forgotPasswordRequest($email)) {
                    date_default_timezone_set('Asia/Manila');
                    $_SESSION['time'] = time();
                    unset($_SESSION["msg"]);
                    header("Location: https://" . DOMAIN_NAME . "/forgot-password/confirm");
                    exit();
                } else {
                    header("Location: https://" . DOMAIN_NAME . "/forgot-password");
                    exit();
                }
                exit();
            case "POST":
                if (!$this->services->changePasswordRequest($email)) {
                    header("Location: https://" . DOMAIN_NAME . "/forgot-password/change/" . $_SESSION["token"]);
                    exit();
                }
                header("Location: https://" . DOMAIN_NAME . "/forgot-password/success");
                exit();
        }
    }

    public function resendForgotPasswordRequest(string $method, string $email, string $token): void
    {
        switch ($method) {
            case "GET":
                $this->services->resendForgotPasswordRequest($email, $token);
                header("Location: https://" . DOMAIN_NAME . "/forgot-password/confirm");
                exit();
        }
    }

    public function registrationRequest($method): void
    {
        switch ($method) {
            case "GET":
                if ($this->services->verifyRegistration($_GET)) {
                    header("Location: https://" . DOMAIN_NAME . "/register/success");
                    exit();
                } else {
                    header("Location: https://" . DOMAIN_NAME . "/register/confirm");
                    exit();
                }
                exit();
            case "POST":
                if (!isset($_SESSION)) session_start();
                if ($this->services->addAccount($_POST)) {
                    if ($this->services->registrationRequest($_POST)) {
                        date_default_timezone_set('Asia/Manila');
                        $_SESSION['time'] = time();
                        unset($_SESSION["msg"]);
                        header("Location: https://" . DOMAIN_NAME . "/register/confirm");
                        exit();
                    } else {
                        header("Location: https://" . DOMAIN_NAME . "/register");
                        exit();
                    }
                } else {
                    header("Location: https://" . DOMAIN_NAME . "/register");
                    exit();
                }
                exit();
        }
    }

    public function resendRegistrationRequest(string $method, string $email, string $token): void
    {
        switch ($method) {
            case "GET":
                $this->services->resendRegistrationRequest($email, $token);
                header("Location: https://" . DOMAIN_NAME . "/register/confirm");
                exit();
        }
    }
}
