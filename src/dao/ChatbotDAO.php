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

    public function getResponsesPagination(string $limit, string $offset): mixed
    {
        try {
            $sql = "SELECT * FROM chatbot_responses
                    LIMIT :limit OFFSET :offset;";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
            $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
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

    public function getTotalResponses(): mixed
    {
        try {
            $sql = "SELECT count(*) FROM chatbot_responses;";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchColumn();
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

    public function addResponse(ChatbotResponse $response): bool
    {
        try {
            $sql = "INSERT INTO chatbot_responses
                    (response, query, timesAsked)
                    VALUES (:response, :query, :timesAsked);";

            $res = $response->getResponse();
            $query = $response->getQuery();
            $timesAsked = $response->getTimesAsked();

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":response", $res, PDO::PARAM_STR);
            $stmt->bindParam(":query", $query, PDO::PARAM_STR);
            $stmt->bindParam(":timesAsked", $timesAsked, PDO::PARAM_STR);

            return $stmt->execute() > 0;
        } catch (Exception $e) {
            echo $e;
            return false;
        }
    }

    public function searchById(string $id): mixed
    {
        $sql = "SELECT * FROM chatbot_responses
                WHERE response_id=:id
                LIMIT 1;";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        $searchedResponse = null;
        if ($stmt->execute() > 0) {
            while ($response = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $searchedResponse = new ChatbotResponse(
                    $response["response"],
                    $response["query"],
                    $response["times_asked"]
                );
                $searchedResponse->setId($id);
            }
        }
        return $searchedResponse;
    }

    public function updateResponse(ChatbotResponse $response): mixed
    {
        try {
            $sql = "UPDATE chatbot_responses
                    SET response=:response, query=:query, times_asked=:timesAsked
                    WHERE response_id=:id;";

            $id = $response->getId();
            $res = $response->getResponse();
            $query = $response->getQuery();
            $timesAsked = $response->getTimesAsked();

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":response", $res, PDO::PARAM_STR);
            $stmt->bindParam(":query", $query, PDO::PARAM_STR);
            $stmt->bindParam(":timesAsked", $timesAsked, PDO::PARAM_INT);

            return $stmt->execute() > 0;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function deleteById(string $id): mixed
    {
        try {
            $sql = "DELETE FROM chatbot_responses
                    WHERE response_id=:id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            return $stmt->execute() > 0;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }
}
