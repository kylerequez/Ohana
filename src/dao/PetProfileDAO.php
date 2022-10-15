<?php
require_once dirname(__DIR__) . "/models/PetProfile.php";

class PetProfileDAO
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }

    public function getAllPetProfiles(): mixed
    {
        try {
            $sql = "
                SELECT * FROM ohana_pet_profiles;
            ";

            $stmt = $this->conn->query($sql);
            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingPetProfile = new PetProfile($petProfile["pet_image"], $petProfile["pet_name"], $petProfile["pet_age"], new DateTime($petProfile["pet_birthdate"]), $petProfile["pet_sex"], $petProfile["pet_color"], $petProfile["is_vaccinated"], $petProfile["pcci_status"], $petProfile["account_id"], $petProfile["owner_name"], $petProfile["pet_price"], $petProfile["pet_status"]);
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

    public function getOhanaPets(): mixed
    {
        try {
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE owner_name = 'OHANA';";

            $stmt = $this->conn->query($sql);
            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingPetProfile = new PetProfile($petProfile["pet_image"], $petProfile["pet_name"], $petProfile["pet_age"], new DateTime($petProfile["pet_birthdate"]), $petProfile["pet_sex"], $petProfile["pet_color"], $petProfile["is_vaccinated"], $petProfile["pcci_status"], $petProfile["account_id"], $petProfile["owner_name"], $petProfile["pet_price"], $petProfile["pet_status"]);
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

    public function addPetProfile(PetProfile $profile): mixed
    {
        try {
            $sql = "INSERT INTO ohana_pet_profiles
                    (pet_image, pet_name, pet_age, pet_birthdate, pet_sex, pet_color, is_vaccinated, pcci_status, account_id, owner_name, pet_price, pet_status)
                    VALUES (:pet_image, :pet_name, :pet_age, :pet_birthdate, :pet_sex, :pet_color, :is_vaccinated, :pcci_status, :account_id, :owner_name, :pet_price, :pet_status);";

            $image = $profile->getImage();
            $name = $profile->getName();
            $age = $profile->getAge();
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
            $stmt->bindParam(":pet_age", $age, PDO::PARAM_INT);
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
                        $petProfile["pet_age"],
                        $petProfile["pet_birthdate"],
                        $petProfile["pet_sex"],
                        $petProfile["pet_color"],
                        $petProfile["is_vaccinated"],
                        $petProfile["pccci_status"],
                        $petProfile["account_id"],
                        $petProfile["owner_name"],
                        $petProfile["pet_price"],
                        $petProfile["pet_status"]
                    );
                }
            }

            return $searchedPetProfile;
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
