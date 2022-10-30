<?php

//########################//
//   DEFINE ROUTES HERE   //
//########################//

use CommandString\Router\Environment as Env;
use HttpSoft\Response\HtmlResponse;
use Router\Routes\Files;

$router->get("/", function () {
    return new HtmlResponse(Env::get()->twig->render("home.html"));
});

$router->get("/.*(".Files::generateRegex().")", "Files@handle");

$router->set404("/.*", "ErrorHandler@handle404");

$router->run();