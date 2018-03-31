<?php

include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

if (isset($_GET["number"])) {
    $gussed = true;
    $secretNumber = $_GET["number"];
    $tries = $_GET["tries"];
    $yourGuess = $_GET["guess"];

    $guess = new Guess($secretNumber, $tries);
} else {
    $guess = new Guess();
    $gussed = false;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Guess my number | oophp</title>
        <link rel="stylesheet" href="css/stylesheet.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar justify-content-around navbar-expand-lg navbar-light bg-light border border-right-0 border-left-0 border-top-0 mb-4">
            <a href="#" class="navbar-brand font-weight-bold">kmom01</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="index_get.php" class="nav-link text-dark">Get</a>
            <a href="index_post.php" class="nav-link text-dark">Post</a>
            <a href="index_session.php" class="nav-link text-dark">Session</a>
        </nav>
        <div class="d-flex justify-content-center">
            <div class="form-group w-50">
                <h1 class="text-center">Guess the number! (Get)</h1>
                <?php if ($gussed) : ?>
                    <?php if ($guess->makeGuess($yourGuess)) : ?>
                        <h1>You guessed right with the number <?= $yourGuess ?> with <?= $guess->tries() ?> guesses remaining.</h1>
                    <?php else : ?>
                        <h2>You have <?= $guess->tries() ?> gusses left.</h2>
                        <form action="index_get.php" method="GET">
                            <input type="hidden" name="number" value="<?= $guess->number() ?>">
                            <input type="hidden" name="tries" value="<?= $guess->tries() ?>">
                            <input type="number" name="guess" placeholder="Enter your guess here!" class="form-control my-2">
                            <input type="submit" value="Guess!" <?= $guess->tries() == 0 ? "disabled" : null ?> class="form-control my-2">
                        </form>
                    <?php endif; ?>
                <?php else : ?>
                    <form action="index_get.php" method="GET">
                        <input type="hidden" name="number" value="<?= $guess->number() ?>">
                        <input type="hidden" name="tries" value="<?= $guess->tries() ?>">
                        <input type="number" name="guess" placeholder="Enter your guess here!" class="form-control my-2">
                        <input type="submit" value="Guess!" <?= $guess->tries() == 0 ? "disabled" : null ?> class="form-control my-2">
                    </form>
                <?php endif; ?>
                <form action="index_get.php">
                    <input type="hidden" name="reset" value="true">
                    <input type="submit" value="Restart" class="form-control my-2">
                </form>
                <button type="button" name="button" onclick="showNumber()" class="form-control my-2">Cheat</button>
                <p id="secretNumber" style="display: none"><?= $guess->number() ?></p>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        showNumber = () => {
            let number = document.getElementById("secretNumber");
            number.style.display = "block";
        }
    </script>
</html>
