<?php

abstract class Validator
{
    protected $default;
    protected $forceArray = false;
    protected $message; 
    
    function __construct(array $options = [])
    {
        foreach ($options as $name => $value) {
            $method = "set" . $name;
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    
    public function setMessage(string $message): Validator
    {
        $this->message = $message;
        return $this;
    }
    function setForceArray(bool $forceArray): Validator
    {
        $this->forceArray = $forceArray;
        return $this;
    }
    public function setDefault($default): Validator
    {
        $this->default = $this->validate($default);
        return $this;
    }

    public function getDefault() {
        return $this->default;
    }


    public function getMessage(): string {
        $template = $this->getMessageTemplate();
        
        preg_match_all("/{(\w+)}/i", $template, $replaceKeys);
        
        $replaceKeys = array_combine($replaceKeys[1], $replaceKeys[0]);
        
        $replace = [];
        foreach ($replaceKeys as $prop => $name) {
            if (isset($this->$prop)) {
                $replace[$name] = $this->$prop;
            }
        }
        return strtr($template, $replace);
    }

    protected function getMessageTemplate(): string
    {
        return $this->message ?? "Не корректное значение.";
    }
    
    abstract public function filter($value);    
    
    protected function filterVar($value, $filter, array $options = [])
    {
        $options['flags'] = ($options['flags'] ?? 0) | FILTER_NULL_ON_FAILURE;
        if ($this->forceArray) {
            $options['flags'] |= FILTER_FORCE_ARRAY;
        }
        
        return filter_var($value, $filter, $options);
    }


    abstract public function validate($value);
}

