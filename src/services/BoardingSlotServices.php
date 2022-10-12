<?php

class BoardingSlotServices
{
    private ?BoardingSlotDAO $dao = null;

    public function __construct(BoardingSlotDAO $dao)
    {
        $this->dao = $dao;
    }

    public function getAllBoardingSlots(): array
    {
        return $this->dao->getAllBoardingSlots();
    }

    public function deleteSlot($id): bool
    {
        return $this->dao->deleteById($id);
    }
}