<?php
/**
 * Set the error reporting.
 */
error_reporting(-1);              // Report all type of errors
ini_set("display_errors", 1);     // Display all errors



/**
 * Default exception handler.
 */
set_exception_handler(function ($e) {
    echo "Uncaught exception: "
        . get_class($e)
        . "<p>"
        . $e->getMessage()
        . "</p><p>Code: "
        . $e->getCode()
        . "</p><pre>"
        . $e->getTraceAsString()
        . "</pre>";
});
