<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RawValidator
 *
 * @author user
 */
class RawValidator extends Validator
{
    //put your code here
    
    public function filter($value)
    {
        return $this->filterVar($value, FILTER_UNSAFE_RAW);
    }

    public function validate($value)
    {
        return $this->filterVar($value, FILTER_UNSAFE_RAW);
    }
    
}
