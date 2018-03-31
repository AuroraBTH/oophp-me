<?php
/**
 * Guess routes.
 */
return [
    "routes" => [
        [
            "info" => "Guess my number (GET)",
            "requestMethod" => "GET",
            "path" => "get",
            "callable" => ["guessController", "guessGet"]
        ],
        [
            "info" => "Guess my number (POST)",
            "requestMethod" => "GET|POST",
            "path" => "post",
            "callable" => ["guessController", "guessPost"]
        ],
        [
            "info" => "Guess my number (SESSION)",
            "requestMethod" => "GET|POST",
            "path" => "session",
            "callable" => ["guessController", "guessSession"]
        ],
    ]
];
