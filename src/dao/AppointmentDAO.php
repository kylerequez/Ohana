<?php
require_once dirname(__DIR__) . "/models/Appointment.php";

class AppointmentDAO
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }

    public function getAllAppointments(): mixed
    {
        try {
            $sql = "SELECT 
                        a.appointment_id, 
                        a.appointment_title, 
                        a.appointment_type, 
                        a.appointment_description, 
                        b.account_id, 
                        b.fname, 
                        b.lname, 
                        a.appointment_start, 
                        a.appointment_end 
                    FROM ohana_appointments a, ohana_account b;";

            $stmt = $this->conn->query($sql);
            $appointments = null;
            if ($stmt->execute() > 0) {
                while ($appointment = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingAppointment = new Appointment(
                        $appointment["appointment_title"],
                        $appointment["appointment_type"],
                        $appointment["account_id"],
                        $appointment["fname"] . " " . $appointment["lname"],
                        $appointment["appointment_description"],
                        new DateTime($appointment["appointment_start"]),
                        new DateTime($appointment["appointment_end"]),
                    );
                    $existingAppointment->setId($appointment["appointment_id"]);

                    $appointments[$appointment["appointment_id"]] = $existingAppointment;
                }
            }
            return $appointments;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getAppointmentsByAccountId(int $id): mixed
    {
        try {
            $sql = "SELECT 
                        a.appointment_id, 
                        a.appointment_title, 
                        a.appointment_type, 
                        a.appointment_description, 
                        b.account_id, 
                        b.fname, 
                        b.lname, 
                        a.appointment_start, 
                        a.appointment_end 
                    FROM ohana_appointments a, ohana_account b
                    WHERE a.account_id = b.account_id AND b.account_id=:id;";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $appointments = null;
            if ($stmt->execute() > 0) {
                while ($appointment = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingAppointment = new Appointment(
                        $appointment["appointment_title"],
                        $appointment["appointment_type"],
                        $appointment["account_id"],
                        $appointment["fname"] . " " . $appointment["lname"],
                        $appointment["appointment_description"],
                        new DateTime($appointment["appointment_start"]),
                        new DateTime($appointment["appointment_end"]),
                    );
                    $existingAppointment->setId($appointment["appointment_id"]);

                    $appointments[$appointment["appointment_id"]] = $existingAppointment;
                }
            }
            return $appointments;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function deleteById(string $id): mixed
    {
        try {
            $sql = "DELETE FROM ohana_appointments
                    WHERE appointment_id=:id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            return $stmt->execute() > 0;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function searchById(string $id): mixed
    {
        try {
            $sql = "SELECT 
                        a.appointment_id, 
                        a.appointment_title, 
                        a.appointment_type, 
                        a.appointment_description, 
                        b.account_id, 
                        b.fname, 
                        b.lname, 
                        a.appointment_start, 
                        a.appointment_end 
                    FROM ohana_appointments a, ohana_account b 
                    WHERE a.account_id = b.account_id AND appointment_id=:id;";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $searchedAppointment = null;
            if ($stmt->execute() > 0) {
                while ($appointment = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedAppointment = new Appointment(
                        $appointment["appointment_title"],
                        $appointment["appointment_type"],
                        $appointment["account_id"],
                        $appointment["fname"] . " " . $appointment["lname"],
                        $appointment["appointment_description"],
                        new DateTime($appointment["appointment_start"]),
                        new DateTime($appointment["appointment_end"]),
                    );
                    $searchedAppointment->setId($appointment["appointment_id"]);
                }
            }
            return $searchedAppointment;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function updateAppointment(Appointment $appointment): bool
    {
        try {
            $sql = "UPDATE ohana_appointments
                    SET appointment_title=:title, appointment_description=:description, appointment_start=:startDate, appointment_end=:endDate
                    WHERE appointment_id=:id;";

            $id = $appointment->getId();
            $title = $appointment->getTitle();
            $description = $appointment->getDescription();
            $startDate = $appointment->getStartDate()->format("Y-m-d H:i:s");
            $endDate = $appointment->getEndDate()->format("Y-m-d H:i:s");

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":title", $title, PDO::PARAM_STR);
            $stmt->bindParam(":description", $description, PDO::PARAM_STR);
            $stmt->bindParam(":startDate", $startDate, PDO::PARAM_STR);
            $stmt->bindParam(":endDate", $endDate, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            return $stmt->execute() > 0;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }
}
