<?php

require_once dirname(__DIR__) . "/models/ChatbotResponse.php";
require_once dirname(__DIR__) . "/models/ChatbotInformation.php";

class ChatbotDAO
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }

    public function getAllSettings(): mixed
    {
        try {
            $sql = "SELECT * FROM chatbot_information LIMIT 1;";

            $stmt = $this->conn->query($sql);
            $information = null;
            if ($stmt->execute() > 0) {
                while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $information = new ChatbotInformation($data["chatbot_avatar"], $data["chatbot_name"], $data["chatbot_introduction"], $data["chatbot_no_response"]);
                }
            }
            return $information;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function updateSettings(ChatbotInformation $information): mixed
    {
        try {
            $sql = "UPDATE chatbot_information
                    SET chatbot_avatar=:chatbot_avatar, chatbot_name=:chatbot_name, chatbot_introduction=:chatbot_introduction, chatbot_no_response=:chatbot_no_response
                    WHERE information_id = 1";

            $blob = $information->getBlob();
            $name = $information->getName();
            $introduction = $information->getIntroduction();
            $noResponse = $information->getNoResponse();

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":chatbot_avatar", $blob, PDO::PARAM_STR);
            $stmt->bindParam(":chatbot_name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":chatbot_introduction", $introduction, PDO::PARAM_STR);
            $stmt->bindParam(":chatbot_no_response", $noResponse, PDO::PARAM_STR);

            return $stmt->execute() > 0;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getAllResponses(): mixed
    {
        try {
            $sql = "SELECT * FROM chatbot_responses;";

            $stmt = $this->conn->query($sql);
            $responses = null;
            if ($stmt->execute() > 0) {
                while ($response = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingResponse = new ChatbotResponse(
                        $response["response"],
                        $response["query"],
                        $response["times_asked"],
                    );
                    $existingResponse->setId($response["response_id"]);
                    $responses[] = $existingResponse;
                }
            }
            return $responses;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }
}
