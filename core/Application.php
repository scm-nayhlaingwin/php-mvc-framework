<?php
namespace app\core;

use app\controllers\Controller;
use app\requests\Request;

/**
 * Application Class
 */
class Application
{
    public static string $ROOT_DIR;
    public static Application $app;
    public Request $request;
    public Response $response;
    public Router $router;
    public Controller $controller;

    /**
     * constructor
     * 
     * @param string $rootPath
     */
    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request =  new Request();
        $this->response =  new Response();
        $this->router =  new Router($this->request);
    }

    /**
     * 
    */
    public function run()
    {
        echo $this->router->resolve();
    }

    // /**
    //  * get the controller
    //  * 
    //  */
    // public function getController()
    // {
    //     return $this->controller;
    // }

    // /**
    //  * set the controller
    //  * 
    //  * @param Controller $controller
    //  */
    // public function setController(Controller $controller)
    // {
    //     return $this->controller = $controller;
    // }
}