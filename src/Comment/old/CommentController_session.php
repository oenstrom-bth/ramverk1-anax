<?php

namespace Oenstrom\Comment;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * A controller for the comments.
 */
class CommentController implements InjectionAwareInterface
{
    use InjectionAwareTrait;



    /**
     * Get all the comments.
     *
     * @return array as the comments.
     */
    public function getComments()
    {
        $content = $this->di->get("comment")->getComments();
        foreach ($content as &$comment) {
            $comment["text"] = $this->di->get("textfilter")->parse($comment["text"], ["markdown"])->text;
        }
        $this->di->get("view")->add("comment/comments", ["comments" => $content]);
        $this->di->get("view")->add("comment/comment-post");
        $this->di->get("pageRender")->renderPage(["title" => "Kommentarer"]);
        //return $content;
    }



    /**
     * Get a specific comment.
     *
     * @param int $id the id of the comment.
     * @return array as the comment.
     */
    public function getComment($id)
    {
        $comment = $this->di->get("comment")->getComment($id);
        if (empty($comment)) {
            return null;//$this->di->redirect("comments");
        }
        $this->di->get("view")->add("comment/comment-edit", ["comment" => $comment]);
        $this->di->get("pageRender")->renderPage(["title" => "Redigera kommentar"]);
        // return $comment;
    }



    /**
     * Post a new comment.
     */
    public function postComment()
    {
        $email = $this->di->get("request")->getPost("email");
        $comment = $this->di->get("request")->getPost("comment");
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->di->get("comment")->postComment($email, $comment);
        }
        $this->di->get("response")->redirect($this->di->get("url")->create("comments"));
    }



    /**
     * Update an existing comment.
     *
     * @param int $id the id of the comment.
     */
    public function updateComment($id)
    {
        $email = $this->di->get("request")->getPost("email");
        $comment = $this->di->get("request")->getPost("comment");
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->di->get("response")->redirect($this->di->get("url")->create("comments/edit/$id"));
        }
        $this->di->get("comment")->updateComment($id, $email, $comment);
        $this->di->get("response")->redirect($this->di->get("url")->create("comments"));
        //$this->response->redirect($this->url->create($url));
        //$this->app->redirect("comments");
    }



    /**
     * Delete a comment.
     *
     * @param int $id the id of the comment.
     */
    public function deleteComment($id)
    {
        $this->di->get("comment")->deleteComment($id);
        $this->di->get("response")->redirect($this->di->get("url")->create("comments"));
    }
}
