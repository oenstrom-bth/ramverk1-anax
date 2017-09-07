<?php
/**
 * Routes for the comments.
 */

//$app->router->get("comments", [$app->commentController, "getComments"]);

$app->router->add("comments/**", [$app->commentController, "start"]);

$app->router->add("comments", function () use ($app) {
    $app->renderPage([
        "title" => "Kommentarer",
        "views" => [
            ["comment/comments", ["comments" => $app->commentController->getComments()]],
            ["comment/comment-post", []]
        ]
    ]);
});

$app->router->add("comments/edit/{id:digit}", function ($id) use ($app) {
    $app->renderPage([
        "title" => "Redigera kommentar",
        "views" => [
            ["comment/comment-edit", ["comment" => $app->commentController->getComment($id)]]
        ]
    ]);
});
$app->router->post("comments/add", [$app->commentController, "postComment"]);
$app->router->post("comments/update/{id:digit}", [$app->commentController, "updateComment"]);
$app->router->get("comments/delete/{id:digit}", [$app->commentController, "deleteComment"]);
