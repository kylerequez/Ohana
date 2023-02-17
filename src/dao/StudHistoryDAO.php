<?php
require_once dirname(__DIR__) . "/models/StudHistory.php";
class StudHistoryDAO
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
    public function addRecord(StudHistory $history): mixed
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "INSERT INTO ohana_stud_history
                    (male_id, female_id, stud_date, stud_status)
                    VALUES (:maleId, :femaleId, :date, :status);";
            $maleId = $history->getMaleId();
            $femaleId = $history->getFemaleId();
            $date = !is_null($history->getDate()) ? $history->getDate()->format('Y-m-d H:i:s') : null;
            $status = $history->getStatus();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":maleId", $maleId, PDO::PARAM_INT);
            $stmt->bindParam(":femaleId", $femaleId, PDO::PARAM_INT);
            $stmt->bindParam(":date", $date, PDO::PARAM_STR);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
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
    public function deleteRecord(string $id): bool
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "DELETE FROM ohana_stud_history
                    WHERE stud_id=:id";
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
    public function updateRecord(string $id, StudHistory $history): bool
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "UPDATE ohana_stud_history
                    SET female_id = :femaleId, stud_date = :date, stud_status = :status
                    WHERE stud_id=:id";
            $femaleId = $history->getFemaleId();
            $date = $history->getDate()->format('Y-m-d H:i:s');
            $status = $history->getStatus();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":femaleId", $femaleId, PDO::PARAM_INT);
            $stmt->bindParam(":date", $date, PDO::PARAM_STR);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $isDeleted = $stmt->execute() > 0;
            $this->conn->commit();
            return $isDeleted;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getAllStudHistory(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_stud_history;";
            $history = null;
            $stmt = $this->conn->query($sql);
            if ($stmt->execute() > 0) {
                while ($record = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedRecord = new StudHistory($record['male_id'], $record['female_id'], new DateTime($record['stud_date']), $record['stud_status']);
                    $searchedRecord->setId($record['stud_id']);
                    $history[] = $searchedRecord;
                }
            }
            return $history;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getAllStudHistoryByMaleId(string $id): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_stud_history a JOIN ohana_pet_profiles b
                    WHERE male_id = :id
                    AND a.female_id = b.pet_id;";
            $history = null;
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_STR);
            if ($stmt->execute() > 0) {
                while ($record = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedRecord = new StudHistory($record['male_id'], $record['female_id'], new DateTime($record['stud_date']), $record['stud_status']);
                    $searchedRecord->setFemale(new PetProfile($record['pet_image'], $record['pet_reference'], $record['pet_name'], new DateTime($record['pet_birthdate']), $record['pet_sex'], $record['pet_color'], $record['pet_trait'], $record['is_vaccinated'], $record['pcci_status'], $record['account_id'], $record['owner_name'], $record['pet_price'], $record['pet_status']));
                    $searchedRecord->setId($record['stud_id']);
                    $history[] = $searchedRecord;
                }
            }
            return $history;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getTotalSuccessCount(string $id): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT COUNT(*) FROM ohana_stud_history 
                    WHERE male_id = :id
                    AND stud_status = 'SUCCESS';";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchColumn();
            return $result;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getTotalHistoryCount(string $id): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT COUNT(*) FROM ohana_stud_history 
                    WHERE male_id = :id
                    AND stud_status != 'SCHEDULED';";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchColumn();
            return $result;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
}
