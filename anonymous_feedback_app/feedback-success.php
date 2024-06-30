<?php

// Include necessary classes and header
include_once('includes/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Submitted - Anonymous Feedback App</title>
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
                        <h3 class="text-gray-500 my-2">Thanks a lot for your submission!</h3>
                    </div>

                    <div class="mt-10 mx-auto w-full max-w-xl">
                        <img src="./images/success.jpg" alt="">
                    </div>
                    <p class="mt-10 text-center text-sm text-gray-500"><a href="dashboard.php">Back to Dashboard</a></p>
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
