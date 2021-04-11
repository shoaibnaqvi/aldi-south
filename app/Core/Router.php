<?php


namespace App\Core;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

/**
 * @package app\core
 */

class Router
{
    protected array $routes = [];

    public Request $request;

    public FilesystemLoader $filesystemLoader;

    public Environment $twig;

    /**
     * Router constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->loader = new FilesystemLoader(__DIR__ . '/../Views');
        $this->twig = new Environment($this->loader);
        $this->request = $request;
    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false){
            echo 'not found';
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        echo call_user_func($callback);
    }

    public function renderView($view)
    {
        if(!file_exists(__DIR__."/../Views/$view.html.twig")) {
            return 'View not found';
        }
        echo $this->twig->render("$view.html.twig");
    }

}