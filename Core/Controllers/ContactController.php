<?php

namespace app\Core\Controllers;

use app\Core\Application;

class ContactController
{

    public function index()
    {
        return Application::$app->router->renderView('contact');
    }

    public function store()
    {

    }

}