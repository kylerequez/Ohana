<?php
require_once dirname(__DIR__) . "/models/BoardingSlot.php";
class BoardingSlotDAO
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }

    public function getAllBoardingSlots(): mixed
    {
        try {
            $sql = "
                SELECT * FROM ohana_boarding_slot;
            ";

            $stmt = $this->conn->query($sql);
            $slots = null;
            if ($stmt->execute() > 0) {
                while ($slot = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingSlot = new BoardingSlot($slot["slot_image"], $slot["slot_name"], $slot["slot_information"], $slot["is_available"], $slot["pet_id"], $slot["pet_name"]);
                    $existingSlot->setId($slot["slot_id"]);
                    $slots[] = $existingSlot;
                }
            }
            return $slots;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getAvailableSlots(): mixed
    {
        try {
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
            return $slots;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getBoardingSlotCount(): mixed
    {
        try {
            $sql = "SELECT COUNT(*) FROM ohana_boarding_slot;";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchColumn();
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function addBoardingSlot(BoardingSlot $slot): bool
    {
        try {
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

            return $stmt->execute() > 0;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function deleteById(string $id): bool
    {
        try {
            $sql = "DELETE FROM ohana_boarding_slot
                    WHERE slot_id=:id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            return $stmt->execute() > 0;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function searchById(string $id): mixed
    {
        try {
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
            return $searchedSlot;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function updateBoardingSlot(BoardingSlot $slot): mixed
    {
        try {
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

            return $stmt->execute() > 0;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function searchByName(string $name): mixed
    {
        try {
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
            return $searchedSlot;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }
}
