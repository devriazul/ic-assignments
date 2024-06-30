<?php

// Include necessary classes and header
include_once('includes/header.php');
include_once('classes/User.php');
include_once('classes/Feedback.php');

// Initialize User and Feedback classes
$user = new User();
$feedback = new Feedback();

// Check if user is logged in
if (!$user->isLoggedIn()) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit;
}

// Get user's feedbacks
$user_feedbacks = $feedback->getUserFeedbacks($user->getUserId());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Anonymous Feedback App</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <?php include_once('includes/header.php'); ?>
    </header>

    <main class="">
        <div class="relative flex min-h-screen overflow-hidden bg-gray-50 py-6 sm:py-12">
            <img src="./images/beams.jpg" alt="" class="absolute top-1/2 left-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" width="1308" />
            <div class="absolute inset-0 bg-[url(./images/grid.svg)] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>

            <div class="relative max-w-7xl mx-auto">
                <div class="flex justify-end">
                    <span class="block text-gray-600 font-mono border border-gray-400 rounded-xl px-2 py-1">Your feedback form link: <strong><a href="feedback.php">http://localhost/feedback/sYu24jl</a></strong></span>
                </div>
                <h1 class="text-xl text-indigo-800 text-bold my-10">Received feedback</h1>
                
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <?php foreach ($user_feedbacks as $feedback_item): ?>
                <div class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
                    <div class="focus:outline-none">
                        <p class="text-gray-500"><?php echo $feedback_item['feedback']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
                </div>
                
            </div>

        </div>
    </main>

    <footer>
        <?php include_once('includes/footer.php'); ?>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>

<?php
// Include footer
include_once('includes/footer.php');
?>
