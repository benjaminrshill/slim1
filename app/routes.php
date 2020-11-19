<?php
declare(strict_types=1);

namespace App\Models;

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {

    $container = $app->getContainer();

    $app->get('/', 'OnePageController');

    $app->post('/', 'OneCheckController');

    $app->post('/add', 'OneAddController');

    $app->get('/done', 'OneDoneController');

    $app->post('/done', 'OneUncheckController');

    $app->get('/due', 'OneSortController');

    $app->post('/due', 'OneCheckController');

};
