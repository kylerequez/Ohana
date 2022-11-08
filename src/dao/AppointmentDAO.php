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

    public function updateAppointment(Appointment $appointment): bool
    {
        try {
            $sql = "UPDATE ohana_appointments
                    SET title=:title, description=:description, start_datetime=:startDate, end_datetime=:endDate
                    WHERE id=:id;";

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
