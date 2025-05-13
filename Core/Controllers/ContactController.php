<?php

namespace app\Core\Controllers;

use app\Core\Application;
use app\Core\Request;
class ContactController
{

    public function index(Request $request)
    {
        $data = $request->getBody();

        return Application::$app->router->renderView('contact', $data);
    }

    public function store()
    {

    }

}