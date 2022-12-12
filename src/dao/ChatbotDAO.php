<?php
require_once dirname(__DIR__) . "/models/ChatbotResponse.php";
require_once dirname(__DIR__) . "/models/ChatbotInformation.php";
class ChatbotDAO
{
    private ?string $host = null;
    private ?string $name = null;
    private ?string $user = null;
    private ?string $password = null;
    private ?PDO $conn = null;

    public function __construct(string $host, string $name, string $user, string $password)
    {
        $this->host = $host;
        $this->name = $name;
        $this->user = $user;
        $this->password = $password;
    }

    public function openConnection(): void
    {
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->name};charset=utf8", $this->user, $this->password);
    }

    public function closeConnection(): void
    {
        $this->conn = null;
    }

    public function getAllSettings(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM chatbot_information LIMIT 1;";

            $stmt = $this->conn->query($sql);
            $information = null;
            if ($stmt->execute() > 0) {
                while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $information = new ChatbotInformation($data["chatbot_avatar"], $data["chatbot_name"], $data["chatbot_introduction"], $data["chatbot_no_response"]);
                }
            }
            $this->closeConnection();
            return $information;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function updateSettings(ChatbotInformation $information): mixed
    {
        try {
            $this->openConnection();
            $sql = "UPDATE chatbot_information
                    SET chatbot_avatar=:chatbot_avatar, chatbot_name=:chatbot_name, chatbot_introduction=:chatbot_introduction, chatbot_no_response=:chatbot_no_response
                    WHERE information_id = 1";

            $avatar = $information->getAvatar();
            $name = $information->getName();
            $introduction = $information->getIntroduction();
            $noResponse = $information->getNoResponse();

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":chatbot_avatar", $avatar, PDO::PARAM_STR);
            $stmt->bindParam(":chatbot_name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":chatbot_introduction", $introduction, PDO::PARAM_STR);
            $stmt->bindParam(":chatbot_no_response", $noResponse, PDO::PARAM_STR);

            $isUpdated = $stmt->execute() > 0;
            $this->closeConnection();
            return $isUpdated;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getAllResponses(): mixed
    {
        try {
            $this->openConnection();
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
            $this->closeConnection();
            return $responses;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getResponse(string $query): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM chatbot_responses
                    WHERE query LIKE ?
                    LIMIT 1";

            $stmt = $this->conn->prepare($sql);
            $param = array("%$query%");

            $searchedResponse = null;
            if ($stmt->execute($param) > 0) {
                while ($response = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedResponse = new ChatbotResponse(
                        $response["response"],
                        $response["query"],
                        $response["times_asked"],
                    );
                    $searchedResponse->setId($response["response_id"]);
                }
            }
            $this->closeConnection();
            return $searchedResponse;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function addResponse(ChatbotResponse $response): bool
    {
        try {
            $this->openConnection();
            $sql = "INSERT INTO chatbot_responses
                    (response, query, times_asked)
                    VALUES (:response, :query, :timesAsked);";

            $res = $response->getResponse();
            $query = $response->getQuery();
            $timesAsked = $response->getTimesAsked();

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":response", $res, PDO::PARAM_STR);
            $stmt->bindParam(":query", $query, PDO::PARAM_STR);
            $stmt->bindParam(":timesAsked", $timesAsked, PDO::PARAM_STR);

            $isAdded = $stmt->execute() > 0;
            $this->closeConnection();
            return $isAdded;
        } catch (Exception $e) {
            echo $e;
            return false;
        }
    }

    public function searchById(string $id): mixed
    {
        try {
            $this->openConnection();
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
            $this->closeConnection();
            return $searchedResponse;
        } catch (Exception $e) {
            echo $e;
            return false;
        }
    }

    public function updateResponse(ChatbotResponse $response): mixed
    {
        try {
            $this->openConnection();
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

            $isUpdated = $stmt->execute() > 0;
            $this->closeConnection();
            return $isUpdated;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function deleteById(string $id): mixed
    {
        try {
            $this->openConnection();
            $sql = "DELETE FROM chatbot_responses
                    WHERE response_id=:id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $isDeleted = $stmt->execute() > 0;
            $this->closeConnection();
            return $isDeleted;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }
}
