<?php
/**
 * Routes for user.
 */
return [
    "routes" => [
        [
            "info" => "Protect upcoming routes from unauthorized users.",
            "requestMethod" => "get|post",
            "path" => "**",
            "callable" => ["authHelper", "adminOnly"]
        ],
        [
            "info" => "Display all users",
            "requestMethod" => "get",
            "path" => "users",
            "callable" => ["adminController", "getUsers"],
        ],
        [
            "info" => "Create a new user.",
            "requestMethod" => "get|post",
            "path" => "users/add",
            "callable" => ["adminController", "getPostNewUser"],
        ],
        [
            "info" => "Update an user.",
            "requestMethod" => "get|post",
            "path" => "users/update/{id:digit}",
            "callable" => ["adminController", "getPostEditUser"]
        ],
        [
            "info" => "Delete an user.",
            "requestMethod" => "get",
            "path" => "users/delete/{id:digit}",
            "callable" => ["adminController", "getDeleteUser"]
        ],
    ]
];
