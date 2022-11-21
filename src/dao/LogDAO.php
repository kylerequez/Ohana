<?php
require_once dirname(__DIR__) . "/models/Log.php";
class LogDAO
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }

    public function getAllLogs(): mixed
    {
        try {
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
            return $logs;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getLogsPagination(string $limit, string $offset): mixed
    {
        try {
            $sql = "SELECT * FROM ohana_logs
                    LIMIT :limit OFFSET :offset;";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
            $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);

            $logs = null;
            if ($stmt->execute() > 0) {
                while ($log = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingLog = new Log($log["log"], new DateTime($log["date"]));
                    $existingLog->setId($log["log_id"]);
                    $logs[] = $existingLog;
                }
            }
            return $logs;
        } catch (Exception $e) {
            echo $e;
            return false;
        }
    }

    public function getTotalLogCount(): mixed
    {
        try {
            $sql = "SELECT count(*) FROM ohana_logs;";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchColumn();
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function addLog(string $log): bool
    {
        try {
            $sql = "INSERT INTO ohana_logs
                    (log, date)
                    VALUES (:log, NOW());";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":log", $log, PDO::PARAM_STR);

            return $stmt->execute() > 0;
        } catch (Exception $e) {
            echo $e;
            return false;
        }
    }
}
