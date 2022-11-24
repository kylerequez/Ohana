<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

include_once dirname(__DIR__) . '/vendor/autoload.php';
class AccountServices
{
    private ?AccountDAO $dao = null;

    public function __construct(AccountDAO $dao)
    {
        $this->dao = $dao;
    }

    public function searchById(string $id): mixed
    {
        return $this->dao->searchById($id);
    }

    public function getAllAccounts(): mixed
    {
        return $this->dao->getAllAccounts();
    }

    public function getUserAccounts(): mixed
    {
        return $this->dao->getUserAccounts();
    }

    public function getUserAccountsPagination(string $limit, string $offset): mixed
    {
        return $this->dao->getUserAccountsPagination($limit, $offset);
    }

    public function getTotalUserCount(): mixed
    {
        return $this->dao->getTotalUserCount();
    }

    public function getStaffAccounts(): mixed
    {
        return $this->dao->getStaffAccounts();
    }

    public function getStaffAccountsPagination(string $limit, string $offset): mixed
    {
        return $this->dao->getStaffAccountsPagination($limit, $offset);
    }

    public function getTotalStaffCount(): mixed
    {
        return $this->dao->getTotalStaffCount();
    }

    public function addAccount(array $data): mixed
    {
        $type = trim($data["type"]);
        $fname = trim($data["fname"]);
        $mname = !empty($data["mname"]) ? trim($data["mname"]) : null;
        $lname = trim($data["lname"]);
        $email = trim($data["email"]);
        $number = "+63" . trim($data["number"]);
        $password = password_hash(trim($data["password"]), PASSWORD_DEFAULT);
        $status = trim($data["status"]);
        $account = new Account($type, $fname, $mname, $lname, $number, $email, $status, $password);
        if (!is_null($this->dao->searchByEmail($email)) and !is_null($this->dao->searchByNumber($number))) {
            $_SESSION["msg"] = "The account already exists in the database.";
            return false;
        }
        if (!$this->dao->createAccount($account)) {
            $_SESSION["msg"] = "There was an error in adding the account in the database.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully added a new " . strtolower($type) . " account.";
        return true;
    }

    public function updateAccount(string $id, array $data): bool
    {
        if (is_null($this->dao->searchById($id))) {
            $_SESSION["msg"] = "There was an error in updating the account. The account does not exist in the database.";
            return false;
        }
        $type = trim($data["type"]);
        $fname = trim($data["fname"]);
        $mname = trim($data["mname"]);
        $lname = trim($data["lname"]);
        $email = trim($data["email"]);
        $number = "+63" . trim($data["number"]);
        $status = trim($data["status"]);
        $account = new Account($type, $fname, $mname, $lname, $number, $email, $status, null);
        $account->setId($id);
        if (!$this->dao->updateAccount($account)) {
            $_SESSION["msg"] = "There was an error in updating the account.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully updated Account $id!";
        return true;
    }

    public function deleteAccount(string $id): bool
    {
        if (is_null($this->dao->searchById($id))) {
            $_SESSION["msg"] = "Account not deleted! The user does not exists";
            return false;
        }
        if (!$this->dao->deleteById($id)) {
            $_SESSION["msg"] = "There was an error in deleting the account.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully deleted Account $id!";
        return true;
    }

    public function changePassword(string $id, array $data): bool
    {
        print_r($data);
        return true;
    }

    public function loginRequest(array $data): bool
    {
        $email = trim($data["email"]);
        $password = trim($data["password"]);
        $account = $this->dao->searchByEmail($email);
        if (is_null($account)) {
            $_SESSION["msg"] = "The account credentials you have entered is not in the database. Please consider registering a new account.";
            return false;
        }
        if ($account->getStatus() == "DISABLED") {
            $_SESSION["msg"] = "The account you have entered has been disabled. Please contact an administrator for more details.";
            return false;
        }
        if ($account->getStatus() == "UNREGISTERED") {
            $_SESSION["msg"] = "The account you have entered has yet to be verified. Please verify your account or contact an administrator for more details.";
            return false;
        }
        if (!password_verify($password, $account->getPassword())) {
            $_SESSION["msg"] = "You have entered the wrong password. Please try again.";
            return false;
        }
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = 'ohana.kennel.business@gmail.com';
        $mail->Password = 'ctdlqnibzafgmwyj';
        $mail->setFrom('ohana.kennel.business@gmail.com');
        $mail->addAddress($email);
        $mail->Subject = 'Ohana Account Login OTP';
        $otp = rand(100000, 999999);
        $mail->Body = "Your Ohana Account Login OTP is: $otp";
        $mail->AltBody = 'Ohana Account Login OTP';
        if (!$mail->send()) {
            $_SESSION["msg"] = "There was an error in sending the otp to your mail.";
            return false;
        } else {
            $_SESSION["userOtp"] = $otp;
            $_SESSION["email"] = $email;
            return true;
        }
    }

    public function verifyLogin(array $data): mixed
    {
        if (is_null($_SESSION["userOtp"])) {
            echo "No OTP";
            $_SESSION["msg"] = "There was no OTP issued in your account. Please try again.";
            return false;
        }
        $otp = implode($data);
        if ($otp != $_SESSION["userOtp"]) {
            echo "The OTP entered was incorrect. Please try again.";
            $_SESSION["msg"] = "The OTP entered was incorrect. Please try again.";
            return false;
        }
        $email = $_SESSION["email"];
        $account = $this->dao->searchByEmail($email);
        if (is_null($account)) {
            $_SESSION["msg"] = "There was an error in verifying your account. Please try again.";
            return false;
        }
        $_SESSION["user"] = serialize($account);
        return true;
    }

    public function logoutAccount(): bool
    {
        if (!isset($_SESSION["user"])) {
            return false;
        }
        session_destroy();
        return true;
    }

    public function forgotPasswordRequest(string $email): bool
    {
        if (is_null($this->dao->searchByEmail($email))) {
            if (!isset($_SESSION)) session_start();
            $_SESSION["msg"] = "The account does not exist. Please try again";
            return false;
        }
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = 'ohana.kennel.business@gmail.com';
        $mail->Password = 'ctdlqnibzafgmwyj';
        $mail->setFrom('ohana.kennel.business@gmail.com');
        $mail->addAddress($email);
        $mail->Subject = 'Ohana Account Password Reset';
        $token = uniqid();
        $mail->Body = 'Your Ohana Account password reset link: <a href="localhost/forgot-password/change/' . $token . '">Click Here</a>';
        $mail->AltBody = 'Reset Password Link for Ohana Account';
        if (!$mail->send()) {
            $_SESSION["msg"] = "There was an error in sending the reset link to your mail.";
            return false;
        } else {
            $_SESSION["token"] = $token;
            $_SESSION["email"] = $email;
            return true;
        }
    }

    public function resendForgotPasswordRequest(string $email, string $token): bool
    {
        if ($token != $_SESSION["token"]) {
            session_destroy();
            $_SESSION["msg"] = "The password reset request does not exist. Please try again.";
            header("Location: http://localhost/forgot-password");
            return false;
        }
        if (is_null($this->dao->searchByEmail($email))) {
            if (!isset($_SESSION)) session_start();
            $_SESSION["msg"] = "The account does not exist. Please try again";
            return false;
        }
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = 'ohana.kennel.business@gmail.com';
        $mail->Password = 'ctdlqnibzafgmwyj';
        $mail->setFrom('ohana.kennel.business@gmail.com');
        $mail->addAddress($email);
        $mail->Subject = 'Ohana Account Password Reset';
        $token = $_SESSION["token"];
        $mail->Body = 'Your Ohana Account password reset link: <a href="localhost/forgot-password/change/' . $token . '">Click Here</a>';
        $mail->AltBody = 'Reset Password Link for Ohana Account';
        if (!$mail->send()) {
            $_SESSION["msg"] = "There was an error in resending the reset link to your mail.";
            return false;
        }
        $_SESSION["msg"] = "The email was successfully resent to your email. Please check your inbox.";
        return true;
    }

    public function updatePassword(array $data): bool
    {
        $user = unserialize($_SESSION["user"]);
        if(!password_verify($data["old-password"], $user->getPassword())){
            $_SESSION["msg"] = "You've entered the wrong current password.";
            return false;
        }
        if(password_verify($data["password"], $user->getPassword())) {
            $_SESSION["msg"] = "New password cannot be same as the old password.";
            return false;
        }
        if($data["password"] !=  $data["confirm-password"]) {
            $_SESSION["msg"] = "New Password and Confirm Password must match.";
            return false;
        }
        $password = password_hash(trim($_GET["password"]), PASSWORD_DEFAULT);
        if(!$this->dao->updatePassword($user->getId(), $password)) {
            $_SESSION["msg"] = "There was an error in changing the password. The password was not changed.";
            return false;
        }
        $_SESSION["msg"] = "Your password was successfully changed!";
        return true;
    }

    public function changePasswordRequest(string $email): bool
    {
        $account = $this->dao->searchByEmail(trim($email));
        if (is_null($account)) {
            $_SESSION["msg"] = "There was an error in changing the password. Account not found.";
            return false;
        }
        if (password_verify($_POST["password"], $account->getPassword())) {
            $_SESSION["msg"] = "There was an error in changing the password. New password cannot be same as the old password.";
            return false;
        }
        $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);
        if (!$this->dao->changePassword($email, $password)) {
            $_SESSION["msg"] = "There was an error in changing the password. The password was not changed.";
            return false;
        } else {
            return true;
        }
    }

    public function registrationRequest(array $data): mixed
    {
        $email = trim($data["email"]);
        $account = $this->dao->searchByEmail($email);
        if (is_null($account)) {
            $_SESSION["msg"] = "The account does not exist in the database.";
            return false;
        }
        if ($account->getStatus() != "UNREGISTERED") {
            $_SESSION["msg"] = "The account does is already registered. Please log in.";
            return false;
        }
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = 'ohana.kennel.business@gmail.com';
        $mail->Password = 'ctdlqnibzafgmwyj';
        $mail->setFrom('ohana.kennel.business@gmail.com');
        $mail->addAddress($email);
        $mail->Subject = 'Ohana Account Verification OTP';
        $otp = rand(100000, 999999);
        $mail->Body = "Your Ohana Account OTP is: $otp";
        $mail->AltBody = 'Ohana Registration OTP';
        if (!$mail->send()) {
            $_SESSION["msg"] = "There was an error in sending the otp to your mail.";
            return false;
        } else {
            $_SESSION["token"] = uniqid();
            $_SESSION["userOtp"] = $otp;
            $_SESSION["email"] = $email;
            return true;
        }
    }

    public function verifyRegistration(array $data): mixed
    {
        if (is_null($_SESSION["userOtp"])) {
            echo "No OTP";
            $_SESSION["msg"] = "There was no OTP issued in your account. Please try again.";
            return false;
        }
        $otp = implode($data);
        if ($otp != $_SESSION["userOtp"]) {
            echo "The OTP entered was incorrect. Please try again.";
            $_SESSION["msg"] = "The OTP entered was incorrect. Please try again.";
            return false;
        }
        $email = $_SESSION["email"];
        if (!$this->dao->verifyAccount($email)) {
            $_SESSION["msg"] = "There was an error in verifying your account. Please try again.";
            return false;
        }
        return true;
    }

    public function resendRegistrationRequest(string $email, string $token): bool
    {
        if ($token != $_SESSION["token"]) {
            session_destroy();
            $_SESSION["msg"] = "The account registration request does not exist. Please try again.";
            header("Location: http://localhost/register");
            return false;
        }
        $account = $this->dao->searchByEmail($email);
        if (is_null($account)) {
            $_SESSION["msg"] = "The account does not exist in the database.";
            return false;
        }
        if ($account->getStatus() != "UNREGISTERED") {
            $_SESSION["msg"] = "The account does is already registered. Please log in.";
            return false;
        }
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = 'ohana.kennel.business@gmail.com';
        $mail->Password = 'ctdlqnibzafgmwyj';
        $mail->setFrom('ohana.kennel.business@gmail.com');
        $mail->addAddress($email);
        $mail->Subject = 'Ohana Account Verification OTP';
        $otp = $_SESSION["userOtp"];
        $mail->Body = "Your Ohana Account OTP is: $otp";
        $mail->AltBody = 'Ohana Registration OTP';
        if (!$mail->send()) {
            $_SESSION["msg"] = "There was an error in sending the otp to your mail.";
            return false;
        }
        $_SESSION["msg"] = "The OTP was successfully resent to your email. Please check your inbox.";
        return true;
    }
}
