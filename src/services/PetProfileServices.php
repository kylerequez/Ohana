<?php

class PetProfileServices
{
    private ?PetProfileDAO $dao = null;

    public function __construct(PetProfileDAO $dao)
    {
        $this->dao = $dao;
    }

    public function getAllPetProfiles(): mixed
    {
        return $this->dao->getAllPetProfiles();
    }

    public function getOhanaPets(): mixed
    {
        return $this->dao->getOhanaPets();
    }
}
