<?php

namespace Oenstrom\Comment;

use \Anax\Common\AppInjectableInterface;
use \Anax\Common\AppInjectableTrait;

/**
 * A controller for the comments.
 */
class CommentController implements AppInjectableInterface
{
    use AppInjectableTrait;



    /**
     * Start the session.
     */
    public function start()
    {
        $this->app->session->start();
    }



    /**
     * Get all the comments.
     *
     * @return array as the comments.
     */
    public function getComments()
    {
        $content = $this->app->comment->getComments();
        foreach ($content as &$comment) {
            $comment["text"] = $this->app->textfilter->parse($comment["text"], ["markdown"])->text;
        }
        return $content;
    }



    /**
     * Get a specific comment.
     *
     * @param int $id the id of the comment.
     * @return array as the comment.
     */
    public function getComment($id)
    {
        $comment = $this->app->comment->getComment($id);
        if (empty($comment)) {
            $this->app->redirect("comments");
        }
        return $comment;
    }



    /**
     * Post a new comment.
     */
    public function postComment()
    {
        $email = $this->app->request->getPost("email");
        $comment = $this->app->request->getPost("comment");
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->app->comment->postComment($email, $comment);
        }
        $this->app->redirect("comments");
    }



    /**
     * Update an existing comment.
     *
     * @param int $id the id of the comment.
     */
    public function updateComment($id)
    {
        $email = $this->app->request->getPost("email");
        $comment = $this->app->request->getPost("comment");
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->app->comment->updateComment($id, $email, $comment);
        }
        $this->app->redirect("comments");
    }



    /**
     * Delete a comment.
     *
     * @param int $id the id of the comment.
     */
    public function deleteComment($id)
    {
        $this->app->comment->deleteComment($id);
        $this->app->redirect("comments");
    }
}
