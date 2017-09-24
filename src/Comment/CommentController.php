<?php

namespace Oenstrom\Comment;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;
use \Oenstrom\Comment\HTMLForm\CreateCommentForm;
use \Oenstrom\Comment\HTMLForm\EditCommentForm;

/**
 * A controller class.
 */
class CommentController implements
    ConfigureInterface,
    InjectionAwareInterface
{
    use ConfigureTrait, InjectionAwareTrait;



    /**
     * @var $data description
     */
    //private $data;



    /**
     * Show all comments and comment form.
     *
     * @return void
     */
    public function getComments()
    {
        $title       = "Alla kommentarer";
        $view        = $this->di->get("view");
        $pageRender  = $this->di->get("pageRender");
        $auth        = $this->di->get("authHelper");
        $comment     = new Comment();
        $form        = new CreateCommentForm($this->di);

        $comment->setDb($this->di->get("db"));
        $comment->setTextfilter($this->di->get("textfilter"));
        $form->check();

        $view->add("comment/show-comments", [
            "comments" => $comment->getAllAsMarkdown($this->di->get("db")),
            "user" => $auth->getLoggedInUser(),
        ]);
        $view->add("comment/comment-post", [
            "isLoggedIn" => $auth->isLoggedIn(),
            "form" => $form->getHTML(["use_buttonbar" => false])
        ]);
        $pageRender->renderPage(["title" => $title]);
    }



    /**
     * Handler with form to delete an item.
     *
     * @return void
     */
    public function getPostEditComment($id)
    {
        $title      = "Redigera kommentar";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $user       = $this->di->get("authHelper")->getLoggedInUser();
        $comment    = new Comment();
        $comment->setDb($this->di->get("db"));
        $comment->find("id", $id);

        if ($comment->userId === $user->id || $user->isAdmin()) {
            $form = new EditCommentForm($this->di, $comment);
            $form->check();

            $view->add("comment/comment-edit", ["form" => $form->getHTML(["use_buttonbar" => false])]);
            $pageRender->renderPage(["title" => $title]);
        } else {
            $this->di->get("response")->redirect("comments");
        }
    }



    /**
     * Delete a comment.
     *
     * @return void
     */
    public function getDeleteComment($id)
    {
        $auth    = $this->di->get("authHelper");
        $user    = $auth->getLoggedInUser();
        $comment = new Comment();
        $comment->setDb($this->di->get("db"));

        $comment->find("id", $id);

        if ($comment->userId === $user->id || $auth->isAdmin()) {
            $comment->delete();
        }

        $this->di->get("response")->redirect("comments");
    }
}
