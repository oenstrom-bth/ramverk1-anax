<?php

namespace Oenstrom\User;

// use \Anax\Configure\ConfigureInterface;
// use \Anax\Configure\ConfigureTrait;
use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;
use \Oenstrom\User\User;

/**
 * A User controller class.
 */
class AuthHelper implements
    InjectionAwareInterface
    // ConfigureInterface,
{
    // use ConfigureTrait;
    use InjectionAwareTrait;



    /**
     * Get the logged in user.
     *
     * @return User|boolean User object if logged in, else false
     */
    public function getLoggedInUser()
    {
        $session = $this->di->get("session");
        $user    = new User();
        $user->setDb($this->di->get("db"));
        return $user->find("username", $session->get("username"));
    }



    /**
     * Check if the user is logged in or not.
     *
     * @return boolean true if logged in, else false
     */
    public function isLoggedIn()
    {
        if ($this->getLoggedInUser()) {
            return true;
        }
        return false;
    }



    /**
     * Redirects the user if he/she is not logged in.
     */
    public function authenticatedOnly()
    {
        if (!$this->isLoggedIn()) {
            $this->di->get("response")->redirect("user/login");
        }
    }



    /**
     * Check if the user is an admin.
     *
     * @return boolean true if user is an admin, else false
     */
    public function isAdmin()
    {
        $user = $this->getLoggedInUser();

        if ($user->role === "admin") {
            return true;
        }
        return false;
    }



    /**
     * Redirects the user if he/she is not an admin.
     */
    public function adminOnly()
    {
        $this->authenticatedOnly();

        if (!$this->isAdmin()) {
            $this->di->get("response")->redirect("user/profile");
        }
    }
}
