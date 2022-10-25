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
        echo "ADD";
        $type = trim($data["type"]);
        $fname = trim($data["fname"]);
        $mname = trim($data["mname"]);
        $lname = trim($data["lname"]);
        $email = trim($data["email"]);
        $number = trim($data["number"]);
        $password = password_hash(trim($data["password"]), PASSWORD_DEFAULT);
        $status = "ACTIVE";
        $account = new Account($type, $fname, $mname, $lname, $number, $email, $status, $password);

        if (is_null($this->dao->searchByEmail($email)) and is_null($this->dao->searchByNumber($number))) {
            $isCreated = $this->dao->createAccount($account);
        } else {
            $_SESSION["msg"] = "Account credential is a duplicate!";
            $isCreated = false;
        }
        return $isCreated;
    }

    public function updateAccount(string $id, array $data): bool
    {
        if (!is_null($this->dao->searchById($id))) {
            $type = trim($data["type"]);
            $fname = trim($data["fname"]);
            $mname = trim($data["mname"]);
            $lname = trim($data["lname"]);
            $email = trim($data["email"]);
            $number = trim($data["number"]);
            // $password = password_hash(trim($data["password"]), PASSWORD_DEFAULT);
            $status = trim($data["status"]);
            $account = new Account($type, $fname, $mname, $lname, $number, $email, $status, null);
            $account->setId($id);
            $isUpdated = $this->dao->updateAccount($account);
            if ($isUpdated) {
                $_SESSION["msg"] = "Account $id is updated!";
            } else {
                $_SESSION["msg"] = "Account $id is not updated!";
            }
        } else {
            $_SESSION["msg"] = "Account $id was not updated! The user does not exist";
            $isUpdated = false;
        }
        return $isUpdated;
    }

    public function deleteAccount(string $id): bool
    {
        if (!is_null($this->dao->searchById($id))) {
            $isDeleted = $this->dao->deleteById($id);
            if ($isDeleted) {
                $_SESSION["msg"] = "Account $id is deleted!";
            } else {
                $_SESSION["msg"] = "Account $id is not deleted!";
            }
        } else {
            $_SESSION["msg"] = "Account not deleted! The user does not exists";
            $isDeleted = false;
        }
        return $isDeleted;
    }

    public function loginAccount(string $email, string $password): mixed
    {
        $account = $this->dao->searchByEmail($email);
        if (!is_null($account)) {
            if (!password_verify($password, $account->getPassword())) {
                $_SESSION["msg"] = "Wrong password!";
                return null;
            }
            // $account = $this->dao->searchUserByEmailAndPassword($email, $password);
            if ($account->getStatus() == "DISABLED" or $account->getStatus() == "UNREGISTERED") {
                $_SESSION["msg"] = "Account is disabled";
                return null;
            }
            $_SESSION["user"] = serialize($account);
        } else {
            $_SESSION["msg"] = "The account does not exist.";
        }
        return $account;
    }

    public function logoutAccount(): bool
    {
        if (isset($_SESSION["user"])) {
            session_unset();
            session_destroy();
            return true;
        }
        return false;
    }

    public function forgotPasswordRequest(string $email): bool
    {
        // echo is_null($this->dao->searchByEmail($email)) ? "null email" : "exist";
        if (is_null($this->dao->searchByEmail($email))) {
            if (!isset($_SESSION)) session_start();
            $_SESSION["msg"] = "The account does not exist. Please try again";
            // echo "Email not found";
            return false;
        }

        //Create a new PHPMailer instance
        $mail = new PHPMailer();

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        //SMTP::DEBUG_OFF = off (for production use)
        //SMTP::DEBUG_CLIENT = client messages
        //SMTP::DEBUG_SERVER = client and server messages
        $mail->SMTPDebug = SMTP::DEBUG_OFF;

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        //Use `$mail->Host = gethostbyname('smtp.gmail.com');`
        //if your network does not support SMTP over IPv6,
        //though this may cause issues with TLS

        //Set the SMTP port number:
        // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
        // - 587 for SMTP+STARTTLS
        $mail->Port = 465;

        //Set the encryption mechanism to use:
        // - SMTPS (implicit TLS on port 465) or
        // - STARTTLS (explicit TLS on port 587)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'ohana.kennel.business@gmail.com';

        //Password to use for SMTP authentication
        $mail->Password = 'ctdlqnibzafgmwyj';

        //Set who the message is to be sent from
        //Note that with gmail you can only use your account address (same as `Username`)
        //or predefined aliases that you have configured within your account.
        //Do not use user-submitted addresses in here
        $mail->setFrom('ohana.kennel.business@gmail.com');

        //Set an alternative reply-to address
        //This is a good place to put user-submitted addresses
        // $mail->addReplyTo('replyto@example.com', 'First Last');

        //Set who the message is to be sent to
        $mail->addAddress($email);

        //Set the subject line
        $mail->Subject = 'Ohana Account Password Reset';

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        // $mail->msgHTML(file_get_contents('/phpmailertest/contents.html'), dirname(__DIR__) . '/phpmailertest/');

        $mail->Body = 'Your Ohana Account password reset link: <a href="localhost/forgot/' . $email . '">Click Here</a>';
        //Replace the plain text body with one created manually
        $mail->AltBody = 'Reset Password Link for Ohana Account';

        //Attach an image file
        // $mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if (!$mail->send()) {
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
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
        if(is_null($account))
        {
            $_SESSION["msg"] = "There was an error in changing the password. Account not found.";
            return false;
        }
        
        if(password_verify($_POST["password"], $account->getPassword()))
        {
            $_SESSION["msg"] = "There was an error in changing the password. New password cannot be same as the old password.";
            return false;
        } 

        $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);
        // echo trim($_POST["password"]);
        // echo $password;
        if(!$this->dao->changePassword($email, $password))
        {
            $_SESSION["msg"] = "There was an error in changing the password. The password was not changed.";
            return false;
        } else {
            return true;
        }
    }
}
