<?php

namespace Oenstrom\Comment\HTMLForm;

use \Anax\HTMLForm\FormModel;
use \Anax\DI\DIInterface;
use \Oenstrom\Comment\Comment;
use \Oenstrom\User\User;

/**
 * Form to create an item.
 */
class EditCommentForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param Anax\DI\DIInterface $di a service container
     */
    public function __construct(DIInterface $di, $comment)
    {
        parent::__construct($di);
        $this->comment = $comment;
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
                    "value" => $this->comment->content,
                    "type" => "textarea",
                    "validation" => ["not_empty"],
                ],

                "submit" => [
                    "class" => "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent",
                    "type" => "submit",
                    "value" => "Redigera",
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
        $commentText = $this->form->value("comment");
        $this->comment->content = $commentText;
        $this->comment->save();
        $this->form->addOutput("Kommentaren har uppdaterats.", "success");
        $this->di->get("response")->redirect("comments/edit/{$this->comment->id}");
    }
}
