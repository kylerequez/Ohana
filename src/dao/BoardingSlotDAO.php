<?php
require_once dirname(__DIR__) . "/models/BoardingSlot.php";
class BoardingSlotDAO
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

    public function getAllBoardingSlots(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_boarding_slot;";

            $stmt = $this->conn->query($sql);
            $slots = null;
            if ($stmt->execute() > 0) {
                while ($slot = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingSlot = new BoardingSlot($slot["slot_image"], $slot["slot_name"], $slot["slot_information"], $slot["is_available"], $slot["pet_id"], $slot["pet_name"]);
                    $existingSlot->setId($slot["slot_id"]);
                    $slots[] = $existingSlot;
                }
            }
            $this->closeConnection();
            return $slots;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getAvailableSlots(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_boarding_slot
                    WHERE is_available=1;";

            $stmt = $this->conn->query($sql);
            $slots = null;
            if ($stmt->execute() > 0) {
                while ($slot = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingSlot = new BoardingSlot($slot["slot_image"], $slot["slot_name"], $slot["slot_information"], $slot["is_available"], $slot["pet_id"], $slot["pet_name"]);
                    $existingSlot->setId($slot["slot_id"]);
                    $slots[] = $existingSlot;
                }
            }
            $this->closeConnection();
            return $slots;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getBoardingSlotCount(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT COUNT(*) FROM ohana_boarding_slot;";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchColumn();
            $this->closeConnection();
            return $result;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function addBoardingSlot(BoardingSlot $slot): bool
    {
        try {
            $this->openConnection();
            $sql = "
                INSERT INTO ohana_boarding_slot
                (slot_image, slot_name, slot_information, is_available, pet_id, pet_name)
                VALUES (:image, :name, :information, :isAvailable, :petId, :petName);
            ";

            $image = $slot->getImage();
            $name = $slot->getName();
            $information = $slot->getInformation();
            $isAvailable = $slot->getIsAvailable();
            $petId = $slot->getPetId();
            $petName = $slot->getPetName();

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":image", $image, PDO::PARAM_STR);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":information", $information, PDO::PARAM_STR);
            $stmt->bindParam(":isAvailable", $isAvailable, PDO::PARAM_BOOL);
            $stmt->bindParam(":petId", $petId, PDO::PARAM_INT);
            $stmt->bindParam(":petName", $petName, PDO::PARAM_STR);

            $isAdded = $stmt->execute() > 0;
            $this->closeConnection();
            return $isAdded;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function deleteById(string $id): bool
    {
        try {
            $this->openConnection();
            $sql = "DELETE FROM ohana_boarding_slot
                    WHERE slot_id=:id";

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

    public function searchById(string $id): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_boarding_slot
                    WHERE slot_id=:id
                    LIMIT 1;";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $searchedSlot = null;
            if ($stmt->execute() > 0) {
                while ($slot = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedSlot = new BoardingSlot($slot["slot_image"], $slot["slot_name"], $slot["slot_information"], $slot["is_available"], $slot["pet_id"], $slot["pet_name"]);
                    $searchedSlot->setId($slot["slot_id"]);
                }
            }
            $this->closeConnection();
            return $searchedSlot;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function updateBoardingSlot(BoardingSlot $slot): mixed
    {
        try {
            $this->openConnection();
            $sql = "UPDATE ohana_boarding_slot
                    SET slot_image=:image, slot_name=:name, slot_information=:information, is_available=:isAvailable, pet_id=:petId, pet_name=:petName
                    WHERE slot_id=:id";

            $id = $slot->getId();
            $image = $slot->getImage();
            $name = $slot->getName();
            $information = $slot->getInformation();
            $isAvailable = $slot->getIsAvailable();
            $petId = $slot->getPetId();
            $petName = $slot->getPetName();

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":image", $image, PDO::PARAM_STR);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":information", $information, PDO::PARAM_STR);
            $stmt->bindParam(":isAvailable", $isAvailable, PDO::PARAM_BOOL);
            $stmt->bindParam(":petId", $petId, !is_null($petId) ? PDO::PARAM_INT : PDO::PARAM_BOOL);
            $stmt->bindParam(":petName", $petName, PDO::PARAM_STR);

            $isUpdated = $stmt->execute() > 0;
            $this->closeConnection();
            return $isUpdated;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function searchByName(string $name): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_boarding_slot
                    WHERE slot_name=:name
                    LIMIT 1;";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);

            $searchedSlot = null;
            if ($stmt->execute() > 0) {
                while ($slot = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedSlot = new BoardingSlot($slot["slot_image"], $slot["slot_name"], $slot["slot_information"], $slot["is_available"], $slot["pet_id"], $slot["pet_name"]);
                    $searchedSlot->setId($slot["slot_id"]);
                }
            }
            $this->closeConnection();
            return $searchedSlot;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }
}
