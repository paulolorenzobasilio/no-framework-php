<?php

namespace App;

return [
    ['GET', '/', ['App\Controllers\Homepage', 'show']],
    ['GET', '/{slug}', ['App\Controllers\Page', 'show']]
];