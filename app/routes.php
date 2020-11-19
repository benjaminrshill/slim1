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

    $app->post('/done', 'OneCheckController');

    // /books           send to /book
    // /books/{book}    send to book placeholder
    // /books[/{book]   inside [] is optional
//    $app->get('/books[/{book}]', function ($request, $response, $args) use ($container) {
//        print_r($args);
//        $renderer = $container->get('renderer');
//        return $renderer->render($response, "index.php", $args);
//    });

};
