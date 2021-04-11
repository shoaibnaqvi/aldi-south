<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;

class IndexController
{
    public static function home(): string
    {
        return Application::$app->router->renderView("home");
    }

    public static function overview(): string
    {
        return Application::$app->router->renderView("overview");
    }

    public static function login(Request $request): string
    {
        if($request->isPost())
        {
            //TODO: validate the login here and return to the login sucessfull message to home page
        }
        return Application::$app->router->renderView("login");
    }

    public static function impressum(): string
    {
        return Application::$app->router->renderView("impressum");
    }

    public static function createNewBlogPost(): string
    {
        return Application::$app->router->renderView("addBlogPost");
    }

    public static function insertBlogPost(Request $request)
    {
        return Application::$app->router->renderView("login");
    }

}