<?php

namespace App\Controllers;

use App\Page\InvalidPageException;
use Http\Response;
use App\Page\PageReader;
use App\Template\FrontendRenderer;

class Page
{
    private $response;
    private $pageReader;
    private $renderer;

    public function __construct(Response $response, PageReader $pageReader, FrontendRenderer $renderer)
    {
        $this->response = $response;
        $this->pageReader = $pageReader;
        $this->renderer = $renderer;
    }

    public function show($params)
    {
        $slug = $params['slug'];
        try {
            $data['content'] = $this->pageReader->readBySlug($slug);
        } catch (InvalidPageException $e) {
            $this->response->setStatusCode(404);
            return $this->response->setContent('404 - Page not found');
        }
        $html = $this->renderer->render('Page', $data);
        $this->response->setContent($html);
    }
}
