<?php
require_once dirname(__DIR__) . "/models/Log.php";
class LogDAO
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

    public function getAllLogs(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_logs;";

            $stmt = $this->conn->query($sql);
            $logs = null;
            if ($stmt->execute() > 0) {
                while ($log = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingLog = new Log($log["log"], new DateTime($log["date"]));
                    $existingLog->setId($log["log_id"]);

                    $logs[] = $existingLog;
                }
            }
            $this->closeConnection();
            return $logs;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function addLog(string $log): bool
    {
        try {
            $this->openConnection();
            $sql = "INSERT INTO ohana_logs
                    (log, date)
                    VALUES (:log, NOW());";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":log", $log, PDO::PARAM_STR);

            $isAdded = $stmt->execute() > 0;
            $this->closeConnection();
            return $isAdded;
        } catch (Exception $e) {
            echo $e;
            return false;
        }
    }
}
