<?php
require_once dirname(__DIR__) . "/models/Account.php";

class AccountDAO
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }

    public function getAllAccounts(): mixed
    {
        try {
            $sql = "SELECT * FROM ohana_account;";

            $stmt = $this->conn->query($sql);
            $accounts = null;
            if ($stmt->execute() > 0) {
                while ($account = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingAccount = new Account($account["account_type"], $account["fname"], $account["mname"], $account["lname"], $account["number"], $account["email"], $account["status"], $account["password"]);
                    $existingAccount->setId($account["account_id"]);

                    $accounts[] = $existingAccount;
                }
            }
            return $accounts;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getUserAccounts(): mixed
    {
        try {
            $sql = "SELECT * FROM ohana_account
                    WHERE account_type='USER';";

            $stmt = $this->conn->query($sql);
            $accounts = null;
            if ($stmt->execute() > 0) {
                while ($account = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingAccount = new Account($account["account_type"], $account["fname"], $account["mname"], $account["lname"], $account["number"], $account["email"], $account["status"], $account["password"]);
                    $existingAccount->setId($account["account_id"]);

                    $accounts[] = $existingAccount;
                }
            }
            return $accounts;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getStaffAccounts(): mixed
    {
        try {
            $sql = "SELECT * FROM ohana_account
                    WHERE account_type='STAFF';";

            $stmt = $this->conn->query($sql);
            $accounts = null;
            if ($stmt->execute() > 0) {
                while ($account = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingAccount = new Account($account["account_type"], $account["fname"], $account["mname"], $account["lname"], $account["number"], $account["email"], $account["status"], $account["password"]);
                    $existingAccount->setId($account["account_id"]);

                    $accounts[] = $existingAccount;
                }
            }
            return $accounts;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function searchUserByEmailAndPassword(string $email, string $password): mixed
    {
        try {
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
                        $account["email"],
                        $account["number"],
                        $account["status"],
                        $account["password"],
                    );
                }
            }

            return $searchedAccount;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function createAccount(Account $account): bool
    {
        try {
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

            return $stmt->execute() > 0;
        } catch (Exception $e) {
            echo $e;
            return false;
        }
    }

    public function searchById(string $id): mixed
    {
        try {
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
                        $account["email"],
                        $account["number"],
                        $account["status"],
                        $account["password"],
                    );
                }
            }

            return $searchedAccount;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function searchByEmail(string $email): mixed
    {
        try {
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
                        $account["email"],
                        $account["number"],
                        $account["status"],
                        $account["password"],
                    );
                }
            }

            return $searchedAccount;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function searchByNumber(string $number): mixed
    {
        try {
            $sql = "SELECT * FROM ohana_account
                    WHERE number=:number
                    LIMIT 1;
                    ";

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
                        $account["email"],
                        $account["number"],
                        $account["status"],
                        $account["password"],
                    );
                }
            }

            return $searchedAccount;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function updateAccount(Account $account): bool
    {
        try {
            $sql = "UPDATE ohana_account
                    SET fname=:fname, mname=:mname, lname=:lname, number=:number, email=:email, status=:status
                    WHERE account_id=:id";
            
            $id = $account->getId();
            $fname = $account->getFname();
            $mname = $account->getMname();
            $lname = $account->getLname();
            $email = $account->getEmail();
            $number = $account->getNumber();
            // $type = $account->getType();
            // $password = $account->getPassword();
            $status = $account->getStatus();

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":fname", $fname, PDO::PARAM_STR);
            $stmt->bindParam(":mname", $mname, PDO::PARAM_STR);
            $stmt->bindParam(":lname", $lname, PDO::PARAM_STR);
            $stmt->bindParam(":number", $number, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
            // $stmt->bindParam(":password", $password, PDO::PARAM_STR);

            $isUpdated = $stmt->execute() > 0;

            return $isUpdated;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function deleteById(string $id): bool
    {
        try {
            $sql = "DELETE FROM ohana_account
                    WHERE account_id=:id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $isDeleted = $stmt->execute() > 0;

            return $isDeleted;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }
}
