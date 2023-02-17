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
                    $existingLog = new Log($log["log"], $log["log_account_id"], $log["log_account_type"], new DateTime($log["date"]));
                    $existingLog->setId($log["log_id"]);
                    $logs[] = $existingLog;
                }
            }
            return $logs;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function addLog(int $accountId, string $accountType, string $log): bool
    {
        try {
            $this->openConnection();
            $this->conn->beginTransaction();
            $sql = "INSERT INTO ohana_logs
                    (log_account_id, log_account_type, log, date)
                    VALUES (:accountId, :accountType, :log, :date);";
            date_default_timezone_set('Asia/Manila');
            $now = new DateTime('now');
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":accountId", $accountId, PDO::PARAM_INT);
            $stmt->bindParam(":accountType", $accountType, PDO::PARAM_STR);
            $stmt->bindParam(":log", $log, PDO::PARAM_STR);
            $stmt->bindParam(":date", $now->format('Y-m-d H:i:s'), PDO::PARAM_STR);
            $isAdded = $stmt->execute() > 0;
            $this->conn->commit();
            return $isAdded;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        } finally {
            $this->closeConnection();
        }
    }
}
