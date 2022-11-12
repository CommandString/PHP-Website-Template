<?php

namespace Router\Routes;

use Psr\Http\Message\ResponseInterface;

class Files {
    public static array $content_types = [
        "css" => "text/css",
        "js" => "text/javascript",
        "png" => "image/png",
        "jpg" => "image/jpeg",
        "jpeg" => "image/jpeg",
        "gif" => "image/gif",
        "ico" => "image/x-icon",
        "ttf" => "font/ttf"
    ];

    public static function handle(ResponseInterface $res): ResponseInterface
    {
        $path_to_file = realpath("../public".str_replace("../", "", $_SERVER['REQUEST_URI']));

        if (!file_exists($path_to_file)) {
            return ErrorHandler::handle404();
        }

        $file_contents = file_get_contents($path_to_file);
        $file_ext = explode(".", $_SERVER['REQUEST_URI']);
        $file_ext = $file_ext[count($file_ext)-1];

        $res = $res->withHeader("Content-Type", self::$content_types[$file_ext])->withHeader("Content-Length", strlen($file_contents));
        $res->getBody()->write($file_contents);

        return $res;
    }

    public static function generateRegex(): string
    {
        $regex = "";

        foreach (array_keys(self::$content_types) as $type) {
            $regex.= sprintf(".%s|", $type);
        }
        
        return substr($regex, 0, -1);
    }
}
