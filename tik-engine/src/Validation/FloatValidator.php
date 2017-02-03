<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FloatValidator extends Validator
{
    public function filter($value)
    {
        return $this->filterVar($value, FILTER_SANITIZE_NUMBER_FLOAT);
    }

    public function validate($value)
    {
        return $this->filterVar($value, FILTER_VALIDATE_FLOAT);
    }
}
