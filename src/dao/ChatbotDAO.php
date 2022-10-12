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
}
