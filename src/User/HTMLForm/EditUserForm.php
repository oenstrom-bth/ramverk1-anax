<?php

namespace Oenstrom\User\HTMLForm;

use \Anax\HTMLForm\FormModel;
use \Anax\DI\DIInterface;
use \Oenstrom\User\User;

/**
 * Form to update an user.
 */
class EditUserForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param Anax\DI\DIInterface $di a service container
     */
    public function __construct(DIInterface $di, $id)
    {
        parent::__construct($di);
        $this->user = $this->hasItemDetails($id);
        $this->form->create(
            [
                "id" => __CLASS__,
                "legend" => "Redigera användare",
                "use_fieldset" => false,
                "wrapper-element" => "div",
                "br-after-label" => false,
            ],
            [
                "username" => [
                    "label" => "Användarnamn",
                    "label-class" => "mdl-textfield__label",
                    "wrapper-class" => "mdl-textfield mdl-js-textfield mdl-textfield--floating-label",
                    "class" => "mdl-textfield__input",
                    "type" => "text",
                    "value" => $this->user->username,
                    "validation" => ["not_empty"],
                ],
                "email" => [
                    "label" => "E-postadress",
                    "label-class" => "mdl-textfield__label",
                    "wrapper-class" => "mdl-textfield mdl-js-textfield mdl-textfield--floating-label",
                    "class" => "mdl-textfield__input",
                    "type" => "text",
                    "value" => $this->user->email,
                    "validation" => ["email", "not_empty"],
                ],

                "new-password" => [
                    "label" => "Nytt lösenord",
                    "label-class" => "mdl-textfield__label",
                    "wrapper-class" => "mdl-textfield mdl-js-textfield mdl-textfield--floating-label",
                    "class" => "mdl-textfield__input",
                    "type" => "password",
                ],

                "new-password-again" => [
                    "label" => "Nytt lösenord igen",
                    "label-class" => "mdl-textfield__label",
                    "wrapper-class" => "mdl-textfield mdl-js-textfield mdl-textfield--floating-label",
                    "class" => "mdl-textfield__input",
                    "type" => "password",
                    "validation" => ["match" => "new-password"],
                ],

                "submit" => [
                    "class" => "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent",
                    "type" => "submit",
                    "value" => "Uppdatera",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );
    }



    /**
     * Get details on item to load form with.
     *
     * @param integer $id get details on user with id.
     *
     * @return boolean true if okey, false if something went wrong.
     */
    public function hasItemDetails($id)
    {
        $user = new User();
        $user->setDb($this->di->get("db"));
        $user->find("id", $id);
        return $user;
    }



    /**
     * Callback for submit-button which should return true if it could
     * carry out its work and false if something failed.
     *
     * @return boolean true if okey, false if something went wrong.
     */
    public function callbackSubmit()
    {
        $username       = $this->form->value("username");
        $email          = $this->form->value("email");
        $password       = $this->form->value("new-password");
        $isOldEmail     = $this->user->email === $email;
        $isOldUsername  = $this->user->username === $username;

        $user = new User();
        $user->setDb($this->di->get("db"));

        if (!$isOldUsername && $user->usernameExists($username)) {
            $this->form->addOutput("Användarnamnet är upptaget.", "error");
            $this->di->get("response")->redirect("admin/users/update/{$this->user->id}");
            return false;
        }

        if (!$isOldEmail && $user->emailExists($email)) {
            $this->form->addOutput("E-postadressen är upptagen.", "error");
            $this->di->get("response")->redirect("admin/users/update/{$this->user->id}");
            return false;
        }

        if ($password != "") {
            $this->user->setPassword($password);
        }
        $this->user->username = $username;
        $this->user->email = $email;
        $this->user->save();
        $this->form->addOutput("Användaren har uppdaterats.", "success");
        $this->di->get("response")->redirect("admin/users/update/{$this->user->id}");
    }
}
