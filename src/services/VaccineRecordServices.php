<?php

class VaccineRecordServices
{
    private ?VaccineRecordDAO $dao = null;
    public function __construct(VaccineRecordDAO $dao)
    {
        $this->dao = $dao;
    }
    public function getAllVaccineRecordsByPetReference($petId): mixed
    {
        return $this->dao->getAllVaccineRecordsByPetReference($petId);
    }
    public function addVaccineRecord(array $data): bool
    {
        $record = new VaccineRecord(
            $data['reference'],
            $data['image'],
            $data['name'],
            new DateTime($data['vaccineDate']),
            new DateTime($data['revaccinationDate'])
        );
        if (!$this->dao->addVaccineRecord($record)) {
            $_SESSION['msg'] = "There was an error in adding the vaccine record to the database. SQL Error.";
            return false;
        }
        $_SESSION['msg'] = "You have successfully added the vaccine record to the database";
        return true;
    }
    public function updateVaccineRecord(int $id, array $data): bool
    {
        $record = new VaccineRecord(
            $data['reference'],
            $data['image'],
            $data['name'],
            new DateTime($data['vaccineDate']),
            new DateTime($data['revaccinationDate'])
        );
        if (!$this->dao->updateVaccineRecord($id, $record)) {
            $_SESSION['msg'] = "There was an error in updating the vaccine record to the database. SQL Error.";
            return false;
        }
        $_SESSION['msg'] = "You have successfully updated the vaccine record to the database.";
        return true;
    }
    public function deleteVaccineRecord(int $id): bool
    {
        if (!$this->dao->deleteVaccineRecord($id)) {
            $_SESSION['msg'] = "There was an error in deleting the vaccine record to the database. SQL Error.";
            return false;
        }
        $_SESSION['msg'] = "You have successfully deleted the vaccine record to the database.";
        return true;
    }
}
