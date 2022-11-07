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
}