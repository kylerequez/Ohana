<?php
class StudHistoryServices
{
    private ?StudHistoryDAO $dao = null;
    public function __construct(StudHistoryDAO $dao)
    {
        $this->dao = $dao;
    }
    public function addRecord(array $data): bool
    {
        $maleId = $data['maleId'];
        $femaleId = $data['femaleId'];
        $date = $data['date'];
        $status = $data['status'];
        $history = new StudHistory($maleId, $femaleId, new DateTime($date), $status);
        if (!$this->dao->addRecord($history)) {
            $_SESSION['msg'] = "There was an error in adding the record. SQL Error.";
            return false;
        }
        $_SESSION['msg'] = "You have successfully added a record in the stud history.";
        return true;
    }
    public function updateRecord(string $id, array $data): bool
    {
        $maleId = $data['maleId'];
        $femaleId = $data['femaleId'];
        $date = $data['date'];
        $status = $data['status'];
        $history = new StudHistory($maleId, $femaleId, new DateTime($date), $status);
        if (!$this->dao->updateRecord($id, $history)) {
            $_SESSION['msg'] = "There was an error in updating the record. SQL Error.";
            return false;
        }
        $_SESSION['msg'] = "You have successfully updated a record in the stud history.";
        return true;
    }
    public function deleteRecord(string $id): bool
    {
        if (!$this->dao->deleteRecord($id)) {
            $_SESSION['msg'] = "There was an error in deleting the record. SQL Error.";
            return false;
        }
        $_SESSION['msg'] = "You have successfully deleted a record in the stud history.";
        return true;
    }
}
