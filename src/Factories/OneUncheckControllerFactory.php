<?php


namespace App\Factories;


use App\Controllers\OneUncheckController;
use Psr\Container\ContainerInterface;

class OneUncheckControllerFactory
{
    public function __invoke(ContainerInterface $container): OneUncheckController
    {
        $model = $container->get('OneModel');
        $renderer = $container->get('renderer');
        return new OneUncheckController($model, $renderer);
    }
}