<?php
// classes/Feedback.php

class Feedback {
    private $feedbacksDir = 'data/feedbacks/';

    // Constructor
    public function __construct() {
        // Ensure the feedbacks directory exists, create if it doesn't
        if (!file_exists($this->feedbacksDir)) {
            mkdir($this->feedbacksDir, 0777, true);
        }
    }

    // Submit feedback
    public function submitFeedback($user_id, $feedback) {
        // Generate unique filename for feedback
        $feedback_filename = uniqid('feedback_') . '.json';
        $feedback_data = array('user_id' => $user_id, 'feedback' => $feedback);

        // Save feedback data to JSON file
        $feedback_file = $this->feedbacksDir . $feedback_filename;
        $result = file_put_contents($feedback_file, json_encode($feedback_data, JSON_PRETTY_PRINT));

        return $result !== false;
    }

    // Get user's feedbacks
    public function getUserFeedbacks($user_id) {
        $user_feedbacks = [];
        $feedback_files = glob($this->feedbacksDir . '*.json');
        
        foreach ($feedback_files as $file) {
            $feedback_data = json_decode(file_get_contents($file), true);
            if ($feedback_data && $feedback_data['user_id'] === $user_id) {
                $user_feedbacks[] = $feedback_data;
            }
        }

        return $user_feedbacks;
    }
}
?>
