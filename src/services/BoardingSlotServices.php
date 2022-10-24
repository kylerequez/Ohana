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
        return $this->dao->deleteById($id);
    }

    public function addBoardingSlot(array $data): mixed
    {
        // ADD IMAGE VALIDATION !!! IMPORTANT
        $image = $data["image"];

        $name = strtoupper($data["name"]);
        $information = strtoupper($data["information"]);
        $isAvailable = $data["isAvailable"];

        $slot = new BoardingSlot($image, $name, $information, $isAvailable, null, null,);

        return $this->dao->addBoardingSlot($slot);
    }

    public function updateBoardingSlot(string $id, array $data): bool
    {
        if (!is_null($this->dao->searchById($id))) {
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
                    echo "Empty 0";
                    $petId = null;
                    $petName = null;
                } else {
                    $petId = intval($data["petId"]);
                    $petName = $data["petName"];
                    echo "$petId : $petName";
                }
            }

            $slot = new BoardingSlot($image, $name, $information, $isAvailable, $petId, $petName);
            $slot->setId($id);
            $isUpdated = $this->dao->updateBoardingSlot($slot);
        } else {
            $_SESSION["msg"] = "Pet Profile $id was not updated! The pet profile does not exist";
            $isUpdated = false;
        }
        return $isUpdated;
    }
}
