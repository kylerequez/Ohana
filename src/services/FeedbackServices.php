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

    // public function addFeedback(array $data): bool
    // {
    // }
}
