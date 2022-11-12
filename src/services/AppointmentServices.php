<?php

class AppointmentServices
{
    private ?AppointmentDAO $dao = null;

    public function __construct(AppointmentDAO $dao)
    {
        $this->dao = $dao;
    }

    public function getAllAppointments(): mixed
    {
        return $this->dao->getAllAppointments();
    }

    public function deleteAppointment(int $id): bool
    {
        if (is_null($this->dao->searchById($id))) {
            $_SESSION["msg"] = "Appointment not deleted! The appointment does not exists";
            return false;
        }
        if (!$this->dao->deleteById($id)) {
            $_SESSION["msg"] = "There was an error in deleting the appointment.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully deleted Appointment $id!";
        return true;
    }

    public function updateAppointment(string $id, array $data): bool
    {
        if (is_null($this->dao->searchById($id))) {
            $_SESSION["msg"] = "There was an error in updating the appointment. The appointment does not exist in the database.";
            return false;
        }
        $title = trim($data["title"]);
        $type = trim($data["type"]);
        $description = trim($data["description"]);
        $accountId = $data["accountId"];
        $startDate = new DateTime(str_replace("T", " ", $data["startDate"]));
        $endDate = new DateTime(str_replace("T", " ", $data["endDate"]));
        $appointment = new Appointment($title, $type, $accountId, null, $description, $startDate, $endDate);
        $appointment->setId($id);
        if (!$this->dao->updateAppointment($appointment)) {
            $_SESSION["msg"] = "There was an error in updating the appointment.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully updated Appointment $id!";
        return true;
    }
}
