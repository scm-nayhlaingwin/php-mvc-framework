<?php
namespace app\controllers;

/**
 * class HomeController
 * 
 */
class HomeController extends Controller
{
    /**
     * 
     * 
     */
    public function index()
    {
        $params = [
            'name' => "Hello PHP MVC FrameWork"
        ];
        return $this->render('home', $params);
    }
}