<?php

namespace Router\Routes;

use CommandString\Router\Environment as Env;
use HttpSoft\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;

class ErrorHandler {
    public static function handle404(): ResponseInterface
    {
        return new HtmlResponse(Env::get()->twig->render("errors/404.html", [
            "uri" => $_SERVER["REQUEST_URI"]
        ]), 404);
    }
}