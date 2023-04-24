<?php

namespace app\requests;

abstract class AuthRequest 
{
    public const RULE_REQUIRED = 'required'; 
    public const RULE_EMAIL = 'required'; 
    public const RULE_MIN = 'min'; 
    public const RULE_MAX = 'max'; 
    public const RULE_MATCH = 'match'; 
    
    /**
     * validation rules
     * 
     */
    abstract public function rules();
}