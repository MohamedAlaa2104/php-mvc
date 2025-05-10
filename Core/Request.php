<?php

namespace app\Core;

class Request
{
    public function getPath(): string
    {
        // /contact  /users   /contact?id=1
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        //check if route contains ?
        $position = strpos($path, "?");

        if ($position === false) {
            return $path;
        }

        return substr($path, 0, $position);
    }

    public function getMethod(): string
    {
        // GET => get
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

}