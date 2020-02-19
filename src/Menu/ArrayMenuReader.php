<?php

namespace App\Menu;

class ArrayMenuReader implements MenuReader
{
    public function readMenu() : array {
        return [
            ['href' => '/', 'text' => 'Homepage'],
            ['href' => '/page-one', 'text' => 'Page One']
        ];
    }
}