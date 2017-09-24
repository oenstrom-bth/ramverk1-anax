<?php
/**
 * Routes for user.
 */
return [
    "routes" => [
        [
            "info" => "Register an user.",
            "requestMethod" => "get|post",
            "path" => "register",
            "callable" => ["userController", "getPostRegister"],
        ],
        [
            "info" => "Login an user.",
            "requestMethod" => "get|post",
            "path" => "login",
            "callable" => ["userController", "getPostLogin"],
        ],
        [
            "info" => "Logout an user.",
            "requestMethod" => "get",
            "path" => "logout",
            "callable" => ["userController", "getLogout"],
        ],


        [
            "info" => "Protect upcoming routes from unauthorized users.",
            "requestMethod" => "get|post",
            "path" => "**",
            "callable" => ["authHelper", "authenticatedOnly"]
        ],
        [
            "info" => "Display and update an user profile.",
            "requestMethod" => "get|post",
            "path" => "profile",
            "callable" => ["userController", "getPostProfile"],
        ],
        // [
        //     "info" => "Create an user.",
        //     "requestMethod" => "get|post",
        //     "path" => "create",
        //     "callable" => ["userController", "getPostCreateUser"],
        // ],
        // [
        //     "info" => "Delete an item.",
        //     "requestMethod" => "get|post",
        //     "path" => "delete",
        //     "callable" => ["userController", "getPostDeleteItem"],
        // ],
        // [
        //     "info" => "Update an item.",
        //     "requestMethod" => "get|post",
        //     "path" => "update/{id:digit}",
        //     "callable" => ["userController", "getPostUpdateItem"],
        // ],
    ]
];
