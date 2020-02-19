<?php

namespace App\Controllers;

use Http\Request;
use Http\Response;
use App\Template\Renderer;

class Homepage
{
    private $response;
    private $request;
    private $renderer;

    public function __construct(Response $response, Request $request, Renderer $renderer)
    {
        $this->response = $response;
        $this->request = $request;
        $this->renderer = $renderer;
    }

    public function show()
    {
        $data = [
            'name' => $this->request->getParameter('name', 'stranger')
        ];
        $html = $this->renderer->render('Homepage', $data);
        $this->response->setContent($html);
    }
}
