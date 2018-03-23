<?php

namespace Anax\View;

/**
 * A layout rendering views in defined regions.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?= $title ?? "No title" ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if (isset($favicon)) : ?>
        <link rel="icon" href="<?= $favicon ?>">
    <?php endif; ?>

    <?php foreach ($stylesheets as $stylesheet) : ?>
        <link rel="stylesheet" type="text/css" href="<?= asset($stylesheet) ?>">
    <?php endforeach; ?>

    </head>
    <body>

    <!-- header -->
    <?php if (regionHasContent("header")) : ?>
        <?php renderRegion("header") ?>
    <?php endif; ?>

    <!-- navbar -->
    <?php if (regionHasContent("navbar")) : ?>
        <?php renderRegion("navbar") ?>
    <?php endif; ?>

    <!-- main -->
    <?php if (regionHasContent("main")) : ?>
        <div class="main-wrap">
            <div class="d-flex justify-content-center">
                <main class="d-flex w-75">
                    <?php renderRegion("main") ?>
                </main>
            </div>
        </div>
    <?php endif; ?>

    <!-- footer -->
    <?php if (regionHasContent("footer")) : ?>
        <div class="footer">
            <div class="d-flex justify-content-around bg-light border border-bottom-0 border-left-0 border-right-0 py-4">
                <?php renderRegion("footer") ?>
            </div>
        </div>
    <?php endif; ?>

    <?php foreach ($javascripts as $javascript) : ?>
    <script async src="<?= asset($javascript) ?>"></script>
    <?php endforeach; ?>

    </body>
</html>
