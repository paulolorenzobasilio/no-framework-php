<?php

namespace App\Controllers;

use Http\Request;
use Http\Response;

class Homepage
{
    private $response;
    private $request;

    public function __construct(Response $response, Request $request)
    {
        $this->response = $response;
        $this->request = $request;
    }

    public function show()
    {
        $content = '<h1>Hello World</h1>';
        $content.= 'Hello ' . $this->request->getParameter('name', 'stranger');
        $this->response->setContent($content);
    }
}
