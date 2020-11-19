<?php


namespace App\Controllers;


use App\Models\OneModel;
use Slim\Views\PhpRenderer;

class OneSortController
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
        $ones = $this->model->sortOnes(0);
        $data = ['data' => $ones];
        return $this->renderer->render($response, "index.php", $data);
    }
}