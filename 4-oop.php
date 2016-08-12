<?php
/**
 * Interaction between objects
 */
function show ($message)
{
    echo "<p> $message </p>";
}

abstract class Unit{
    protected $hp=40;
    protected $name;

    public function __construct($name)
    {
        $this->name=$name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHp  ()
    {
        return $this->hp;
    }

    public function move ($direction)
    {
        show("<p>{$this->name} move to $direction</p>");
    }

    abstract function attack(Unit $opponent);

    public function takeDamage($damage)
    {
       $this->setHp($this->hp-$damage);

        if($this->hp <=0){
            $this->die_unit();
        }
    }

    public function die_unit()
    {
        show("<p>{$this->name} die </p>");
    }

    private function setHp  ($points)
    {
        $this->hp=$points;
        show("{$this->name} has {$this->hp} hp left");
    }
}
class Soldier extends  Unit
{
    protected $damage=40;

    public function attack(Unit $opponent)
    {
        show("<p>{$this->name} cut {$opponent->getName()} with my sword</p>");
        $opponent->takeDamage($this->damage);
    }

    public function takeDamage($damage)
    {
       return parent::takeDamage($damage / 2);
    }

}
class Archer extends Unit
{
    protected $damage=20;

    public function attack(Unit $opponent)
    {
       show("<p>{$this->name} shoot an arrow to {$opponent->getName()} </p>");
        $opponent->takeDamage($this->damage);
    }

   public function takeDamage($damage)
    {   //dodged
       if (rand (0,1)==1){
            return parent::takeDamage($damage);
        }

    }
}

$ramm=new Soldier('Ramm');
$silence=new Archer('Silence');
//$silence->move('To North');
$silence->attack($ramm);
$ramm->attack($silence);
$ramm->attack($silence);