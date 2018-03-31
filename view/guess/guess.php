<?php

namespace Aurora\Guess;

?>
<div class="w-100">
    <nav class="navbar justify-content-around navbar-expand-lg navbar-light bg-light border border-top-0 mb-4">
        <a href="#" class="navbar-brand font-weight-bold">Guess my number</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="get" class="nav-link text-dark">Get</a>
        <a href="post" class="nav-link text-dark">Post</a>
        <a href="session" class="nav-link text-dark">Session</a>
    </nav>
    <div class="d-flex justify-content-center">
        <div class="form-group w-50">
            <h1 class="text-center mb-4"><?= $title ?></h1>
            <?php if ($gussed) : ?>
                <?php if ($guess->makeGuess($yourGuess)) : ?>
                    <h2>You guessed right with the number <?= $yourGuess ?> with <?= $guess->tries() ?> guesses remaining.</h2>
                <?php else : ?>
                    <h2>You have <?= $guess->tries() ?> gusses left.</h2>
                    <form action="<?= $url ?>" method="<?= $method ?>">
                        <input type="hidden" name="number" value="<?= $guess->number() ?>">
                        <input type="hidden" name="tries" value="<?= $guess->tries() ?>">
                        <input type="number" name="guess" placeholder="Enter your guess here!" class="form-control my-2">
                        <input type="submit" value="Guess!" <?= $guess->tries() == 0 ? "disabled" : null ?> class="form-control my-2">
                    </form>
                <?php endif; ?>
            <?php else : ?>
                <form action="<?= $url ?>" method="<?= $method ?>">
                    <input type="hidden" name="number" value="<?= $guess->number() ?>">
                    <input type="hidden" name="tries" value="<?= $guess->tries() ?>">
                    <input type="number" name="guess" placeholder="Enter your guess here!" class="form-control my-2">
                    <input type="submit" value="Guess!" <?= $guess->tries() == 0 ? "disabled" : null ?> class="form-control my-2">
                </form>
            <?php endif; ?>
            <form action="<?= $url ?>">
                <input type="hidden" name="reset" value="true">
                <input type="submit" value="Restart" class="form-control my-2">
            </form>
            <button type="button" name="button" onclick="showNumber()" class="form-control my-2">Cheat</button>
            <p id="secretNumber" style="display: none"><?= $guess->number() ?></p>
        </div>
    </div>
</div>
<script type="text/javascript">
    showNumber = () => {
        let number = document.getElementById("secretNumber");
        number.style.display = "block";
    }
</script>
