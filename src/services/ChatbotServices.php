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
        if (!$this->dao->updateSettings($information)) {
            $_SESSION["msg"] = "There was an error in updating the Chatbot Settings.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully updated the Chatbot Settings!";
        return true;
    }

    public function getAllResponses(): mixed
    {
        return $this->dao->getAllResponses();
    }

    public function addResponse(array $data): mixed
    {
        $res = trim($data["response"]) == '' ? 'N/A' :  trim($data["response"]);
        $query = trim($data["query"]) == '' ? 'N/A' :  trim($data["query"]);
        $timesAsked = $data["timesAsked"];

        $response = new ChatbotResponse($res, $query, $timesAsked);
        if (!$this->dao->addResponse($response)) {
            $_SESSION["msg"] = "There was an error in adding the Response.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully added a Response";
        return true;
    }

    public function updateResponse(string $id, array $data): bool
    {
        if (is_null($this->dao->searchById($id))) {
            $_SESSION["msg"] = "There was an error in updating the response. The response does not exist in the database.";
            return false;
        }

        $res = trim($data["response"]);
        $query = trim($data["query"]) == '' ? "N/A" :  trim($data["query"]);
        $timesAsked = $data["timesAsked"];

        $response = new ChatbotResponse($res, $query, $timesAsked);
        $response->setId($id);
        if (!$this->dao->updateResponse($response)) {
            $_SESSION["msg"] = "There was an error in updating the response.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully updated Response $id!";
        return true;
    }

    public function deleteResponse(string $id): bool
    {
        if (is_null($this->dao->searchById($id))) {
            $_SESSION["msg"] = "Response not deleted! The response does not exists";
            return false;
        }
        if (!$this->dao->deleteById($id)) {
            $_SESSION["msg"] = "There was an error in deleting the response.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully deleted Response $id!";
        return true;
    }
}
