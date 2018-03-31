<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>
<nav class="navbar justify-content-around navbar-expand-lg navbar-light bg-light border border-right-0 border-left-0 border-top-0">
    <a href="<?= url("") ?>" class="navbar-brand w-25"><img class="w-100" src="http://i.imgur.com/qIp1xEh.gif" alt="name-logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a href="<?= url("") ?>" class="nav-link text-dark">Home</a>
    <a href="<?= url("report") ?>" class="nav-link text-dark">Report</a>
    <a href="<?= url("about") ?>" class="nav-link text-dark">About</a>
    <a href="<?= url("guess/get") ?>" class="nav-link text-dark">Guess</a>
    <a href="<?= url("play") ?>" class="nav-link text-dark">Play</a>
    <a href="<?= url("debug") ?>" class="nav-link text-dark">Debug</a>
</nav>
