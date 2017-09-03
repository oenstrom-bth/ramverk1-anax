<?php

namespace Oenstrom\Navbar;

/**
 * Class for creating the navbar.
 */
class Navbar implements \Anax\Common\AppInjectableInterface, \Anax\Common\ConfigureInterface
{
    use \Anax\Common\AppInjectableTrait;
    use \Anax\Common\ConfigureTrait;

    /**
     * @var string         $currentRoute the current route.
     * @var callable       $createUrl the callable for creating url.
     */
    private $currentRoute;
    private $createUrl;


    /**
     * Get the HTML class from the navbar config.
     *
     * @return string as HTML class.
     */
    public function getClass()
    {
        return $this->config["config"]["class"];
    }


    /**
     * Sets the current route.
     *
     * @param string $route the current route.
     *
     * @return void
     */
    public function setCurrentRoute($route)
    {
        $this->currentRoute = $route;
    }


    /**
     * Sets the callable to use for creating routes.
     *
     * @param callable $urlCreate to create framework urls.
     *
     * @return void
     */
    public function setUrlCreator($urlCreate)
    {
        $this->createUrl = $urlCreate;
    }


    /**
     * Get HTML for the navbar.
     *
     * @param $items array The array to generate HTML from.
     *
     * @return string as HTML with the navbar.
     */
    public function getHtml($items = null)
    {
        $items = is_null($items) ? $this->config["items"] : $items;
        $html = "<ul>";
        foreach ($items as $item) {
            $url = call_user_func($this->createUrl, $item["route"]);
            $active = $this->currentRoute === $item["route"] ? ' class="active"' : "";
            $html .= "<li$active>";
            $html .= "<a href='{$url}'>{$item["text"]}</a>";
            if (isset($item["items"])) {
                $html .= $this->getHtml($item["items"]);
            }
            $html .= "</li>";
        }
        $html .= "</ul>";
        return $html;
    }


    /**
     * Create the navbar HTML markup.
     *
     * @return string as navbar in HTML.
     */
    public function createNavbar()
    {
        $class = $this->getClass();
        $html = "<nav class=\"{$class}\">";
        $html .= $this->getHtml();
        $html .= "</nav>";
        return $html;
    }
}
