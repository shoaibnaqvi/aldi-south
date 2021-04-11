<?php


namespace App\Core;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

/**
 * @package app\Core
 */

class Router
{
    protected array $routes = [];

    public Request $request;

    public FilesystemLoader $loader;

    public Environment $twig;

    private Response $response;
    /**
     * Router constructor.
     * @param Request $request
     */
    public function __construct(Request $request, Response $response)
    {
        $this->loader = new FilesystemLoader(Application::$ROOT_DIR . '/Views');
        $this->twig = new Environment($this->loader);

        $this->request = $request ?? new Request();
        $this->response = $response ?? new Response();

    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false){
            $this->response->setStatusCode(404);
            return 'not found';
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback,$this->request);
    }

    /**
     * @throws \Twig\Error\SyntaxError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\LoaderError
     */
    public function renderView($view)
    {
        if(!file_exists(Application::$ROOT_DIR ."/Views/$view.html.twig")) {
            return $this->twig->render("404.html.twig");
        }
        return $this->twig->render("$view.html.twig");
    }

}