<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IntValidator
 *
 * @author user
 */
class IntValidator extends Validator
{
    //put your code here
    public function filter($value)
    {
        return $this->filterVar($value, FILTER_SANITIZE_NUMBER_INT);
    }

    public function validate($value)
    {
        return $this->filterVar($value, FILTER_VALIDATE_INT);
    }

    
}
