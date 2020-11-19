<?php


namespace App\Factories;


use App\Controllers\OnePageController;
use Psr\Container\ContainerInterface;

class OnePageControllerFactory
{
    public function __invoke(ContainerInterface $container): OnePageController
    {
        $model = $container->get('OneModel');
        $renderer = $container->get('renderer');
        return new OnePageController($model, $renderer);
    }
}