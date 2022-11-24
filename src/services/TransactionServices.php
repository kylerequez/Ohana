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

    public function getAllTransactions(): mixed
    {
        $transactions = $this->dao->getAllTransactions();
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
}
