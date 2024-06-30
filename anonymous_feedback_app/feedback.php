<?php
// feedback.php

// Include necessary classes and header
include_once('includes/header.php');
include_once('classes/User.php');
include_once('classes/Feedback.php');

// Initialize User and Feedback classes
$user = new User();
$feedback = new Feedback();

// Check if feedback form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process feedback submission
    $feedback_result = $feedback->submitFeedback($user->getUserId(), $_POST['feedback']);
    if ($feedback_result === true) {
        // Redirect to feedback success page
        header('Location: feedback-success.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Feedback - Anonymous Feedback App</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <?php include_once('includes/header.php'); ?>
    </header>

    <main class="">
        <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
            <img src="./images/beams.jpg" alt="" class="absolute top-1/2 left-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" width="1308" />
            <div class="absolute inset-0 bg-[url(./images/grid.svg)] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>
            <div class="relative bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
                <div class="mx-auto max-w-xl">
                    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                        <div class="mx-auto w-full max-w-xl text-center">
                            <h1 class="block text-center font-bold text-2xl bg-gradient-to-r from-blue-600 via-green-500 to-indigo-400 inline-block text-transparent bg-clip-text">TruthWhisper</h1>
                            <h3 class="text-gray-500 my-2">Want to ask something or share a feedback to <?php echo $user->getUsername(); ?>?</h3>
                        </div>

                        <div class="mt-10 mx-auto w-full max-w-xl">
                            <form class="space-y-6" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div>
                                    <label for="feedback" class="block text-sm font-medium leading-6 text-gray-900">Don't hesitate, just do it!</label>
                                    <div class="mt-2">
                                        <textarea required name="feedback" id="feedback" cols="30" rows="10" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
