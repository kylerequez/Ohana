<?php
require_once dirname(__DIR__) . "/models/Account.php";
class AccountDAO
{
    private ?string $host = null;
    private ?string $name = null;
    private ?string $user = null;
    private ?string $password = null;
    private ?PDO $conn = null;
    public function __construct(string $host, string $name, string $user, string $password)
    {
        $this->host = $host;
        $this->name = $name;
        $this->user = $user;
        $this->password = $password;
    }
    public function openConnection(): void
    {
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->name};charset=utf8", $this->user, $this->password);
    }
    public function closeConnection(): void
    {
        $this->conn = null;
    }
    public function deleteUnregisteredAccounts(): bool
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "DELETE FROM ohana_account WHERE status = 'UNREGISTERED';";
            $stmt = $this->conn->query($sql);
            $isDeleted = $stmt->execute() > 0;
            $this->conn->commit();
            return $isDeleted;
        } catch (Exception $e) {
            $this->conn->rollBack();        
            return false;
        } finally {
            $this->closeConnection();
        }
    }
    public function getUsersCount(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT COUNT(*) FROM ohana_account WHERE account_type = 'USER' and status = 'ACTIVE';";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchColumn();
            return $result;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getStaffCount(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT COUNT(*) FROM ohana_account WHERE account_type = 'STAFF' and status = 'ACTIVE';";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchColumn();
            return $result;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getUserAccounts(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_account
                    WHERE account_type='USER';";
            $stmt = $this->conn->query($sql);
            $accounts = null;
            if ($stmt->execute() > 0) {
                while ($account = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingAccount = new Account(
                        $account["account_type"],
                        $account["fname"],
                        $account["mname"],
                        $account["lname"],
                        $account["number"],
                        $account["email"],
                        $account["status"],
                        $account["password"],
                    );
                    $existingAccount->setId($account["account_id"]);
                    $accounts[] = $existingAccount;
                }
            }
            return $accounts;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getStaffAccounts(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_account
                    WHERE account_type='STAFF';";
            $stmt = $this->conn->query($sql);
            $accounts = null;
            if ($stmt->execute() > 0) {
                while ($account = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingAccount = new Account(
                        $account["account_type"],
                        $account["fname"],
                        $account["mname"],
                        $account["lname"],
                        $account["number"],
                        $account["email"],
                        $account["status"],
                        $account["password"],
                    );
                    $existingAccount->setId($account["account_id"]);
                    $accounts[] = $existingAccount;
                }
            }
            return $accounts;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function searchUserByEmailAndPassword(string $email, string $password): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_account
                    WHERE email=:email AND password=:password
                    LIMIT 1;
                    ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
            $searchedAccount = null;
            if ($stmt->execute() > 0) {
                while ($account = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedAccount = new Account(
                        $account["account_type"],
                        $account["fname"],
                        $account["mname"],
                        $account["lname"],
                        $account["number"],
                        $account["email"],
                        $account["status"],
                        $account["password"],
                    );
                    $searchedAccount->setId($account["account_id"]);
                }
            }
            return $searchedAccount;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function createAccount(Account $account): bool
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "INSERT INTO ohana_account
                    (account_type, fname, mname, lname, number, email, status, password)
                    VALUES (:account_type, :fname, :mname, :lname, :number, :email, :status, :password);
                    ";
            $fname = $account->getFname();
            $mname = $account->getMname();
            $lname = $account->getLname();
            $email = $account->getEmail();
            $number = $account->getNumber();
            $type = $account->getType();
            $password = $account->getPassword();
            $status = $account->getStatus();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":account_type", $type, PDO::PARAM_STR);
            $stmt->bindParam(":fname", $fname, PDO::PARAM_STR);
            $stmt->bindParam(":mname", $mname, PDO::PARAM_STR);
            $stmt->bindParam(":lname", $lname, PDO::PARAM_STR);
            $stmt->bindParam(":number", $number, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
            $isCreated = $stmt->execute() > 0;
            $this->conn->commit();
            return $isCreated;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        } finally {
            $this->closeConnection();
        }
    }
    public function searchById(string $id): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_account
                    WHERE account_id=:id
                    LIMIT 1;
                    ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $searchedAccount = null;
            if ($stmt->execute() > 0) {
                while ($account = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedAccount = new Account(
                        $account["account_type"],
                        $account["fname"],
                        $account["mname"],
                        $account["lname"],
                        $account["number"],
                        $account["email"],
                        $account["status"],
                        $account["password"],
                    );
                    $searchedAccount->setId($id);
                }
            }
            return $searchedAccount;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function searchByEmail(string $email): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_account
                    WHERE email=:email
                    LIMIT 1;
                    ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $searchedAccount = null;
            if ($stmt->execute() > 0) {
                while ($account = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedAccount = new Account(
                        $account["account_type"],
                        $account["fname"],
                        $account["mname"],
                        $account["lname"],
                        $account["number"],
                        $account["email"],
                        $account["status"],
                        $account["password"],
                    );
                    $searchedAccount->setId($account["account_id"]);
                }
            }
            return $searchedAccount;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function searchByNumber(string $number): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_account
                    WHERE number=:number
                    LIMIT 1;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":number", $number, PDO::PARAM_STR);
            $searchedAccount = null;
            if ($stmt->execute() > 0) {
                while ($account = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedAccount = new Account(
                        $account["account_type"],
                        $account["fname"],
                        $account["mname"],
                        $account["lname"],
                        $account["number"],
                        $account["email"],
                        $account["status"],
                        $account["password"],
                    );
                    $searchedAccount->setId($account["account_id"]);
                }
            }
            return $searchedAccount;
        } catch (Exception $e) {     
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function updateAccount(Account $account): bool
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "UPDATE ohana_account
                    SET fname=:fname, mname=:mname, lname=:lname, number=:number, email=:email, status=:status
                    WHERE account_id=:id";
            $id = $account->getId();
            $fname = $account->getFname();
            $mname = $account->getMname();
            $lname = $account->getLname();
            $email = $account->getEmail();
            $number = $account->getNumber();
            $status = $account->getStatus();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":fname", $fname, PDO::PARAM_STR);
            $stmt->bindParam(":mname", $mname, PDO::PARAM_STR);
            $stmt->bindParam(":lname", $lname, PDO::PARAM_STR);
            $stmt->bindParam(":number", $number, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
            $isUpdated = $stmt->execute() > 0;
            $this->conn->commit();
            return $isUpdated;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function deleteById(string $id): mixed
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "DELETE FROM ohana_account
                    WHERE account_id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $isDeleted = $stmt->execute() > 0;
            $this->conn->commit();
            return $isDeleted;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        } finally {
            $this->closeConnection();
        }
    }
    public function deleteByEmail(string $email): mixed
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "DELETE FROM ohana_account
                    WHERE email=:email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $isDeleted = $stmt->execute() > 0;
            $this->conn->commit();
            return $isDeleted;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        } finally {
            $this->closeConnection();
        }
    }
    public function updatePassword(string $id, string $password): mixed
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "UPDATE ohana_account
                    SET password=:password
                    WHERE account_id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_STR);
            $isUpdated = $stmt->execute() > 0;
            $this->conn->commit();
            return $isUpdated;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function changePassword(string $email, string $password): mixed
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "UPDATE ohana_account
                    SET password=:password
                    WHERE email=:email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $isUpdated = $stmt->execute() > 0;
            $this->conn->commit();
            return $isUpdated;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function verifyAccount(string $email): mixed
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "UPDATE ohana_account
                    SET status='ACTIVE'
                    WHERE email=:email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $isVerified = $stmt->execute() > 0;
            $this->conn->commit();
            return $isVerified;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return null;
        } finally {
            $this->closeConnection();
        }
    }
}
