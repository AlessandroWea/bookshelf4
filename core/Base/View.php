<?php

declare(strict_types=1);

namespace Malordo\Base;

class View
{
    public $layout;

    public function __construct()
    {
        $this->layoutFolder = TEMPLATE_PATH . 'layouts/';
        $this->layout = 'default.php';
    }

    public function render(string $path, array $vars = [])
    {
        if($this->layout !== null){
            $layoutPath = $this->layoutFolder . $this->layout;
            if(!file_exists($layoutPath))
                throw new \Exception("Layout file $layoutPath doesn't exist");
        }

        if($vars)
            extract($vars);
        ob_start();
        require $path;
        $content = ob_get_clean();
        require $layoutPath;
    }

	public function render_fragment($path, $vars = [])
	{
		if($vars)
			extract($vars);

        ob_start();
        require $path;

		return ob_get_clean();
	}

	public function redirect(string $url)
	{
		header('Location: '.$url);
		exit();
	}

}