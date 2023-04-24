<?php
namespace app\controllers;

use app\models\RegisterModel;
use app\requests\Request;

/**
 * class AuthController
 * 
 */
class AuthController extends Controller
{
    /**
     *login
     * 
     */
    public function login()
    {
        return $this->renderToView('auth/login');
    }

    /**
     *register
     * 
     * @param Request $request
     */
    public function register(Request $request)
    {
        if ($request->isPost()) {
            $errors = [];
            $body = $request->getBody();
            $registerModel = new RegisterModel();
            $data = $registerModel->loadData($body);
            echo "<pre>";
            var_dump($body);
            exit;
            echo "<\pre>";
            if (empty($body["name"])) {
                $errors['name'] = 'Name field is required!';
                return $this->renderToView('auth/register', [
                    "errors" => $errors
                ]);
            }
            // return 'Register Data from form';
        }
        
        return $this->renderToView('auth/register');
    }

    /**
     * render view
     * 
     * @param string $view
     * @param array $params
     */
    private function renderToView($view, $params = [])
    {
        $this->setLayout('auth');
        return $this->render($view, $params);
    }
}