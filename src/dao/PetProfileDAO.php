<?php
require_once dirname(__DIR__) . "/models/PetProfile.php";
class PetProfileDAO
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }

    public function getCustomerPets(): mixed
    {
        try {
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE account_id != 1;";

            $stmt = $this->conn->query($sql);

            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_name"],
                        new DateTime($petProfile["pet_birthdate"]),
                        $petProfile["pet_sex"],
                        $petProfile["pet_color"],
                        $petProfile["pet_trait"],
                        $petProfile["is_vaccinated"],
                        $petProfile["pcci_status"],
                        $petProfile["account_id"],
                        $petProfile["owner_name"],
                        $petProfile["pet_price"],
                        $petProfile["pet_status"]
                    );
                    $searchedPetProfile->setType($petProfile["pet_type"]);
                    $searchedPetProfile->setId($petProfile["pet_id"]);

                    $petProfiles[] = $searchedPetProfile;
                }
            }
            return $petProfiles;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getOhanaPets(): mixed
    {
        try {
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE account_id = 1;";

            $stmt = $this->conn->query($sql);

            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_name"],
                        new DateTime($petProfile["pet_birthdate"]),
                        $petProfile["pet_sex"],
                        $petProfile["pet_color"],
                        $petProfile["pet_trait"],
                        $petProfile["is_vaccinated"],
                        $petProfile["pcci_status"],
                        $petProfile["account_id"],
                        $petProfile["owner_name"],
                        $petProfile["pet_price"],
                        $petProfile["pet_status"]
                    );
                    $searchedPetProfile->setType($petProfile["pet_type"]);
                    $searchedPetProfile->setId($petProfile["pet_id"]);

                    $petProfiles[] = $searchedPetProfile;
                }
            }
            return $petProfiles;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getOhanaPet(string $id): mixed
    {
        try {
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE account_id = 1 AND pet_status='AVAILABLE' AND pet_id=:id;";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $searchedPetProfile = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_name"],
                        new DateTime($petProfile["pet_birthdate"]),
                        $petProfile["pet_sex"],
                        $petProfile["pet_color"],
                        $petProfile["pet_trait"],
                        $petProfile["is_vaccinated"],
                        $petProfile["pcci_status"],
                        $petProfile["account_id"],
                        $petProfile["owner_name"],
                        $petProfile["pet_price"],
                        $petProfile["pet_status"]
                    );
                    $searchedPetProfile->setType($petProfile["pet_type"]);
                    $searchedPetProfile->setId($petProfile["pet_id"]);
                }
            }
            return $searchedPetProfile;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getRehomingPets(): mixed
    {
        try {
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE account_id = 1 
                    AND pet_type='REHOMING' 
                    AND pet_status='AVAILABLE';";
            $stmt = $this->conn->query($sql);
            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_name"],
                        new DateTime($petProfile["pet_birthdate"]),
                        $petProfile["pet_sex"],
                        $petProfile["pet_color"],
                        $petProfile["pet_trait"],
                        $petProfile["is_vaccinated"],
                        $petProfile["pcci_status"],
                        $petProfile["account_id"],
                        $petProfile["owner_name"],
                        $petProfile["pet_price"],
                        $petProfile["pet_status"]
                    );
                    $existingPetProfile->setType($petProfile["pet_type"]);
                    $existingPetProfile->setId($petProfile["pet_id"]);
                    $petProfiles[] = $existingPetProfile;
                }
            }
            return $petProfiles;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getStudPets(): mixed
    {
        try {
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE account_id = 1 
                    AND pet_type='STUD' 
                    AND pet_status='AVAILABLE';";
            $stmt = $this->conn->query($sql);
            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_name"],
                        new DateTime($petProfile["pet_birthdate"]),
                        $petProfile["pet_sex"],
                        $petProfile["pet_color"],
                        $petProfile["pet_trait"],
                        $petProfile["is_vaccinated"],
                        $petProfile["pcci_status"],
                        $petProfile["account_id"],
                        $petProfile["owner_name"],
                        $petProfile["pet_price"],
                        $petProfile["pet_status"]
                    );
                    $existingPetProfile->setType($petProfile["pet_type"]);
                    $existingPetProfile->setId($petProfile["pet_id"]);
                    $petProfiles[] = $existingPetProfile;
                }
            }
            return $petProfiles;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getPetProfileById(string $id, string $accountId): mixed
    {
        try {
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE pet_id=:id AND account_id=:accountId
                    LIMIT 1;";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":accountId", $accountId, PDO::PARAM_INT);

            $searchedPetProfile = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_name"],
                        new DateTime($petProfile["pet_birthdate"]),
                        $petProfile["pet_sex"],
                        $petProfile["pet_color"],
                        $petProfile["pet_trait"],
                        $petProfile["is_vaccinated"],
                        $petProfile["pcci_status"],
                        $petProfile["account_id"],
                        $petProfile["owner_name"],
                        $petProfile["pet_price"],
                        $petProfile["pet_status"]
                    );
                    $searchedPetProfile->setType($petProfile["pet_type"]);
                    $searchedPetProfile->setId($id);
                }
            }
            return $searchedPetProfile;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getOhanaPetsPagination(string $limit, string $offset): mixed
    {
        try {
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE owner_name = 'OHANA KENNEL BUSINESS' AND account_id=1
                    LIMIT :limit OFFSET :offset;";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
            $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);

            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_name"],
                        new DateTime($petProfile["pet_birthdate"]),
                        $petProfile["pet_sex"],
                        $petProfile["pet_color"],
                        $petProfile["pet_trait"],
                        $petProfile["is_vaccinated"],
                        $petProfile["pcci_status"],
                        $petProfile["account_id"],
                        $petProfile["owner_name"],
                        $petProfile["pet_price"],
                        $petProfile["pet_status"]
                    );
                    $existingPetProfile->setType($petProfile["pet_type"]);
                    $existingPetProfile->setId($petProfile["pet_id"]);
                    $petProfiles[] = $existingPetProfile;
                }
            }
            return $petProfiles;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getTotalPetProfilesCount(): mixed
    {
        try {
            $sql = "SELECT count(*) FROM ohana_pet_profiles
                    WHERE owner_name = 'OHANA';";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchColumn();
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getOhanaPetsCount(): mixed
    {
        try {
            $sql = "SELECT count(*) FROM ohana_pet_profiles
                    WHERE account_id = 1;";

            $stmt = $this->conn->query($sql);
            $stmt->execute();

            return $stmt->fetchColumn();
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getCustomerPetsCount(): mixed
    {
        try {
            $sql = "SELECT count(*) FROM ohana_pet_profiles
                    WHERE account_id != 1;";

            $stmt = $this->conn->query($sql);
            $stmt->execute();

            return $stmt->fetchColumn();
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function addPetProfile(PetProfile $profile): mixed
    {
        try {
            $sql = "INSERT INTO ohana_pet_profiles
                    (pet_image, pet_name, pet_type, pet_trait, pet_birthdate, pet_sex, pet_color, is_vaccinated, pcci_status, account_id, owner_name, pet_price, pet_status)
                    VALUES (:pet_image, :pet_name, :pet_type, :pet_trait, :pet_birthdate, :pet_sex, :pet_color, :is_vaccinated, :pcci_status, :account_id, :owner_name, :pet_price, :pet_status);";

            $image = $profile->getImage();
            $name = $profile->getName();
            $type = $profile->getType();
            $trait = $profile->getTrait();
            $birthdate = $profile->getBirthdate()->format("Y-m-d");
            $sex = $profile->getSex();
            $color = $profile->getColor();
            $isVaccinated = $profile->getIsVaccinated();
            $pcciStatus = $profile->getPcciStatus();
            $accountId = $profile->getAccountId();
            $ownerName = $profile->getOwnerName();
            $price = $profile->getPrice();
            $status = $profile->getStatus();

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":pet_image", $image, PDO::PARAM_STR);
            $stmt->bindParam(":pet_name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":pet_type", $type, PDO::PARAM_STR);
            $stmt->bindParam(":pet_trait", $trait, PDO::PARAM_STR);
            $stmt->bindParam(":pet_birthdate", $birthdate, PDO::PARAM_STR);
            $stmt->bindParam(":pet_sex", $sex, PDO::PARAM_STR);
            $stmt->bindParam(":pet_color", $color, PDO::PARAM_STR);
            $stmt->bindParam(":is_vaccinated", $isVaccinated, PDO::PARAM_BOOL);
            $stmt->bindParam(":pcci_status", $pcciStatus, PDO::PARAM_STR);
            $stmt->bindParam(":account_id", $accountId, PDO::PARAM_INT);
            $stmt->bindParam(":owner_name", $ownerName, PDO::PARAM_STR);
            $stmt->bindParam(":pet_price", $price, PDO::PARAM_STR);
            $stmt->bindParam(":pet_status", $status, PDO::PARAM_STR);

            return $stmt->execute() > 0;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function searchById(string $id): mixed
    {
        try {
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE pet_id=:id
                    LIMIT 1;
                    ";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $searchedPetProfile = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_name"],
                        new DateTime($petProfile["pet_birthdate"]),
                        $petProfile["pet_sex"],
                        $petProfile["pet_color"],
                        $petProfile["pet_trait"],
                        $petProfile["is_vaccinated"],
                        $petProfile["pcci_status"],
                        $petProfile["account_id"],
                        $petProfile["owner_name"],
                        $petProfile["pet_price"],
                        $petProfile["pet_status"]
                    );
                    $searchedPetProfile->setType($petProfile["pet_type"]);
                    $searchedPetProfile->setId($id);
                }
            }
            return $searchedPetProfile;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function searchByAccountId(string $id): mixed
    {
        try {
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE account_id=:id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_name"],
                        new DateTime($petProfile["pet_birthdate"]),
                        $petProfile["pet_sex"],
                        $petProfile["pet_color"],
                        $petProfile["pet_trait"],
                        $petProfile["is_vaccinated"],
                        $petProfile["pcci_status"],
                        $petProfile["account_id"],
                        $petProfile["owner_name"],
                        $petProfile["pet_price"],
                        $petProfile["pet_status"]
                    );
                    $searchedPetProfile->setType($petProfile["pet_type"]);
                    $searchedPetProfile->setId($petProfile["pet_id"]);
                    $petProfiles[] = $searchedPetProfile;
                }
            }
            return $petProfiles;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function updatePetProfile(PetProfile $profile): bool
    {
        try {
            $sql = "UPDATE ohana_pet_profiles
                    SET pet_image=:image, pet_name=:name, pet_type=:type, pet_trait=:trait, pet_birthdate=:birthdate, pet_sex=:sex, pet_color=:color, is_vaccinated=:isVaccinated, pcci_status=:pcciStatus, account_id=:accountId, owner_name=:ownerName, pet_price=:price, pet_status=:status
                    WHERE pet_id=:id";

            $id = $profile->getId();
            $image = $profile->getImage();
            $name = $profile->getName();
            $type = $profile->getType();
            $trait = $profile->getTrait();
            $birthdate = $profile->getBirthdate()->format("Y-m-d");
            $sex = $profile->getSex();
            $color = $profile->getColor();
            $isVaccinated = $profile->getIsVaccinated();
            $pcciStatus = $profile->getPcciStatus();
            $accountId = $profile->getAccountId();
            $ownerName = $profile->getOwnerName();
            $price = $profile->getPrice();
            $status = $profile->getStatus();

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":image", $image, PDO::PARAM_STR);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":type", $type, PDO::PARAM_STR);
            $stmt->bindParam(":trait", $trait, PDO::PARAM_STR);
            $stmt->bindParam(":birthdate", $birthdate, PDO::PARAM_STR);
            $stmt->bindParam(":sex", $sex, PDO::PARAM_STR);
            $stmt->bindParam(":color", $color, PDO::PARAM_STR);
            $stmt->bindParam(":isVaccinated", $isVaccinated, PDO::PARAM_BOOL);
            $stmt->bindParam(":pcciStatus", $pcciStatus, PDO::PARAM_STR);
            $stmt->bindParam(":accountId", $accountId, PDO::PARAM_INT);
            $stmt->bindParam(":ownerName", $ownerName, PDO::PARAM_STR);
            $stmt->bindParam(":price", $price, PDO::PARAM_STR);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);

            return $stmt->execute() > 0;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function deletePetProfile(int $id): bool
    {
        try {
            $sql = "DELETE FROM ohana_pet_profiles
                    WHERE pet_id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            return $stmt->execute() > 0;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }
}
