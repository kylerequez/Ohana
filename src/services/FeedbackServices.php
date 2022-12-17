<?php
class FeedbackServices
{
    private ?FeedbackDAO $dao = null;

    public function __construct(FeedbackDAO $dao)
    {
        $this->dao = $dao;
    }

    public function getAllFeedbacks(): mixed
    {
        return $this->dao->getAllFeedbacks();
    }

    public function addFeedback(array $data): bool
    {
        $rating = $data['rating'];
        $message = $data['message'];
        $id = $data['id'];

        $feedback = new Feedback($id, $rating, $message);
        if (!$this->dao->addFeedback($feedback)) {
            $_SESSION['msg'] = "There was an error in adding the feedback. SQL Error.";
            return false;
        }
        $_SESSION['msg'] = "Thank you for your feedback. This means a lot to our Ohana!";
        return true;
    }
}
