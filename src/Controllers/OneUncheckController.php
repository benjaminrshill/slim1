<?php


namespace App\Controllers;


use App\Models\OneModel;
use Slim\Views\PhpRenderer;

class OneUncheckController
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
        if (isset($updateData['redoDone'])) {
            $this->model->uncheckOne($updateData);
        } elseif (isset($updateData['delete'])) {
            $this->model->deleteOne($updateData);
        }
        return $response->withHeader('Location', '/');
    }
}