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

    public function getUserPetProfile(string $id): mixed
    {
        return $this->dao->searchByAccountId($id);
    }

    public function addPetProfile(array $data): mixed
    {
        // ADD IMAGE VALIDATION SOON !!! IMPORTANT
        $image = $data["image"];

        $name = strtoupper($data["name"]);
        $trait = strtoupper($data["trait"]);
        $birthdate = DateTime::createFromFormat("Y-m-d", $data["birthdate"]);
        $sex = strtoupper($data["sex"]);
        $color = strtoupper($data["color"]);
        $isVaccinated = $data["isVaccinated"] == "Yes" ? 1 : 0;
        $pcciStatus = strtoupper($data["pcciStatus"]);
        $accountId = $data["accountId"];
        $ownerName = strtoupper($data["ownerName"]);
        $price = $data["price"];
        $status = "AVAILABLE";

        $petProfile = new PetProfile($image, $name, $birthdate, $sex, $color, $trait, $isVaccinated, $pcciStatus, $accountId, $ownerName, $price, $status);
        if (!$this->dao->addPetProfile($petProfile)) {
            $_SESSION["msg"] = "There was an error in adding the Pet Profile.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully added a Pet Profile";
        return true;
    }

    public function updatePetProfile(string $id, array $data): bool
    {
        if (is_null($this->dao->searchById($id))) {
            $_SESSION["msg"] = "Pet Profile $id was not updated! The pet profile does not exist";
            return false;
        }

        $image = $data["image"];
        $name = strtoupper($data["name"]);
        $trait = strtoupper($data["trait"]);
        $birthdate = DateTime::createFromFormat("Y-m-d", $data["birthdate"]);
        $sex = strtoupper($data["sex"]);
        $color = strtoupper($data["color"]);
        $isVaccinated = $data["isVaccinated"] == "Yes" ? 1 : 0;
        $pcciStatus = strtoupper($data["pcciStatus"]);
        $accountId = $data["accountId"];
        $ownerName = strtoupper($data["ownerName"]);
        $price = $data["price"];
        $status = $data["status"];

        $profile = new PetProfile($image, $name, $birthdate, $sex, $color, $trait, $isVaccinated, $pcciStatus, $accountId, $ownerName, $price, $status);
        $profile->setId($id);
        if (!$this->dao->updatePetProfile($profile)) {
            $_SESSION["msg"] = "There was an error in updating the Pet Profile.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully updated Pet Profile ID $id!";
        return true;
    }

    public function deletePetProfile($id): bool
    {
        if (is_null($this->dao->searchById($id))) {
            $_SESSION["msg"] = "There was an error in deleting the Pet Profile. The Pet Profile does not exist in the database.";
            return false;
        }
        if (!$this->dao->deletePetProfile($id)) {
            $_SESSION["msg"] = "There was an error in deleting the Pet Profile.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully deleted Pet Profile ID $id!";
        return true;
    }
}
