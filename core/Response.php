<?php
namespace app\core;

/**
 * Calss Resposne
 */
class Response 
{
    /**
     * Change the default response code
     * 
     * @param integer $code
     */
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }
}