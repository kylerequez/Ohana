<?php
require_once dirname(__DIR__) . "/models/Feedback.php";
class FeedbackDAO
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

    public function getTotalFeedback(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT COUNT(*) FROM ohana_feedbacks;";

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

    public function getAllFeedbacks(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_feedbacks a JOIN ohana_account b
                    WHERE a.account_id = b.account_id;";
            $stmt = $this->conn->query($sql);
            $feedbacks = null;
            if ($stmt->execute() > 0) {
                while ($feedback = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $searchedFeedback = new Feedback($feedback['account_id'], $feedback['feedback_rating'], $feedback['feedback_message']);
                    $searchedFeedback->setAccount(new Account($feedback['account_type'], $feedback['fname'], $feedback['mname'], $feedback['lname'], $feedback['number'], $feedback['email'], $feedback['status'], $feedback['password']));
                    $searchedFeedback->setDate(new DateTime($feedback['feedback_date']));
                    $searchedFeedback->setId($feedback['feedback_id']);

                    $feedbacks[] = $searchedFeedback;
                }
            }
            $this->closeConnection();
            return $feedbacks;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function addFeedback(Feedback $feedback): bool
    {
        try {
            $this->openConnection();
            $sql = "INSERT INTO ohana_feedbacks
                    (feedback_rating, feedback_message, account_id)
                    VALUES (:rating, :message, :accountId)";

            $rating = $feedback->getRating();
            $message = $feedback->getMessage();
            $accountId = $feedback->getAccountId();

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":rating", $rating, PDO::PARAM_INT);
            $stmt->bindParam(":message", $message, PDO::PARAM_STR);
            $stmt->bindParam(":accountId", $accountId, PDO::PARAM_INT);

            $isAdded = $stmt->execute() > 0;
            $this->closeConnection();
            return $isAdded;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }
}
