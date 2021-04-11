<?php


namespace App\Core;


class Response
{
    public function setStatusCode($statusCode)
    {
        http_response_code($statusCode);
    }
}