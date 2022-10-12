<?php

class LogServices
{
    private ?LogDAO $dao = null;

    public function __construct(LogDAO $dao)
    {
        $this->dao = $dao;
    }

    public function getAllLogs(): array
    {
        return $this->dao->getAllLogs();
    }

    public function addLog(string $log): bool
    {
        return $this->dao->addLog($log);
    }
}