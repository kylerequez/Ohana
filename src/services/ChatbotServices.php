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

    public function updateSettings(array $data): bool
    {
        // ADD IMAGE VALIDATION SOON !!! IMPORTANT
        $blob = $data["image"];

        $name = $data["name"];
        $introduction = $data["introduction"];
        $noResponse = $data["noResponse"];

        $information = new ChatbotInformation($blob, $name, $introduction, $noResponse);
        if(!$this->dao->updateSettings($information)){
            $_SESSION["msg"] = "There was an error in updating the Chatbot Settings.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully updated the Chatbot Settings!";
        return true;
    }
}
