<?php
require_once dirname(__DIR__) . "/models/Transaction.php";
class TransactionDAO
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }

    public function getAllTransactionsPagination(string $limit, string $offset): mixed
    {
        try {
            $sql = "SELECT * FROM ohana_transactions a JOIN ohana_account b 
                    WHERE b.account_id = a.account_id
                    LIMIT :limit OFFSET :offset;";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
            $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);

            $transactions = null;
            if ($stmt->execute() > 0) {
                while ($transaction = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingTransaction = new Transaction(
                        $transaction["account_id"],
                        $transaction["total_price"],
                        new DateTime($transaction["transaction_date"]),
                        $transaction["transaction_status"],
                        $transaction["payment_confirmation"]
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
            echo $e;
            return null;
        }
    }

    public function getAllTransactions(): mixed
    {
        try {
            $sql = "SELECT * FROM ohana_transactions a JOIN ohana_account b 
                    WHERE b.account_id = a.account_id";

            $stmt = $this->conn->query($sql);

            $transactions = null;
            if ($stmt->execute() > 0) {
                while ($transaction = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingTransaction = new Transaction(
                        $transaction["account_id"],
                        $transaction["total_price"],
                        new DateTime($transaction["transaction_date"]),
                        $transaction["transaction_status"],
                        $transaction["payment_confirmation"]
                    );
                    $existingTransaction->setId($transaction["id"]);
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
            echo $e;
            return null;
        }
    }

    public function getTotalTransactionsCount(): mixed
    {
        try {
            $sql = "SELECT count(*) FROM ohana_transactions;";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchColumn();
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }
}
