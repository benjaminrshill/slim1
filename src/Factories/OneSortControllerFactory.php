<?php


namespace App\Factories;


use App\Controllers\OneSortController;
use Psr\Container\ContainerInterface;

class OneSortControllerFactory
{
    public function __invoke(ContainerInterface $container): OneSortController
    {
        $model = $container->get('OneModel');
        $renderer = $container->get('renderer');
        return new OneSortController($model, $renderer);
    }
}