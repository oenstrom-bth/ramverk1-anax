<?php

namespace Oenstrom\Comment;

use \Anax\Database\ActiveRecordModel;
use \Oenstrom\User\User;

/**
 * A database driven model.
 */
class Comment extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "Comment";



    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $userId;
    public $content;



    /**
     * Set textfilter.
     *
     * @param TextFilter $textfilter as the textfilter object.
     */
    public function setTextfilter($textfilter)
    {
        $this->textfilter = $textfilter;
    }



    /**
     * Get all comments as markdown.
     *
     * @param Database $db the database object to use.
     *
     * @return array as the comments.
     */
    public function getAllAsMarkdown($db)
    {
        $comments = $this->findAll();
        foreach ($comments as $comment) {
            $user = new User();
            $user->setDb($db);
            $user->find("id", $comment->userId);
            $comment->content = $this->textfilter->parse($comment->content, ["clickable", "markdown"])->text;
            $comment->username = $user->username;
            $comment->email = $user->email;
        }
        return $comments;
    }
}
