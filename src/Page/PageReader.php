<?php

namespace App\Page;

interface PageReader
{
    public function readBySlug(string $slug): string;
}
