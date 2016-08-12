<?php
/**
 * Inheritance and abstraction with PHP
 */
abstract class Unit{
    protected $alive=true;
    protected $name;
    public function __construct($name)
    {
        $this->name=$name;
    }
    public function move ($direction){
        echo "<p>{$this->name} move to $direction</p>";
    }
    abstract function attack($opponent);
}
class Soldier extends  Unit{
    public function attack($opponent){
        echo "<p>{$this->name} cut $opponent with my sword</p>";
    }
}
class Archer extends Unit{
    public function attack($opponent){
        echo "<p>{$this->name} shoot an arrow to $opponent </p>";
    }
}
$silence=new Archer('Silence');
$silence->move('To North');
$silence->attack('Ramm');