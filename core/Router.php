<?php
namespace app\core;

use app\requests\Request;

/**
 * Router Class
 */
class Router
{
    public Request $request;
    protected array $routes = [];

    /**
     * constructor
     * 
     * @param $request
     * @param $response
     */
    public function __construct($request)
    {
        $this->request =  $request;
    }

    /**
     * get
     * 
     * @param $path
     * @param $callback
     */
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * post
     * 
     * @param $path
     * @param $callback
     */
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    /**
     * 
     * 
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if (!$callback) {
            Application::$app->response->setStatusCode(404);

            $layoutView = $this->renderLayoutView('index');
            $errorView = $this->renderContentView('_404', []);
            $layoutView = str_replace('{{ navbar }}', '', $layoutView);
            return str_replace('{{ content }}', $errorView, $layoutView);
        }
        if (is_string($callback)) {
           return $this->renderView($callback);
        }
        if (is_array($callback)) {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }
        
        return call_user_func($callback, $this->request);
    }
    
    /**
     * render the view file
     * 
     * @param string $view
     * @param array $params
     */
    public function renderView($view, $params = [])
    {
        $layout = Application::$app->controller->layout;
        $layoutView = $this->renderLayoutView($layout);

        if ($layout === 'index') {   
            $navbarView = $this->renderLayoutView('navbar');
            $layoutView = str_replace('{{ navbar }}', $navbarView, $layoutView);
        }

        $contentView = $this->renderContentView($view, $params);
        return str_replace('{{ content }}', $contentView, $layoutView);

    }
    
    /**
     * render the main layout view file
     * 
     * @param string $view
     */
    public function renderLayoutView($view)
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layout/$view.php";
        return ob_get_clean();
    }
    
    /**
     * render the content view files
     * 
     * @param string $view
     * @param array $params
     */
    public function renderContentView($view, $params)
    {
        foreach ($params as $key => $value) {
           $$key = $value; //
        }

        ob_start();
        // include_once __DIR__."/../views/$view.php";
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }
}