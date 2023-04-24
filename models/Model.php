<?php

namespace app\models;

abstract class Model 
{
    /**
     * load data
     * 
     * @param array $data
     */
    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
}