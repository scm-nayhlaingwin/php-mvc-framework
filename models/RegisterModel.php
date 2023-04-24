<?php

namespace app\models;

class RegisterModel extends Model
{
    public string $name;
    public string $email;
    public string $password;
    public string $confirm;
    public string $check;
    
    /**
     * store data
     * 
     */
    public function store()
    {
        
    }

}