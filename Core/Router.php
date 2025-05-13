<?php

namespace app\Core;

class Router
{
    protected Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    protected array $routes = [];
    public function get($path, $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback): void
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        // we should know the path
        $path = $this->request->getPath();
        // we should know the request type
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            echo "Page not found";
            exit();
        }

        if (is_string($callback)) {
            return  $this->renderView($callback);
        }

        if (is_array($callback)) {
            //$controller = new \app\Core\Controllers\ContactController();
            $callback[0] = new $callback[0]();
        }

        //[object, method]
        return call_user_func($callback, $this->request);
        // select the callback based on the path and request type
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->renderLayout();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }


    public function renderOnlyView($viewName, $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once  __DIR__. "./../views/$viewName.php";
        return ob_get_clean();
    }


    public function renderLayout()
    {
        ob_start();
        include_once  __DIR__. "./../views/layouts/main.php";
        return ob_get_clean();
    }




}