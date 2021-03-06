<?php

namespace Aurora\Guess;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \Anax\DI\InjectionAwareInterface;
use \Anax\Di\InjectionAwareTrait;

class GuessController implements
    ConfigureInterface,
    InjectionAwareInterface
{
    use ConfigureTrait,
    InjectionAwareTrait;

    /**
    * Returns the view for Guess my number (GET).
    */
    public function guessGet()
    {
        $title = "Guess my number (GET)";
        $view = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");

        $number = $this->di->get("request")->getGet("number");

        if (isset($number)) {
            $gussed = true;
            $secretNumber = $this->di->get("request")->getGet("number");
            $tries = $this->di->get("request")->getGet("tries");
            $yourGuess = $this->di->get("request")->getGet("guess");

            $guess = new Guess($secretNumber, $tries);
        } elseif (!isset($number)) {
            $guess = new Guess();
            $gussed = false;
        }

        $data = [
            "title" => $title,
            "method" => "GET",
            "url" => "get",
            "gussed" => $gussed,
            "secretNumber" => isset($secretNumber) ? $secretNumber : null,
            "tries" => isset($tries) ? $tries : null,
            "yourGuess" => isset($yourGuess) ? $yourGuess : null,
            "guess" => $guess
        ];

        $view->add("guess/guess", $data);
        $pageRender->renderPage(["title" => $title]);
    }



    /**
    * Returns the view for Guess my number (POST).
    */
    public function guessPost()
    {
        $title = "Guess my number (POST)";
        $view = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");

        $number = $this->di->get("request")->getPost("number");

        if (isset($number)) {
            $gussed = true;
            $secretNumber = $this->di->get("request")->getPost("number");
            $tries = $this->di->get("request")->getPost("tries");
            $yourGuess = $this->di->get("request")->getPost("guess");

            $guess = new Guess($secretNumber, $tries);
        } elseif (!isset($number)) {
            $guess = new Guess();
            $gussed = false;
        }

        $data = [
            "title" => $title,
            "method" => "POST",
            "url" => "post",
            "gussed" => $gussed,
            "secretNumber" => isset($secretNumber) ? $secretNumber : null,
            "tries" => isset($tries) ? $tries : null,
            "yourGuess" => isset($yourGuess) ? $yourGuess : null,
            "guess" => $guess
        ];

        $view->add("guess/guess", $data);
        $pageRender->renderPage(["title" => $title]);
    }



    /**
    * Returns the view for Guess my number (SESSION).
    */
    public function guessSession()
    {
        $title = "Guess my number (SESSION)";
        $view = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");

        $session = $this->di->get("session");
        $number = $this->di->get("request")->getPost("number");

        $reset = $this->di->get("request")->getPost("reset")

        if (isset($reset)) {
            $_POST = array();
        }

        if (isset($number)) {
            $gussed = true;
            $guess = $session->get("guess");
            $yourGuess = $this->di->get("request")->getPost("guess");
        } elseif (!isset($number)) {
            $guess = new Guess();
            $session->set("guess", $guess);
            $gussed = false;
        }

        $data = [
            "title" => $title,
            "method" => "POST",
            "url" => "session",
            "gussed" => $gussed,
            "secretNumber" => isset($secretNumber) ? $secretNumber : null,
            "tries" => isset($tries) ? $tries : null,
            "yourGuess" => isset($yourGuess) ? $yourGuess : null,
            "guess" => $guess
        ];

        $view->add("guess/guess", $data);
        $pageRender->renderPage(["title" => $title]);
    }
}
