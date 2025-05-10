<?php

namespace app\Core;

class Application
{
    public static Application $app;
    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
        self::$app = $this;
    }


    public function run()
    {
        echo $this->router->resolve();
    }
}