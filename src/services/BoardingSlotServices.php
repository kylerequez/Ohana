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
}