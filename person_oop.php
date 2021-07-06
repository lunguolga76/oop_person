<?php
class Person{
    private $name;
    private $lastName;
    private $freinds;
    
    public function __construct(string $name, string $lastName){
        $this->name=$name;
        $this->lastName=$lastName;
        $this->freinds=[];

    }
    private function getName(){
        return $this->name;

    }
    private function getFullName(){
        return $this->name.' '.$this->lastName;

    }
    protected function whoIs(){
        return "{" . $this->name ."}: ";
    }
    public function sayHello(){
        
        $greeting=$this->whoIs() . sprintf ('Hello, my name is %s. Nice to meet you.',$this->getFullName());
        return $greeting;

    }
   
    public function sayHelloToPeople(Person $first, Person $second){
        if(in_array($first, $this->freinds)){
            $firstGreeting='Hi, '.$first->getName();
        }else{
            $firstGreeting='Nice to meet you, '.$first->getName();
        }
        if(in_array($second, $this->freinds)){
            $secondGreeting='Hi, '.$second->getName();
        }else{
            $secondGreeting='Nice to meet you, '.$second->getName();
        }
        $greeting=sprintf ('%s Hello, my name is %s %s. %s, %s.',
        $this->whoIs(),
        $this->name, 
        $this->lastName,
        $firstGreeting,
        $secondGreeting,
    ); 
         $this->freinds[$first->getFullName()]=$first;
         $this->freinds[$second->getFullName()]=$second;
        
        return $greeting;

    }  
    public function  __toString()
    {
       $friendNames = [];
       /**Person $freind */
       foreach($this->freinds as $freind){
           $friendNames[]=$freind->getName();
       }
        return $this->whoIs() . implode(',', $freindNames);

    }
}
$angelina=new Person('Angelina', 'Jolie');
$brad=new Person('Brad','Pitt');
$spiderman=new Person('Peter','Parker');
echo $angelina->sayHello();
echo "\n";
echo $spiderman->sayHelloToPeople($angelina, $brad);
echo "\n";
echo $brad->sayHelloToPeople($angelina, $spiderman);
echo "\n";
echo $brad->sayHelloToPeople($angelina, $spiderman);
echo "\n";
echo $brad->__toString();
echo "\n";



?>