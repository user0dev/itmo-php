<?php

// $testarr = [1, 2];
// var_dump(array_merge([], $testarr));
//var_dump($_SERVER);

class A
{
    const __default = null;
    static public function isDefine() {
        $name = "__default";
        return (static::__default !== null) ? "define" : "not define";
    }
}

class B extends A
{
    const __default1 = "1";
}

var_dump(B::isDefine());