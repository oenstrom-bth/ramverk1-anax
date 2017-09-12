<?php
/**
 * Routes for the comments.
 */
return [
    "routes" => [
        [
            "info" => "Start the session and initiate the REM Server.",
            "requestMethod" => null,
            "path" => "**",
            "callable" => ["commentController", "start"]
        ],
        [
            "info" => "awdawd",
            "requestMethod" => "get",
            "path" => "",
            "callable" => ["commentController", "getComments"]
        ],
        [
            "info" => "awdawd",
            "requestMethod" => "get",
            "path" => "edit/{id:digit}",
            "callable" => ["commentController", "getComment"]
        ],
        [
            "info" => "awdawd",
            "requestMethod" => "post",
            "path" => "add",
            "callable" => ["commentController", "postComment"]
        ],
        [
            "info" => "awdad",
            "requestMethod" => "post",
            "path" => "update/{id:digit}",
            "callable" => ["commentController", "updateComment"]
        ],
        [
            "info" => "awdawd",
            "requestMethod" => "get",
            "path" => "delete/{id:digit}",
            "callable" => ["commentController", "deleteComment"]
        ],
    ]
];



// $app->router->add("comments/**", [$app->commentController, "start"]);
//
// $app->router->add("comments", function () use ($app) {
//     $app->renderPage([
//         "title" => "Kommentarer",
//         "views" => [
//             ["comment/comments", ["comments" => $app->commentController->getComments()]],
//             ["comment/comment-post", []]
//         ]
//     ]);
// });
//
// $app->router->add("comments/edit/{id:digit}", function ($id) use ($app) {
//     $app->renderPage([
//         "title" => "Redigera kommentar",
//         "views" => [
//             ["comment/comment-edit", ["comment" => $app->commentController->getComment($id)]]
//         ]
//     ]);
// });
// $app->router->post("comments/add", [$app->commentController, "postComment"]);
// $app->router->post("comments/update/{id:digit}", [$app->commentController, "updateComment"]);
// $app->router->get("comments/delete/{id:digit}", [$app->commentController, "deleteComment"]);
