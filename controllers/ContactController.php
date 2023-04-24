<?php
namespace app\controllers;

use app\core\Request;

/**
 * class Controller
 * 
 */
class ContactController extends Controller
{
    /**
     * 
     * 
     */
    public function index()
    {
        return self::render('contact');
    }
    
    /**
     * store contact data
     * 
     */
    public function store(Request $request)
    {
        $body = $request->getBody();
        return 'Data from contact form';
    }
}