<?php
class LogServices
{
    private ?LogDAO $dao = null;

    public function __construct(LogDAO $dao)
    {
        $this->dao = $dao;
    }

    public function getAllLogs(): mixed
    {
        return $this->dao->getAllLogs();
    }

    public function getLogsPagination(string $limit, string $offset): mixed
    {
        return $this->dao->getLogsPagination($limit, $offset);
    }

    public function getTotalLogCount(): mixed
    {
        return $this->dao->getTotalLogCount();
    }

    public function addLog(string $log): bool
    {
        return $this->dao->addLog($log);
    }
}