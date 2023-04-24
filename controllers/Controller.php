<?php
namespace app\controllers;

use app\core\Application;

class Controller
{
    public string $layout = 'index';
    /**
     * 
     * 
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * render view
     * 
     * @param string $view
     * @param array $params
     */
    protected static function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }
}