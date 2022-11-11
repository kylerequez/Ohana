<?php

class BoardingSlotServices
{
    private ?BoardingSlotDAO $dao = null;

    public function __construct(BoardingSlotDAO $dao)
    {
        $this->dao = $dao;
    }

    public function getAllBoardingSlots(): mixed
    {
        return $this->dao->getAllBoardingSlots();
    }

    public function deleteSlot($id): bool
    {
        if (is_null($this->dao->searchById($id))) {
            $_SESSION["msg"] = "Boarding slot was not deleted! The slot does not exists";
            return false;
        }
        if (!$this->dao->deleteById($id)) {
            $_SESSION["msg"] = "Boarding slot $id is not deleted!";
            return false;
        }
        $_SESSION["msg"] = "Boarding slot $id is deleted!";
        return true;
    }

    public function addBoardingSlot(array $data): mixed
    {
        // ADD IMAGE VALIDATION !!! IMPORTANT
        $image = $data["image"];

        $name = strtoupper($data["name"]);
        $information = strtoupper($data["information"]);
        $isAvailable = $data["isAvailable"];

        if(!is_null($this->dao->searchByName($name))){
            $_SESSION["msg"] = "The pet boarding slot already exists.";
            return false;
        }

        $slot = new BoardingSlot($image, $name, $information, $isAvailable, null, null,);
        if (!$this->dao->addBoardingSlot($slot)) {
            $_SESSION["msg"] = "There was an error in adding the pet boarding slot.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully added a pet boarding slot!";
        return true;
    }

    public function updateBoardingSlot(string $id, array $data): bool
    {
        if (is_null($this->dao->searchById($id))) {
            $_SESSION["msg"] = "Boarding slot $id was not updated! The slot does not exist";
            return false;
        }

        // ADD IMAGE VALIDATION !!! IMPORTANT
        $image = $data["image"];

        $name = strtoupper($data["name"]);
        
        $information = strtoupper($data["information"]);
        $isAvailable = $data["isAvailable"] == "AVAILABLE" ? 1 : 0;
        if ($isAvailable == 1) {
            echo "Empty 1";
            $petId = null;
            $petName = null;
        } else {
            if (empty($petId)) {
                $petId = null;
                $petName = null;
            } else {
                $petId = intval($data["petId"]);
                $petName = $data["petName"];
            }
        }

        $slot = new BoardingSlot($image, $name, $information, $isAvailable, $petId, $petName);
        $slot->setId($id);
        if (!$this->dao->updateBoardingSlot($slot)) {
            $_SESSION["msg"] = "There was an error in updating the boarding slot.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully updated Slot ID $id!";
        return true;
    }
}
