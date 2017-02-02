<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<pre>

<?php

class Person
{
    private $firstname;
    private $lastname;
    private $patro;
    public static $shared = 5;
    private $count = 0;
    public function __construct(string $firstname, string $lastname, string $patro) 
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->patro = $patro;
        self::$count += 1;
    }
    
    static public function getCount()
    {
        return sefl::$count;
    }
    
    public function getFullName()
    {
        return sprintf("%s %s %s", $this->lastname, $this->firstname, $this->patro);
    }
    public function __toString() 
    {
        return $this->getFullName();
    }
    public function __set($name, $value) 
    {
        throw new Exception("Non exists");
    }
    static public function getInstance(...$args) 
    {
        var_dump($args);
    }
}

class Developer extends Person
{
    protected $skills = [];
    
    public function __construct($firstname, $lastname, $patro, array $skills)
    {
        parent::__construct($firstname, $lastname, $patro);
        $this->skills = $skills;
        
    }
}

var_dump(Developer::$shared);

$person1 = new Person("Николай", "Андрианов", "Юрьевич");

$developer1 = new Developer("Николай", "Андрианов", "Юрьевич", ["php", "css", "js", "html"]);


//$person1->nonExists = "test";

//echo $person1;//->getFullName();

//$person->firstname = "Николай";
//$person->lastname = "Андрианов";
//$person->patro = "Юрьевич";


Developer::getInstance(1, true, "hello world!");
$person3 = $person1;

var_dump(Developer::getCount());

//var_dump($person1, $person2, $person3, new Person());
?>

</pre>

</body>
</html>
