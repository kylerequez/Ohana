<?php
require_once dirname(__DIR__) . "/models/Config.php";
class ConfigDAO
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
    public function getDomainName(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_config
                    WHERE config_name='DOMAIN_NAME';";
            $stmt = $this->conn->query($sql);
            $searchedConfig = null;
            if ($stmt->execute() > 0) {
                while ($config = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedConfig = new Config($config['config_name'], $config['config_information']);
                }
            }
            return $searchedConfig;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getEmail(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_config
                    WHERE config_name='EMAIL_USERNAME';";
            $stmt = $this->conn->query($sql);
            $searchedConfig = null;
            if ($stmt->execute() > 0) {
                while ($config = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedConfig = new Config($config['config_name'], $config['config_information']);
                }
            }
            return $searchedConfig;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getEmailKey(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_config
                    WHERE config_name='EMAIL_KEY';";
            $stmt = $this->conn->query($sql);
            $searchedConfig = null;
            if ($stmt->execute() > 0) {
                while ($config = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedConfig = new Config($config['config_name'], $config['config_information']);
                }
            }
            return $searchedConfig;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
    public function getSemaphoreApiKey(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_config
                    WHERE config_name='SEMAPHORE_API_KEY';";
            $stmt = $this->conn->query($sql);
            $searchedConfig = null;
            if ($stmt->execute() > 0) {
                while ($config = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedConfig = new Config($config['config_name'], $config['config_information']);
                }
            }
            return $searchedConfig;
        } catch (Exception $e) {
            return null;
        } finally {
            $this->closeConnection();
        }
    }
}
