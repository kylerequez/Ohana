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

    public function getAppointmentsByAccountId(string $id): mixed
    {
        return $this->dao->getAppointmentsByAccountId($id);
    }

    public function addAppointment(array $data): bool
    {
        date_default_timezone_set('Asia/Manila');
        $now = new DateTime("now");

        $user = unserialize($_SESSION["user"]);

        $type = strtoupper(trim($data["type"]));
        $accountId = $user->getId();
        $customerName = $user->getFname() . " " . $user->getLname();

        $time = explode(" - ", $_POST["appointmentTime"]);
        print_r($time);
        $start = new DateTime($_POST["date"] . " " . $time[0]);
        $end = new DateTime($_POST["date"] . " " . $time[1]);

        if ($start < $now) {
            $_SESSION["msg"] = "Invalid date. You must select a day that is 4 days from now.";
            return false;
        }

        if (date_diff($now, $start)->format('%a') < 4) {
            $_SESSION["msg"] = "Invalid date. You must select a day that is 4 days from now.";
            return false;
        }

        $title = "";
        if ($type == "REHOMING") {
            $title = "$customerName's Rehoming Appointment";
        } else if ($type == "STUD") {
            $title = "$customerName's Stud Service Appointment";
        } else {
            $title = "$customerName's Kennel Visit";
        }

        $description = "";
        if ($type == "REHOMING") {
            $description = "$customerName will be bringing a new dog in their ohana.";
        } else if ($type == "STUD") {
            $description = "$customerName will be availailing for a stud service to make their ohana larger.";
        } else {
            $description = "$customerName will be visiting one of our dogs. Who will it be?";
        }

        $appointment = new Appointment($title, $type, $accountId, $customerName, $description, $start, $end);
        if (!$this->dao->addAppointment($appointment)) {
            $_SESSION["msg"] = "There was an error in setting the appointment.";
            return false;
        }
        $_SESSION["msg"] = "You successfully set an appointment at {$start->format("M-d-Y")} from {$start->format("H:i A")} to {$end->format("H:i A")}";
        return true;
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
        $status = trim($data["status"]);
        $description = trim($data["description"]);
        $accountId = $data["accountId"];
        $startDate = new DateTime(str_replace("T", " ", $data["startDate"]));
        $endDate = new DateTime(str_replace("T", " ", $data["endDate"]));
        $appointment = new Appointment($title, $type, $accountId, null, $description, $startDate, $endDate);
        $appointment->setStatus($status);
        $appointment->setId($id);
        if (!$this->dao->updateAppointment($appointment)) {
            $_SESSION["msg"] = "There was an error in updating the appointment.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully updated Appointment $id!";
        return true;
    }

    public function getScheduledAppointments(string $date): mixed
    {
        return $this->dao->getScheduledAppointments($date);
    }
}
