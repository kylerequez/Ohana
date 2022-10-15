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
        // ADD IMAGE VALIDATION SOON !!! IMPORTANT
        $image = $data["image"];

        $name = strtoupper($data["name"]);
        $age = $data["age"];
        $birthdate = DateTime::createFromFormat("Y-m-d", $data["birthdate"]);
        $sex = strtoupper($data["sex"]);
        $color = strtoupper($data["color"]);
        $isVaccinated = $data["isVaccinated"] == "Yes" ? 1 : 0;
        $pcciStatus = strtoupper($data["pcciStatus"]);
        $accountId = $data["accountId"];
        $ownerName = strtoupper($data["ownerName"]);
        $price = $data["price"];
        $status = "AVAILABLE";

        $petProfile = new PetProfile($image, $name, $age, $birthdate, $sex, $color, $isVaccinated, $pcciStatus, $accountId, $ownerName, $price, $status);
        
        return $this->dao->addPetProfile($petProfile);
    }

    public function deletePetProfile($id): bool
    {
        if (!is_null($this->dao->searchById($id))) {
            $isDeleted = $this->dao->deletePetProfile($id);
            if ($isDeleted) {
                $_SESSION["msg"] = "You have successfully deleted Pet Profile ID $id!";
            } else {
                $_SESSION["msg"] = "There was an error in deleting the Pet Profile.";
            }
        } else {
            $_SESSION["msg"] = "There was an error in deleting the Pet Profile. The Pet Profile does not exist in the database.";
            $isDeleted = false;
        }
        return $isDeleted;
    }
}
