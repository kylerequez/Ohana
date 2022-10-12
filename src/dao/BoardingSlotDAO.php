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
        try{
            $sql = "
                SELECT * FROM ohana_boarding_slot;
            ";

            $stmt = $this->conn->query($sql);
            $slots = null;
            if ($stmt->execute() > 0) {
                while($slot = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $existingSlot = new BoardingSlot($slot["slot_image"], $slot["slot_name"], $slot["slot_information"], $slot["is_available"], $slot["pet_id"], $slot["pet_name"]);
                    $existingSlot->setId($slot["slot_id"]);
                    $slots[] = $existingSlot;
                }
            }
            return $slots;
        } catch(Exception $e) {
            echo $e;
            return null;
        }
    }

    public function addBoardingSlot(BoardingSlot $slot): bool
    {
        try{
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
            $stmt->bindParam(":image", $image);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":information", $information, PDO::PARAM_STR);
            $stmt->bindParam(":isAvailable", $isAvailable, PDO::PARAM_BOOL);
            $stmt->bindParam(":petId", $petId, PDO::PARAM_INT);
            $stmt->bindParam(":petName", $petName, PDO::PARAM_STR);
            
            return $stmt->execute() > 0;
        } catch(Exception $e) {
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

            $isDeleted = $stmt->execute() > 0;

            return $isDeleted;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }
}