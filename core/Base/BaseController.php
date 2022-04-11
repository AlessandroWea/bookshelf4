<?php

declare(strict_types=1);

namespace Malordo\Base;

use Malordo\Base\View;
use Malordo\Request\Request;

class BaseController
{
    public View $view;
    protected Request $request;

    public function __construct()
    {
        $this->view = new View();
        $this->request = new Request();
    }

    public function render(string $path, array $vars = [])
    {
        $fullPath = TEMPLATE_PATH . $path;
        if(!file_exists($fullPath))
            throw new \Exception("File $fullPath doesn't exist");

        $this->view->render($fullPath, $vars);
    }

    public function redirect(string $path)
    {
        $this->view->redirect($path);
    }
}