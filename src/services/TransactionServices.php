<?php
class TransactionServices
{
    private ?TransactionDAO $dao = null;
    private ?OrderDAO $order = null;

    public function __construct(TransactionDAO $dao, OrderDAO $order)
    {
        $this->dao = $dao;
        $this->order = $order;
    }

    public function getAllTransactionsPagination(string $limit, string $offset): mixed
    {
        $transactions = $this->dao->getAllTransactionsPagination($limit, $offset);
        foreach ($transactions as $transaction) {
            $orders = $this->order->searchByTransactionId($transaction->getId());
            $transaction->setListOfOrders($orders);
        }
        return $transactions;
    }

    public function getUserTransactions(string $id): mixed
    {
        $transactions = $this->dao->searchByAccountId($id);
        foreach ($transactions as $transaction) {
            $orders = $this->order->searchByTransactionId($transaction->getId());
            $transaction->setListOfOrders($orders);
        }
        return $transactions;
    }

    public function getTotalTransactionsCount(): mixed
    {
        return $this->dao->getTotalTransactionsCount();
    }

    public function updateStatus(string $id, array $data): bool
    {
        if (empty($this->dao->searchByTransactionId($id))) {
            $_SESSION["msg"] = "The transaction does not exist.";
            return false;
        }
        if (!$this->dao->updateStatus($id, $data["status"])) {
            $_SESSION["msg"] = "There was an error in updating the transaction status.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully updated Transaction ID $id.";
        return true;
    }
}
