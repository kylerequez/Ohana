<?php
require_once dirname(__DIR__) . '/config/app-config.php';
class ConfigServices
{
    private ?ConfigDAO $dao = null;

    public function __construct(ConfigDAO $dao)
    {
        $this->dao = $dao;
    }

    public function getDomainName(): mixed
    {
        return $this->dao->getDomainName();
    }

    public function getEmail(): mixed
    {
        return $this->dao->getEmail();
    }

    public function getEmailKey(): mixed
    {
        return $this->dao->getEmailKey();
    }

    public function getSemaphoreApiKey(): mixed
    {
        return $this->dao->getSemaphoreApiKey();
    }
}
