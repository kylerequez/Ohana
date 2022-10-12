<?php

class ChatbotServices
{
    private ?ChatbotDAO $dao = null;

    public function __construct(ChatbotDAO $dao)
    {
        $this->dao = $dao;
    }

    public function getAllSettings(): mixed
    {
        return $this->dao->getAllSettings();
    }
}
