<?php


namespace App\Controllers;


use App\Models\OneModel;
use Slim\Views\PhpRenderer;

class OneCheckController
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
        $updateData = $request->getParsedBody();
        $this->model->checkOne($updateData);
        return $response->withHeader('Location', '/');
    }
}