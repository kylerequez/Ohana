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

    public function getAllAccounts(): mixed
    {
        return $this->dao->getAllAccounts();
    }

    public function getUserAccounts(): mixed
    {
        return $this->dao->getUserAccounts();
    }

    public function getStaffAccounts(): mixed
    {
        return $this->dao->getStaffAccounts();
    }

    public function addAccount(array $data): mixed
    {
        $type = trim($data["type"]);
        $fname = trim($data["fname"]);
        $mname = trim($data["mname"]);
        $lname = trim($data["lname"]);
        $email = trim($data["email"]);
        $number = trim($data["number"]);
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
        $number = trim($data["number"]);
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

    public function loginAccount(string $email, string $password): mixed
    {
        $account = $this->dao->searchByEmail($email);
        if (is_null($account)) {
            $_SESSION["msg"] = "The account credentials you have entered is not in the database. Please consider registering a new account.";
            return null;
        }
        if ($account->getStatus() == "DISABLED" or $account->getStatus() == "UNREGISTERED") {
            $_SESSION["msg"] = "The account you have entered has been disabled or is unregistered. Please contact an administrator for more details.";
            return null;
        }
        if (!password_verify($password, $account->getPassword())) {
            $_SESSION["msg"] = "You have entered the wrong password. Please try again.";
            return null;
        }
        $_SESSION["user"] = serialize($account);
        return $account;
    }

    public function logoutAccount(): bool
    {
        if (!isset($_SESSION["user"])) {
            return false;
        }
        session_unset();
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
        // Create a new PHPMailer instance
        $mail = new PHPMailer();
        // Tell PHPMailer to use SMTP
        $mail->isSMTP();
        // Enable SMTP debugging
        // SMTP::DEBUG_OFF = off (for production use)
        // SMTP::DEBUG_CLIENT = client messages
        // SMTP::DEBUG_SERVER = client and server messages
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        // Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // Use `$mail->Host = gethostbyname('smtp.gmail.com');`
        // if your network does not support SMTP over IPv6,
        // though this may cause issues with TLS
        // Set the SMTP port number:
        // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
        // - 587 for SMTP+STARTTLS
        $mail->Port = 465;
        // Set the encryption mechanism to use:
        // - SMTPS (implicit TLS on port 465) or
        // - STARTTLS (explicit TLS on port 587)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        // Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        // Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'ohana.kennel.business@gmail.com';
        // Password to use for SMTP authentication
        $mail->Password = 'ctdlqnibzafgmwyj';
        // Set who the message is to be sent from
        // Note that with gmail you can only use your account address (same as `Username`)
        // or predefined aliases that you have configured within your account.
        // Do not use user-submitted addresses in here
        $mail->setFrom('ohana.kennel.business@gmail.com');
        // Set an alternative reply-to address
        // This is a good place to put user-submitted addresses
        // $mail->addReplyTo('replyto@example.com', 'First Last');
        // Set who the message is to be sent to
        $mail->addAddress($email);
        // Set the subject line
        $mail->Subject = 'Ohana Account Password Reset';
        // Read an HTML message body from an external file, convert referenced images to embedded,
        // convert HTML into a basic plain-text alternative body
        // $mail->msgHTML(file_get_contents('/phpmailertest/contents.html'), dirname(__DIR__) . '/phpmailertest/');
        $mail->Body = 'Your Ohana Account password reset link: <a href="localhost/forgot/' . $email . '">Click Here</a>';
        //Replace the plain text body with one created manually
        $mail->AltBody = 'Reset Password Link for Ohana Account';
        // Attach an image file
        // $mail->addAttachment('images/phpmailer_mini.png');
        //send the message, check for errors
        if (!$mail->send()) {
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
            $_SESSION["msg"] = "There was an error in sending the reset link to your mail.";
            return false;
        } else {
            //echo 'Message sent!';
            return true;
        }
    }

    public function changePasswordRequest(string $email): bool
    {
        $account = $this->dao->searchByEmail(trim($email));
        // print_r($account);
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
        // Create a new PHPMailer instance
        $mail = new PHPMailer();
        // Tell PHPMailer to use SMTP
        $mail->isSMTP();
        // Enable SMTP debugging
        // SMTP::DEBUG_OFF = off (for production use)
        // SMTP::DEBUG_CLIENT = client messages
        // SMTP::DEBUG_SERVER = client and server messages
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        // Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // Use `$mail->Host = gethostbyname('smtp.gmail.com');`
        // if your network does not support SMTP over IPv6,
        // though this may cause issues with TLS
        // Set the SMTP port number:
        // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
        // - 587 for SMTP+STARTTLS
        $mail->Port = 465;
        // Set the encryption mechanism to use:
        // - SMTPS (implicit TLS on port 465) or
        // - STARTTLS (explicit TLS on port 587)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        // Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        // Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'ohana.kennel.business@gmail.com';
        // Password to use for SMTP authentication
        $mail->Password = 'ctdlqnibzafgmwyj';
        // Set who the message is to be sent from
        // Note that with gmail you can only use your account address (same as `Username`)
        // or predefined aliases that you have configured within your account.
        // Do not use user-submitted addresses in here
        $mail->setFrom('ohana.kennel.business@gmail.com');
        // Set an alternative reply-to address
        // This is a good place to put user-submitted addresses
        // $mail->addReplyTo('replyto@example.com', 'First Last');
        // Set who the message is to be sent to
        $mail->addAddress($email);
        // Set the subject line
        $mail->Subject = 'Ohana Account Verification OTP';
        // Read an HTML message body from an external file, convert referenced images to embedded,
        // convert HTML into a basic plain-text alternative body
        // $mail->msgHTML(file_get_contents('/phpmailertest/contents.html'), dirname(__DIR__) . '/phpmailertest/');
        $otp = rand(100000, 999999);
        $mail->Body = "Your Ohana Account OTP is: $otp";
        //Replace the plain text body with one created manually
        $mail->AltBody = 'Ohana Registration OTP';
        // Attach an image file
        // $mail->addAttachment('images/phpmailer_mini.png');
        //send the message, check for errors
        if (!$mail->send()) {
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
            $_SESSION["msg"] = "There was an error in sending the otp to your mail.";
            return false;
        } else {
            //echo 'Message sent!';
            $_SESSION["userOtp"] = $otp;
            $_SESSION["email"] = $email;
            return true;
        }
    }

    public function verifyOtp(array $data): mixed
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
}
