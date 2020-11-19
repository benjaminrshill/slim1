<?php


namespace App\Factories;


use App\Models\OneModel;
use Psr\Container\ContainerInterface;

class OneModelFactory
{
    public function __invoke(ContainerInterface $container): OneModel
    {
        $db = $container->get('PDO');
        return new OneModel($db);
    }
}