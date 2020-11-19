<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

return function (ContainerBuilder $containerBuilder) {
    $container = [];

    $container[LoggerInterface::class] = function (ContainerInterface $c) {
        $settings = $c->get('settings');

        $loggerSettings = $settings['logger'];
        $logger = new Logger($loggerSettings['name']);

        $processor = new UidProcessor();
        $logger->pushProcessor($processor);

        $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
        $logger->pushHandler($handler);

        return $logger;
    };

    $container['renderer'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['renderer'];
        $renderer = new PhpRenderer($settings['template_path']);
        return $renderer;
    };

    $container['PDO'] = function (ContainerInterface $c) {
        $db = new PDO('mysql:host=127.0.0.1; dbname=mvc1', 'root', 'password');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    };
    $container['OneModel'] = DI\Factory('\App\Factories\OneModelFactory');
    $container['OnePageController'] = DI\Factory('\App\Factories\OnePageControllerFactory');
    $container['OneCheckController'] = DI\Factory('\App\Factories\OneCheckControllerFactory');
    $container['OneAddController'] = DI\Factory('\App\Factories\OneAddControllerFactory');
    $container['OneDoneController'] = DI\Factory('\App\Factories\OneDoneControllerFactory');
    $container['OneUncheckController'] = DI\Factory('\App\Factories\OneUncheckControllerFactory');
    $container['OneSortController'] = DI\Factory('\App\Factories\OneSortControllerFactory');

    $containerBuilder->addDefinitions($container);
};
