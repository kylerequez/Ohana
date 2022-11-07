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
            $sql = "SELECT * FROM ohana_appointments;";

            $stmt = $this->conn->query($sql);
            $appointments = null;
            if ($stmt->execute() > 0) {
                while ($appointment = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingAppointment = new Appointment(
                        $appointment["title"],
                        null,
                        null,
                        $appointment["description"],
                        new DateTime($appointment["start_datetime"]),
                        new DateTime($appointment["end_datetime"])
                    );
                    $existingAppointment->setId($appointment["id"]);

                    $appointments[$appointment["id"]] = $existingAppointment;
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
                    WHERE id=:id";

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
            $sql = "SELECT * FROM ohana_appointments
                    WHERE id=:id
                    LIMIT 1;";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $searchedAppointment = null;
            if ($stmt->execute() > 0) {
                while ($appointment = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedAppointment = new Appointment(
                        $appointment["title"],
                        null,
                        null,
                        $appointment["description"],
                        new DateTime($appointment["start_datetime"]),
                        new DateTime($appointment["end_datetime"])
                    );
                    $searchedAppointment->setId($appointment["id"]);
                }
            }
            return $searchedAppointment;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }
}
