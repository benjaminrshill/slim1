<?php


namespace App\Factories;


use App\Controllers\OneCheckController;
use Psr\Container\ContainerInterface;

class OneCheckControllerFactory
{
    public function __invoke(ContainerInterface $container): OneCheckController
    {
        $model = $container->get('OneModel');
        $renderer = $container->get('renderer');
        return new OneCheckController($model, $renderer);
    }
}