<?php

use CommandString\Cookies\Cookie;
use CommandString\Pdo\Driver;
use CommandString\Router\Environment as Env;
use CommandString\Router\Router;

require_once "../private/vendor/autoload.php";

//##################//
//   SETUP ROUTER   //
//##################//
$router = new Router();
$router->setNamespace("Router\Routes");

//#######################//
//   SETUP ENVIRONMENT   //
//#######################//
$env = new Env("../private/env.json");

//################//
//   SETUP TWIG   //
//################//
$env->twig = new \Twig\Environment((new \Twig\Loader\FilesystemLoader("../private/views")), [
    "cache" => ($env->cache_templates === true) ? "../private/cache" : false
]);

//###################//
//   SETUP COOKIES   //
//###################//
// $env->cookie = new Cookie((new \CommandString\CookieEncryption\Encryption(Env::get()->cookies->passphrase, Env::get()->cookies->method)));

//######################//
//   SETUP PDO DRIVER   //
//######################//
// $driver = (new Driver(true))
//     ->withUsername($env->mysql->username)
//     ->withPassword($env->mysql->password)
//     ->withHost($env->mysql->host)
//     ->withDatabase($env->mysql->database)
//     ->connect()
// ;

require_once "../private/routes/Routes.php";
