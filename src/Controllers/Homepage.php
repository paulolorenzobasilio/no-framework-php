<?php

namespace App\Controllers;

use Http\Request;
use Http\Response;
use App\Template\FrontendRenderer;

class Homepage
{
    private $response;
    private $request;
    private $renderer;

    public function __construct(Response $response, Request $request, FrontendRenderer $renderer)
    {
        $this->response = $response;
        $this->request = $request;
        $this->renderer = $renderer;
    }

    public function show()
    {
        $html = $this->renderer->render('Homepage');
        $this->response->setContent($html);
    }
}
