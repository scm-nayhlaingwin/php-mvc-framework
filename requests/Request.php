<?php
namespace app\requests;

/**
 * class Request
 */
class Request
{
    /**
     * get the path 
     * 
     */
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if (!$position) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    /**
     * get the method
     * 
     */
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * check the method
     * 
     */
    public function isGet()
    {
        return $this->method() === 'get';
    }

    /**
     * check the method
     * 
     */
    public function isPost()
    {
        return $this->method() === 'post';
    }

    /**
     * get the params 
     * 
     */
    public function getBody()
    {
        $body = [];

        if ($this->isGet()) {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->isPost()) {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}