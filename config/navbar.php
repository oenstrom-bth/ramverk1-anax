<?php
/**
 * Config file for navbar.
 */
return [
    "config" => [
        "class" => "navbar"
    ],
    "items" => [
        "home" => [
            "text" => "Hem",
            "route" => "",
        ],
        "about" => [
            "text" => "Om",
            "route" => "about",
        ],
        "report" => [
            "text" => "Redovisning",
            "route" => "report",
        ],
        "remserver" => [
            "text" => "REM-Server",
            "route" => "remserver",
        ],
        "comment" => [
            "text" => "Kommentarer",
            "route" => "comments",
        ]
    ],
];
