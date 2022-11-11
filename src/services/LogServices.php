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

    public function addLog(string $log): bool
    {
        return $this->dao->addLog($log);
    }
}