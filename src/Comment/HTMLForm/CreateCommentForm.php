<?php

namespace Oenstrom\Comment\HTMLForm;

use \Anax\HTMLForm\FormModel;
use \Anax\DI\DIInterface;
use \Oenstrom\Comment\Comment;

/**
 * Form to create an item.
 */
class CreateCommentForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param Anax\DI\DIInterface $di a service container
     */
    public function __construct(DIInterface $di)
    {
        parent::__construct($di);
        $this->form->create(
            [
                "id" => __CLASS__,
                "legend" => "Ny kommentar",
                "use_fieldset" => false,
                "wrapper-element" => "div",
                "br-after-label" => false,
            ],
            [
                "comment" => [
                    "label" => "Kommentar",
                    "label-class" => "mdl-textfield__label",
                    "wrapper-class" => "mdl-textfield mdl-js-textfield",
                    "class" => "mdl-textfield__input",
                    "type" => "textarea",
                    "validation" => ["not_empty"],
                ],

                "submit" => [
                    "class" => "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent",
                    "type" => "submit",
                    "value" => "Kommentera",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );
    }



    /**
     * Callback for submit-button which should return true if it could
     * carry out its work and false if something failed.
     *
     * @return boolean true if okey, false if something went wrong.
     */
    public function callbackSubmit()
    {
        $comment     = new Comment();
        $commentText = $this->form->value("comment");
        $user        = $this->di->get("authHelper")->getLoggedInUser();

        $comment->setDb($this->di->get("db"));
        $comment->userId = $user->id;
        $comment->content = $commentText;

        $comment->save();
        $this->form->addOutput("Kommentaren har lagts till.", "success");
        $this->di->get("response")->redirect("comments");
    }
}
