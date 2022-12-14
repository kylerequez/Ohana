<?php
require_once dirname(__DIR__) . "/models/Transaction.php";
class TransactionDAO
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
    public function getModeOfPaymentCount(string $mode): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT COUNT(*) FROM ohana_transactions WHERE payment_mode = :mode;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":mode", $mode, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchColumn();
            return $result;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getTransactionsCount(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT COUNT(*) FROM ohana_transactions;";
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
    public function uploadProofOfPayment(string $id, string $image): bool
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "UPDATE ohana_transactions
                    SET payment_confirmation=:confirmation
                    WHERE transaction_id=:id;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':confirmation', $image, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $isUploaded = $stmt->execute() > 0;
            $this->conn->commit();
            return $isUploaded;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getAllTransactions(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_transactions a JOIN ohana_account b 
                    WHERE b.account_id = a.account_id";
            $stmt = $this->conn->query($sql);
            $transactions = null;
            if ($stmt->execute() > 0) {
                while ($transaction = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingTransaction = new Transaction(
                        $transaction["account_id"],
                        $transaction['transaction_reference'],
                        $transaction["total_price"],
                        new DateTime($transaction["transaction_date"]),
                        $transaction["transaction_status"],
                        $transaction["payment_confirmation"],
                        $transaction["payment_mode"]
                    );
                    $existingTransaction->setId($transaction["transaction_id"]);
                    $existingTransaction->setFname($transaction["fname"]);
                    $existingTransaction->setMname($transaction["mname"]);
                    $existingTransaction->setLname($transaction["lname"]);
                    $existingTransaction->setNumber($transaction["number"]);
                    $existingTransaction->setEmail($transaction["email"]);
                    $transactions[] = $existingTransaction;
                }
            }
            return $transactions;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getTransactionsFromStartToEnd(DateTime $start, DateTime $end): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_transactions a JOIN ohana_account b 
                    WHERE b.account_id = a.account_id
                    AND a.transaction_status = 'COMPLETED'
                    AND a.transaction_date BETWEEN :start AND :end;";
            $startDate = $start->format('Y-m-d 00:00:00');
            $endDate = $end->format('Y-m-d 23:59:59');
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':start', $startDate, PDO::PARAM_STR);
            $stmt->bindParam(':end', $endDate, PDO::PARAM_STR);
            $transactions = null;
            if ($stmt->execute() > 0) {
                while ($transaction = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingTransaction = new Transaction(
                        $transaction["account_id"],
                        $transaction['transaction_reference'],
                        $transaction["total_price"],
                        new DateTime($transaction["transaction_date"]),
                        $transaction["transaction_status"],
                        $transaction["payment_confirmation"],
                        $transaction["payment_mode"]
                    );
                    $existingTransaction->setId($transaction["transaction_id"]);
                    $existingTransaction->setFname($transaction["fname"]);
                    $existingTransaction->setMname($transaction["mname"]);
                    $existingTransaction->setLname($transaction["lname"]);
                    $existingTransaction->setNumber($transaction["number"]);
                    $existingTransaction->setEmail($transaction["email"]);
                    $transactions[] = $existingTransaction;
                }
            }
            return $transactions;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function searchByAccountId($id): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_transactions a JOIN ohana_account b 
                    WHERE b.account_id = a.account_id AND a.account_id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $existingTransactions = null;
            if ($stmt->execute() > 0) {
                while ($transaction = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingTransaction = new Transaction(
                        $transaction["account_id"],
                        $transaction['transaction_reference'],
                        $transaction["total_price"],
                        new DateTime($transaction["transaction_date"]),
                        $transaction["transaction_status"],
                        $transaction["payment_confirmation"],
                        $transaction["payment_mode"]
                    );
                    $existingTransaction->setId($transaction["transaction_id"]);
                    $existingTransaction->setFname($transaction["fname"]);
                    $existingTransaction->setMname($transaction["mname"]);
                    $existingTransaction->setLname($transaction["lname"]);
                    $existingTransaction->setNumber($transaction["number"]);
                    $existingTransaction->setEmail($transaction["email"]);
                    $existingTransactions[] = $existingTransaction;
                }
            }
            return $existingTransactions;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function searchTransactionIdByReference(string $reference): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT transaction_id FROM ohana_transactions
                    WHERE transaction_reference=:reference
                    LIMIT 1;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":reference", $reference, PDO::PARAM_STR);
            $searchedId = null;
            if ($stmt->execute() > 0) {
                while ($transaction = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedId = $transaction['transaction_id'];
                }
            }
            return $searchedId;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function searchByTransactionId(string $id): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_transactions a JOIN ohana_account b 
                    WHERE b.account_id = a.account_id AND a.transaction_id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $existingTransaction = null;
            if ($stmt->execute() > 0) {
                while ($transaction = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingTransaction = new Transaction(
                        $transaction["account_id"],
                        $transaction['transaction_reference'],
                        $transaction["total_price"],
                        new DateTime($transaction["transaction_date"]),
                        $transaction["transaction_status"],
                        $transaction["payment_confirmation"],
                        $transaction["payment_mode"]
                    );
                    $existingTransaction->setId($transaction["transaction_id"]);
                    $existingTransaction->setFname($transaction["fname"]);
                    $existingTransaction->setMname($transaction["mname"]);
                    $existingTransaction->setLname($transaction["lname"]);
                    $existingTransaction->setNumber($transaction["number"]);
                    $existingTransaction->setEmail($transaction["email"]);
                }
            }
            return $existingTransaction;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function searchByReference(string $reference): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_transactions a JOIN ohana_account b 
                    WHERE b.account_id = a.account_id AND a.transaction_reference=:reference";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":reference", $reference, PDO::PARAM_STR);
            $existingTransaction = null;
            if ($stmt->execute() > 0) {
                while ($transaction = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingTransaction = new Transaction(
                        $transaction["account_id"],
                        $transaction['transaction_reference'],
                        $transaction["total_price"],
                        new DateTime($transaction["transaction_date"]),
                        $transaction["transaction_status"],
                        $transaction["payment_confirmation"],
                        $transaction["payment_mode"]
                    );
                    $existingTransaction->setId($transaction["transaction_id"]);
                    $existingTransaction->setFname($transaction["fname"]);
                    $existingTransaction->setMname($transaction["mname"]);
                    $existingTransaction->setLname($transaction["lname"]);
                    $existingTransaction->setNumber($transaction["number"]);
                    $existingTransaction->setEmail($transaction["email"]);
                }
            }
            return $existingTransaction;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function updateStatus(string $id, string $status): mixed
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "UPDATE ohana_transactions
                    SET transaction_status=:status
                    WHERE transaction_id=:id;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
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
    public function addTransaction(Transaction $transaction): bool
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "INSERT INTO ohana_transactions
                    (transaction_reference, account_id, total_price, transaction_date, transaction_status, payment_confirmation, payment_mode)
                    VALUES (:reference, :id, :price, :date, :status, :confirmation, :mode);";
            $reference = $transaction->getReference();
            $accountId = $transaction->getAccountId();
            $price = $transaction->getPrice();
            $date = $transaction->getDate()->format('Y-m-d H:i:s');
            $status = $transaction->getStatus();
            $confirmation = $transaction->getPaymentConfirmation();
            $mode = $transaction->getMode();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":reference", $reference, PDO::PARAM_STR);
            $stmt->bindParam(":id", $accountId, PDO::PARAM_INT);
            $stmt->bindParam(":price", $price, PDO::PARAM_STR);
            $stmt->bindParam(":date", $date, PDO::PARAM_STR);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
            $stmt->bindParam(":confirmation", $confirmation, PDO::PARAM_STR);
            $stmt->bindParam(":mode", $mode, PDO::PARAM_STR);
            $isAdded = $stmt->execute() > 0;
            $this->conn->commit();
            return $isAdded;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return null;
        } finally {
            $this->closeConnection();
        }
    }
}
