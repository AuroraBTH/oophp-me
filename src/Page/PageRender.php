<?php

namespace Anax\Page;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * A default page rendering class.
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class PageRender implements PageRenderInterface, InjectionAwareInterface
{
    use InjectionAwareTrait;

    /**
     * Render a standard web page using a specific layout.
     *
     * @param array   $data   variables to expose to layout view.
     * @param integer $status code to use when delivering the result.
     *
     * @return void
     */
    public function renderPage($data = null, $status = 200)
    {
        $data["favicon"] = "favicon.ico";
        $data["stylesheets"] = [
            "css/style.css",
            "../vendor/twbs/bootstrap/dist/css/bootstrap.min.css",
            "../vendor/components/font-awesome/css/fontawesome-all.min.css"
        ];
        $data["javascripts"] = [
            "../vendor/twbs/bootstrap/assets/js/vendor/jquery-slim.min.js",
            "../vendor/twbs/bootstrap/assets/js/vendor/popper.min.js",
            "../vendor/twbs/bootstrap/dist/js/bootstrap.min.js",
            "js/main.js"
        ];

        $view = $this->di->get("view");
        $view->add("header/oophp/default", [], "header");
        $view->add("navbar/oophp/default", [], "navbar");
        $view->add("footer/oophp/default", [], "footer");

        // Add layout, render it, add to response and send.
        $view = $this->di->get("view");
        $view->add("layout/oophp/default", $data, "layout");
        $body = $view->renderBuffered("layout");
        $this->di->get("response")->setBody($body)
                                  ->send($status);
        exit;
    }
}
