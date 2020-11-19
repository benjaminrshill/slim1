<?php


namespace App\Factories;


use App\Controllers\OneAddController;
use Psr\Container\ContainerInterface;

class OneAddControllerFactory
{
    public function __invoke(ContainerInterface $container): OneAddController
    {
        $model = $container->get('OneModel');
        $renderer = $container->get('renderer');
        return new OneAddController($model, $renderer);
    }
}