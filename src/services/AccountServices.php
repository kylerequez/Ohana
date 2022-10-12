<?php

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
            // $account = $this->dao->searchUserByEmailAndPassword($email, $password);
            if (!password_verify($password, $account->getPassword())) {
                $_SESSION["msg"] = "Wrong password!";
            } else {
                $_SESSION["user"] = serialize($account);
            }
        } else {
            $_SESSION["msg"] = "Wrong email!";
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
}
