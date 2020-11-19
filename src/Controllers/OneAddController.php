<?php


namespace App\Controllers;


use App\Models\OneModel;
use Slim\Views\PhpRenderer;

class OneAddController
{
    private $model;
    private $renderer;

    public function __construct(OneModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function __invoke($request, $response, $args)
    {
        $addData = $request->getParsedBody();
        $this->model->addOne($addData);
        return $response->withHeader('Location', '/');
    }
}