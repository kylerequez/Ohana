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

    public function getResponse(string $query): mixed
    {
        return $this->dao->getResponse($query);
    }

    public function updateSettings(array $data, array $imageData): bool
    {
        if (!file_exists($imageData['image']['tmp_name']) || !is_uploaded_file($imageData['image']['tmp_name'])) {
            $avatar = trim($data["old-image"]);
        } else {
            $file = $imageData['image'];
            $name = $file['name'];
            $tempName = $file['tmp_name'];
            $size = $file['size'];
            $error = $file['error'];
            // $type = $file['type'];
            $fileExt = explode('.', $name);
            $actualExt = strtolower(end($fileExt));
            $allowed = array('jpg', 'jpeg', 'png');
            if ($error != 0) {
                $_SESSION["msg"] = "There was an error in uploading the image.";
                return false;
            }
            if (!in_array($actualExt, $allowed)) {
                $_SESSION["msg"] = "The uploaded file was does not have the allowed extensions. (.jpeg, .png, .jpg)";
                return false;
            }
            if ($size > 5242880) {
                $_SESSION["msg"] = "The file size is too big. Please upload an image that is less than 5 MB in size.";
                return false;
            }
            $extAvatar = glob(dirname(__DIR__) . "/images/chatbot/ChatbotAvatar.*");
            if (!is_null($extAvatar)) {
                foreach ($extAvatar as $avatar) {
                    if (!unlink($avatar)) {
                        $_SESSION["msg"] = "There was an error in uploading the image to the website due to the deletion of the previous image.";
                        return false;
                    }
                }
            } else {
                $_SESSION["msg"] = "There was an error in uploading the image to the website due to the deletion of the previous image.";
                return false;
            }
            $new = "ChatbotAvatar.$actualExt";
            $destination = dirname(__DIR__) . "/images/chatbot/$new";
            if (!move_uploaded_file($tempName, $destination)) {
                $_SESSION["msg"] = "There was an error in uploading the image to the website.";
                return false;
            }
            $avatar = "/Ohana/src/images/chatbot/$new";
        }
        $name = trim($data["name"]);
        $introduction = trim($data["introduction"]);
        $noResponse = trim($data["noResponse"]);

        $information = new ChatbotInformation($avatar, $name, $introduction, $noResponse);
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

        $response = new ChatbotResponse($res, $query);
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

        $response = new ChatbotResponse($res, $query);
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
