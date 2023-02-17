<?php
require_once dirname(__DIR__) . "/models/PetProfile.php";
class PetProfileDAO
{
    private ?string $host = null;
    private ?string $name = null;
    private ?string $user = null;
    private ?string $password = null;
    private ?PDO $conn = null;
    public function __construct(string $host, string $name, string $user, string $password)
    {
        $this->host = $host;
        $this->name = $name;
        $this->user = $user;
        $this->password = $password;
    }
    public function openConnection(): void
    {
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->name};charset=utf8", $this->user, $this->password);
    }
    public function closeConnection(): void
    {
        $this->conn = null;
    }
    public function getAllDams(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE account_id != 1
                    AND pet_sex = 'FEMALE';";
            $stmt = $this->conn->query($sql);
            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_reference"],
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
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getPetByReference(string $reference): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_pet_profiles
                WHERE pet_status = 'AVAILABLE'
                AND pet_reference = :reference
                AND account_id = 1
                LIMIT 1;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":reference", $reference, PDO::PARAM_STR);
            $profile = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_reference"],
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
                    $profile = $searchedPetProfile;
                }
            }
            return $profile;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getOwnedPetByReference(string $reference): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_pet_profiles
                WHERE pet_status = 'AVAILABLE'
                AND pet_reference = :reference
                AND account_id != 1
                LIMIT 1;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":reference", $reference, PDO::PARAM_STR);
            $profile = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_reference"],
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
                    $profile = $searchedPetProfile;
                }
            }
            return $profile;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function filterPetsByTrait(string $type, string $trait): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE pet_status = 'AVAILABLE'
                    AND pet_type = :type
                    AND pet_trait = :trait
                    AND account_id = 1;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":type", $type, PDO::PARAM_STR);
            $stmt->bindParam(":trait", $trait, PDO::PARAM_STR);
            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_reference"],
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
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function filterPetsBySex(string $type, string $sex): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE pet_status = 'AVAILABLE'
                    AND pet_type = :type
                    AND pet_sex = :sex
                    AND account_id = 1;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":type", $type, PDO::PARAM_STR);
            $stmt->bindParam(":sex", $sex, PDO::PARAM_STR);
            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_reference"],
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
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function filterPetsByTraitAndSex(string $type, string $trait, string $sex): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE pet_status = 'AVAILABLE'
                    AND pet_type = :type
                    AND pet_trait = :trait
                    AND pet_sex = :sex
                    AND account_id = 1;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":type", $type, PDO::PARAM_STR);
            $stmt->bindParam(":trait", $trait, PDO::PARAM_STR);
            $stmt->bindParam(":sex", $sex, PDO::PARAM_STR);
            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_reference"],
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
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getThreeRehomingPets(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE pet_status = 'AVAILABLE'
                    AND pet_type = 'REHOMING'
                    AND account_id = 1
                    LIMIT 3;";
            $stmt = $this->conn->query($sql);
            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_reference"],
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
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getCustomerPets(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE account_id != 1;";
            $stmt = $this->conn->query($sql);
            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_reference"],
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
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getOhanaPets(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE account_id = 1;";
            $stmt = $this->conn->query($sql);
            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_reference"],
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
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getOhanaStudPet(string $reference, string $name): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE account_id = 1
                    AND  pet_type = 'STUD'
                    AND pet_status='AVAILABLE' 
                    AND pet_reference=:reference
                    AND pet_name=:name;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":reference", $reference, PDO::PARAM_STR);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $searchedPetProfile = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_reference"],
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
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getOhanaRehomingPet(string $reference,  string  $name): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE account_id = 1
                    AND pet_type = 'REHOMING'
                    AND pet_status='AVAILABLE' 
                    AND pet_reference=:reference
                    AND pet_name=:name;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":reference", $reference, PDO::PARAM_STR);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $searchedPetProfile = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_reference"],
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
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getOwnedPet(string $reference,  string $name): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE pet_reference=:reference
                    AND pet_name=:name;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":reference", $reference, PDO::PARAM_STR);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $searchedPetProfile = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_reference"],
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
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getRehomingPets(): mixed
    {
        try {
            $this->openConnection();
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
                        $petProfile["pet_reference"],
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
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getStudPets(): mixed
    {
        try {
            $this->openConnection();
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
                        $petProfile["pet_reference"],
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
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getPetProfileById(string $id, string $accountId): mixed
    {
        try {
            $this->openConnection();
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
                        $petProfile["pet_reference"],
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
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getOhanaPetsCount(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT count(*) FROM ohana_pet_profiles
                    WHERE account_id = 1;";
            $stmt = $this->conn->query($sql);
            $stmt->execute();
            $result = $stmt->fetchColumn();
            return $result;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getCustomerPetsCount(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT count(*) FROM ohana_pet_profiles
                    WHERE account_id != 1;";
            $stmt = $this->conn->query($sql);
            $stmt->execute();
            $result = $stmt->fetchColumn();
            return $result;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function addPetProfile(PetProfile $profile): mixed
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "INSERT INTO ohana_pet_profiles
                    (pet_image, pet_reference, pet_name, pet_type, pet_trait, pet_birthdate, pet_sex, pet_color, is_vaccinated, pcci_status, account_id, owner_name, pet_price, pet_status)
                    VALUES (:pet_image, :pet_reference, :pet_name, :pet_type, :pet_trait, :pet_birthdate, :pet_sex, :pet_color, :is_vaccinated, :pcci_status, :account_id, :owner_name, :pet_price, :pet_status);";
            $image = $profile->getImage();
            $reference = $profile->getReference();
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
            $stmt->bindParam(":pet_reference", $reference, PDO::PARAM_STR);
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
            $isAdded = $stmt->execute() > 0;
            $this->conn->commit();
            return $isAdded;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function searchById(string $id): mixed
    {
        try {
            $this->openConnection();
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
                        $petProfile["pet_reference"],
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
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function searchByAccountId(string $id): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_pet_profiles
                    WHERE account_id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $petProfiles = null;
            if ($stmt->execute() > 0) {
                while ($petProfile = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedPetProfile = new PetProfile(
                        $petProfile["pet_image"],
                        $petProfile["pet_reference"],
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
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function updatePetProfile(PetProfile $profile): bool
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
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
            $isUpdated = $stmt->execute() > 0;
            $this->conn->commit();
            return $isUpdated;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function deletePetProfile(int $id): bool
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "DELETE FROM ohana_pet_profiles
                    WHERE pet_id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $isDeleted = $stmt->execute() > 0;
            $this->conn->commit();
            return $isDeleted;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        } finally {
            $this->closeConnection();
        }
    }
    public function setStatusToSold(string $id): bool
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "UPDATE ohana_pet_profiles
                    SET pet_status='SOLD'
                    WHERE pet_id=:id;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $isUpdated = $stmt->execute() > 0;
            $this->conn->commit();
            return $isUpdated;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return null;
        } finally {
            $this->closeConnection();
        }
    }
}
