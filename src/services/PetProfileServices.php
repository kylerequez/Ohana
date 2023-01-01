<?php
class PetProfileServices
{
    private ?PetProfileDAO $dao = null;
    private ?StudHistoryDAO $history = null;

    public function __construct(PetProfileDAO $dao, ?StudHistoryDAO $history)
    {
        $this->dao = $dao;
        $this->history = $history;
    }

    public function getAllDams(): mixed
    {
        return $this->dao->getAllDams();
    }

    public function getRehomingPets(): mixed
    {
        return $this->dao->getRehomingPets();
    }

    public function getStudPets(): mixed
    {
        return $this->dao->getStudPets();
    }

    public function getOwnedPet(string $reference,  string $name): mixed
    {
        return $this->dao->getOwnedPet($reference, $name);
    }

    public function getCustomerPets(): mixed
    {
        return $this->dao->getCustomerPets();
    }

    public function getOhanaPets(): mixed
    {
        $profiles = $this->dao->getOhanaPets();
        if (!is_null($profiles)) {
            foreach ($profiles as  $profile) {
                $profile->setStudHistory($this->history->getAllStudHistoryByMaleId($profile->getId()));
            }
        }

        return $profiles;
    }

    public function getOhanaStudPet(string $reference, string $name): mixed
    {
        $profile = $this->dao->getOhanaStudPet($reference, $name);
        $profile->setStudHistory($this->history->getAllStudHistoryByMaleId($profile->getId()));
        $profile->setStudRate(($this->history->getTotalHistoryCount($profile->getId()) == 0) ? 0 : $this->history->getTotalSuccessCount($profile->getId()) / $this->history->getTotalHistoryCount($profile->getId()));
        return $profile;
    }

    public function getOhanaRehomingPet(string $reference,  string $name): mixed
    {
        return $this->dao->getOhanaRehomingPet($reference, $name);
    }

    public function getUserPetProfile(string $id): mixed
    {
        return $this->dao->searchByAccountId($id);
    }

    public function getOhanaPetsCount(): mixed
    {
        return $this->dao->getOhanaPetsCount();
    }

    public function getCustomerPetsCount(): mixed
    {
        return $this->dao->getCustomerPetsCount();
    }

    public function getPetProfileById(string $id, string $accountId): mixed
    {
        $profile = $this->dao->getPetProfileById($id, $accountId);
        if (empty($profile)) {
            $_SESSION["msg"] = "The Pet Profile does not exist.";
            return null;
        }
        return $profile;
    }

    public function addPetProfile(array $data): mixed
    {
        $image = $data["image"];

        $reference = uniqid();
        $name = trim($data["name"]);
        $type = strtoupper($data["type"]);
        $trait = trim($data["trait"]);
        $birthdate = DateTime::createFromFormat("Y-m-d", $data["birthdate"]);
        $sex = strtoupper($data["sex"]);
        $color = trim($data["color"]);
        $isVaccinated = $data["isVaccinated"];
        $pcciStatus = strtoupper($data["pcciStatus"]);
        $accountId = $data["accountId"];
        $ownerName = strtoupper($data["ownerName"]);
        $price = (float) $data["price"];
        $status = "AVAILABLE";

        $petProfile = new PetProfile($image, $reference, $name, $birthdate, $sex, $color, $trait, $isVaccinated, $pcciStatus, $accountId, $ownerName, $price, $status);
        $petProfile->setType($type);
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
        $reference = $data['reference'];
        $name = trim($data["name"]);
        $type = strtoupper($data["type"]);
        $trait = trim($data["trait"]);
        $birthdate = DateTime::createFromFormat("Y-m-d", $data["birthdate"]);
        $sex = strtoupper($data["sex"]);
        $color = trim($data["color"]);
        $isVaccinated = $data["isVaccinated"];
        $pcciStatus = strtoupper($data["pcciStatus"]);
        $accountId = $data["accountId"];
        $ownerName = strtoupper($data["ownerName"]);
        $price = (float) $data["price"];
        $status = $data["status"];

        $profile = new PetProfile($image, $reference, $name, $birthdate, $sex, $color, $trait, $isVaccinated, $pcciStatus, $accountId, $ownerName, $price, $status);
        $profile->setType($type);
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

    public function getThreeRehomingPets(): mixed
    {
        return $this->dao->getThreeRehomingPets();
    }

    public function filterRehomingPets(string $trait, string $sex): mixed
    {
        if ($trait == 'All' && $sex == 'All') {
            return $this->dao->getRehomingPets();
        } else if ($trait != 'All' && $sex == 'All') {
            return $this->dao->filterPetsByTrait("REHOMING", $trait);
        } else if ($trait == 'All' && $sex != 'All') {
            return $this->dao->filterPetsBySex("REHOMING", $sex);
        } else {
            return $this->dao->filterPetsByTraitAndSex("REHOMING", $trait, $sex);
        }
    }

    public function filterStudPets(string $trait, string $sex): mixed
    {
        if ($trait == 'All' && $sex == 'All') {
            $profiles = $this->dao->getStudPets();
        } else if ($trait != 'All' && $sex == 'All') {
            $profiles = $this->dao->filterPetsByTrait("STUD", $trait);
        } else if ($trait == 'All' && $sex != 'All') {
            $profiles = $this->dao->filterPetsBySex("STUD", $sex);
        } else {
            $profiles = $this->dao->filterPetsByTraitAndSex("STUD", $trait, $sex);
        }
        if (!is_null($profiles)) {
            foreach ($profiles as $profile) {
                $profile->setStudRate(($this->history->getTotalHistoryCount($profile->getId()) == 0) ? 0 : $this->history->getTotalSuccessCount($profile->getId()) / $this->history->getTotalHistoryCount($profile->getId()));
            }
        }
        return $profiles;
    }
}
