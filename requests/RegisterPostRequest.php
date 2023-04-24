<?php

namespace app\requests;

class RegisterPostRequest extends AuthRequest
{
    public $request;

    public function __construct()
    {
        echo '-----------------';
        $this->request = new Request();
    }

    /**
     * check validation
     * 
     */
    public function rules()
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [
                self::RULE_REQUIRED,
                [self::RULE_MIN, 'min' => 8],
                [self::RULE_MAX, 'max' => 24]
            ],
            'confirm' => [
                self::RULE_REQUIRED,
                [self::RULE_MATCH, 'match' => 'password']
            ]
        ];
    }
}