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
        try{
            $sql = "
                SELECT * FROM ohana_pet_profiles;
            ";

            $stmt = $this->conn->query($sql);
            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while($petProfile = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $existingPetProfile = new PetProfile($petProfile["pet_image"], $petProfile["pet_name"], $petProfile["pet_age"], new DateTime($petProfile["pet_birthdate"]), $petProfile["pet_sex"], $petProfile["pet_color"], $petProfile["is_vaccinated"], $petProfile["pcci_status"], $petProfile["account_id"], $petProfile["owner_name"], $petProfile["pet_price"], $petProfile["pet_status"]);
                    $existingPetProfile->setId($petProfile["pet_id"]);
                    $petProfiles[] = $existingPetProfile;
                }
            }
            return $petProfiles;
        } catch(Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getOhanaPets(): mixed
    {
        try{
            $sql = "
                SELECT * FROM ohana_pet_profiles
                WHERE owner_name = 'OHANA';
            ";

            $stmt = $this->conn->query($sql);
            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while($petProfile = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $existingPetProfile = new PetProfile($petProfile["pet_image"], $petProfile["pet_name"], $petProfile["pet_age"], new DateTime($petProfile["pet_birthdate"]), $petProfile["pet_sex"], $petProfile["pet_color"], $petProfile["is_vaccinated"], $petProfile["pcci_status"], $petProfile["account_id"], $petProfile["owner_name"], $petProfile["pet_price"], $petProfile["pet_status"]);
                    $existingPetProfile->setId($petProfile["pet_id"]);
                    $petProfiles[] = $existingPetProfile;
                }
            }
            return $petProfiles;
        } catch(Exception $e) {
            echo $e;
            return null;
        }
    }

    public function addPetProfile(PetProfile $profile): mixed
    {
        try{
            $sql = "
                
            ";
        } catch(Exception $e) {
            echo $e;
            return null;
        }
    }
}