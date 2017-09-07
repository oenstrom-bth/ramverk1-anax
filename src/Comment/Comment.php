<?php

namespace Oenstrom\Comment;

class Comment
{
    /**
     * Inject dependencies.
     *
     * @param array $dependency key/value array with dependencies.
     *
     * @return self
     */
    public function inject($dependency)
    {
        $this->session = $dependency["session"];
        return $this;
    }



    /**
     * Get all the comments.
     *
     * @return array containing all the comments
     */
    public function getComments()
    {
        return $this->session->get("comments", []);
    }



    /**
     * Get a specific comment.
     *
     * @param int $id the id of the comment
     * @return array containing the comment.
     */
    public function getComment($id)
    {
        $comments = $this->getComments();
        $comment = array_filter($comments, function ($key) use ($id) {
            return $key == $id;
        }, ARRAY_FILTER_USE_KEY);
        $comment = $comment[$id];
        $comment["id"] = $id;
        return $comment;
    }



    /**
     * Post a new comment.
     *
     * @param string the email address
     * @param string the comment content
     */
    public function postComment($email, $comment)
    {
        $comments = $this->getComments();
        array_push($comments, ["email" => $email, "text" => $comment, "gravatar" => $this->getGravatar($email, 97)]);
        $this->session->set("comments", $comments);
    }



    /**
     * Update a specific comment.
     *
     * @param int $id the id of the comment
     * @param string $email the email address
     * @param string $comment the comment content
     */
    public function updateComment($id, $email, $comment)
    {
        $comments = $this->getComments();
        $comments[$id]["email"] = $email;
        $comments[$id]["text"] = $comment;
        $comments[$id]["gravatar"] = $this->getGravatar($email);
        $this->session->set("comments", $comments);
    }



    /**
     * Delete a specific comment.
     *
     * @param int $id the id of the comment.
     */
    public function deleteComment($id)
    {
        $comments = $this->getComments();
        unset($comments[$id]);
        $this->session->set("comments", $comments);
    }



    /**
     * Get a Gravatar URL for a specified email address.
     *
     * @param string $email The email address
     * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @return String containing a URL
     * @source https://gravatar.com/site/implement/images/php/
     */
    public function getGravatar($email, $size = 80)
    {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5(strtolower(trim($email)));
        $url .= "?s=$size&d=mm&r=g";
        return $url;
    }
}
