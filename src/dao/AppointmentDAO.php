<?php
require_once dirname(__DIR__) . "/models/Appointment.php";
class AppointmentDAO
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

    public function getScheduledAppointments(string $date): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT 
                        a.appointment_id, 
                        a.appointment_title, 
                        a.appointment_type, 
                        a.appointment_description, 
                        b.account_id, 
                        b.fname, 
                        b.lname,
                        b.number, 
                        a.appointment_start, 
                        a.appointment_end,
                        a.appointment_status
                    FROM ohana_appointments a, ohana_account b
                    WHERE 
                    DATEDIFF(a.appointment_start, :current_date) = 2
                    AND a.appointment_status = 'PENDING'
                    AND a.account_id = b.account_id;";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":current_date", $date, PDO::PARAM_STR);

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
                    $existingAppointment->setStatus($appointment["appointment_status"]);
                    $existingAppointment->setNumber($appointment["number"]);
                    $existingAppointment->setId($appointment["appointment_id"]);

                    $appointments[$appointment["appointment_id"]] = $existingAppointment;
                }
            }
            $this->closeConnection();
            return $appointments;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getAllAppointments(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT 
                        a.appointment_id, 
                        a.appointment_title, 
                        a.appointment_type, 
                        a.appointment_description, 
                        b.account_id, 
                        b.fname, 
                        b.lname,
                        b.number,
                        a.appointment_start, 
                        a.appointment_end,
                        a.appointment_status
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
                    $existingAppointment->setStatus($appointment["appointment_status"]);
                    $existingAppointment->setNumber($appointment["number"]);
                    $existingAppointment->setId($appointment["appointment_id"]);

                    $appointments[$appointment["appointment_id"]] = $existingAppointment;
                }
            }
            $this->closeConnection();
            return $appointments;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getAppointmentsCount(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT COUNT(*) FROM ohana_appointments;";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchColumn();
            $this->closeConnection();
            return $result;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getAppointmentsByAccountId(int $id): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT 
                        a.appointment_id, 
                        a.appointment_title, 
                        a.appointment_type, 
                        a.appointment_description, 
                        b.account_id, 
                        b.fname, 
                        b.lname,
                        b.number, 
                        a.appointment_start, 
                        a.appointment_end,
                        a.appointment_status
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
                    $existingAppointment->setStatus($appointment["appointment_status"]);
                    $existingAppointment->setNumber($appointment["number"]);
                    $existingAppointment->setId($appointment["appointment_id"]);

                    $appointments[$appointment["appointment_id"]] = $existingAppointment;
                }
            }
            $this->closeConnection();
            return $appointments;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function addAppointment(Appointment $appointment): bool
    {
        try {
            $this->openConnection();
            $sql = "INSERT INTO ohana_appointments
                    (appointment_type, account_id, appointment_title, appointment_description, appointment_start, appointment_end)
                    VALUES (:type, :id, :title, :description, :start, :end);";

            $type = $appointment->getType();
            $accountId = $appointment->getAccountId();
            $title = $appointment->getTitle();
            $description = $appointment->getDescription();
            $start = $appointment->getStartDate()->format('Y-m-d H:i:s');
            $end = $appointment->getEndDate()->format('Y-m-d H:i:s');

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":type", $type, PDO::PARAM_STR);
            $stmt->bindParam(":id", $accountId, PDO::PARAM_INT);
            $stmt->bindParam(":title", $title, PDO::PARAM_STR);
            $stmt->bindParam(":description", $description, PDO::PARAM_STR);
            $stmt->bindParam(":start", $start, PDO::PARAM_STR);
            $stmt->bindParam(":end", $end, PDO::PARAM_STR);

            $isAdded = $stmt->execute() > 0;
            $this->closeConnection();
            return $isAdded;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function deleteById(string $id): mixed
    {
        try {
            $this->openConnection();
            $sql = "DELETE FROM ohana_appointments
                    WHERE appointment_id=:id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $isDeleted = $stmt->execute() > 0;
            $this->closeConnection();
            return $isDeleted;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function searchById(string $id): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT 
                        a.appointment_id, 
                        a.appointment_title, 
                        a.appointment_type, 
                        a.appointment_description, 
                        b.account_id, 
                        b.fname, 
                        b.lname,
                        b.number, 
                        a.appointment_start, 
                        a.appointment_end,
                        a.appointment_status
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
                    $searchedAppointment->setStatus($appointment["appointment_status"]);
                    $searchedAppointment->setNumber($appointment["number"]);
                    $searchedAppointment->setId($appointment["appointment_id"]);
                }
            }
            $this->closeConnection();
            return $searchedAppointment;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function updateAppointment(Appointment $appointment): bool
    {
        try {
            $this->openConnection();
            $sql = "UPDATE ohana_appointments
                    SET appointment_title=:title,appointment_description=:description, appointment_start=:startDate, appointment_end=:endDate, appointment_status=:status
                    WHERE appointment_id=:id;";

            $id = $appointment->getId();
            $title = $appointment->getTitle();
            $description = $appointment->getDescription();
            $startDate = $appointment->getStartDate()->format("Y-m-d H:i:s");
            $endDate = $appointment->getEndDate()->format("Y-m-d H:i:s");
            $status = $appointment->getStatus();

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":title", $title, PDO::PARAM_STR);
            $stmt->bindParam(":description", $description, PDO::PARAM_STR);
            $stmt->bindParam(":startDate", $startDate, PDO::PARAM_STR);
            $stmt->bindParam(":endDate", $endDate, PDO::PARAM_STR);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $isUpdated = $stmt->execute() > 0;
            $this->closeConnection();
            return $isUpdated;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }
}
