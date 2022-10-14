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

    public function addPetProfile(array $data): mixed
    {
        $image = $data["image"];
        $name = $data["name"];
        $age = $data["age"];


        //$petProfile = new PetProfile();

        //return $this->dao->addPetProfile($petProfile);
    }
}
