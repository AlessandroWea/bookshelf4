<?php

declare(strict_types=1);

namespace Malordo\Base;

use Malordo\Base\View;

class BaseController
{
    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function render(string $path, array $vars = [])
    {
        $fullPath = TEMPLATE_PATH . $path;
        if(!file_exists($fullPath))
            throw new \Exception("File $fullPath doesn't exist");

        $this->view->render($fullPath, $vars);
    }
}