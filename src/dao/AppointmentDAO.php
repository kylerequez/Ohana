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
            $sql = "SELECT * FROM schedule_list;";

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
}