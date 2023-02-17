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
    public function addLog(int $accountId, string $type, string $log): bool
    {
        return $this->dao->addLog($accountId, $type, $log);
    }
}