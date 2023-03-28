<?php

include_once dirname(__DIR__) . '/models/VaccineRecord.php';

class VaccineRecordDAO
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
    public function getAllVaccineRecordsByPetReference(string $reference): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_vaccine_records
                    WHERE pet_reference = :reference";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":reference", $reference, PDO::PARAM_STR);
            $records = null;
            if ($stmt->execute() > 0) {
                while ($record = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingRecord = new VaccineRecord(
                        $record['pet_reference'],
                        $record['vaccine_image'],
                        $record['vaccine_name'],
                        new DateTime($record['vaccine_date']),
                        new DateTime($record['vaccine_revaccination'])
                    );
                    $existingRecord->setId($record['vaccine_id']);
                    $records[] = $existingRecord;
                }
            }
            return $records;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function addVaccineRecord(VaccineRecord $record): bool
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "INSERT INTO ohana_vaccine_records (
                        pet_reference, 
                        vaccine_image, 
                        vaccine_name, 
                        vaccine_date, 
                        vaccine_revaccination
                        )
                    VALUES (
                        :reference,
                        :image,
                        :name,
                        :vaccineDate,
                        :vaccineRevaccination
                        );";

            $reference = $record->getPetReference();
            $image = $record->getImage();
            $name = $record->getName();
            $vaccineDate = $record->getVaccineDate()->format("Y-m-d");
            $vaccineRevaccination = $record->getRevaccinationDate()->format("Y-m-d");

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":reference", $reference, PDO::PARAM_STR);
            $stmt->bindParam(":image", $image, PDO::PARAM_STR);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":vaccineDate", $vaccineDate, PDO::PARAM_STR);
            $stmt->bindParam(":vaccineRevaccination", $vaccineRevaccination, PDO::PARAM_STR);
            $isAdded = $stmt->execute() > 0;
            $this->conn->commit();
            return $isAdded;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        } finally {
            $this->closeConnection();
        }
    }
    public function updateVaccineRecord(int $id, VaccineRecord $record): bool
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "UPDATE ohana_vaccine_records
                    SET
                        vaccine_image = :image,
                        vaccine_name = :name,
                        vaccine_date = :date,
                        vaccine_revaccination = :revaccination
                    WHERE vaccine_id = :id";
            $image = $record->getImage();
            $name = $record->getName();
            $date = $record->getVaccineDate()->format('Y-m-d');
            $revaccination = $record->getRevaccinationDate()->format('Y-m-d');
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":image", $image, PDO::PARAM_STR);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":date", $date, PDO::PARAM_STR);
            $stmt->bindParam(":revaccination", $revaccination, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $isUpdated = $stmt->execute() > 0;
            $this->conn->commit();
            return $isUpdated;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        } finally {
            $this->closeConnection();
        }
    }
    public function deleteVaccineRecord(int $id): bool
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "DELETE FROM ohana_vaccine_records
                    WHERE vaccine_id = :id";

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
}
