<?php


namespace App\Factories;


use App\Controllers\OneDoneController;
use Psr\Container\ContainerInterface;

class OneDoneControllerFactory
{
    public function __invoke(ContainerInterface $container): OneDoneController
    {
        $model = $container->get('OneModel');
        $renderer = $container->get('renderer');
        return new OneDoneController($model, $renderer);
    }
}