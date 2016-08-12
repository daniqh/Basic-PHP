<?php
/**
 * Polymorphism and interfaces
 *
 * Polymorphism is the ability of a method within an object to interact with different objects
 * of different classes in the same way but with different results.
 *
 * Interfaces
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
        $damage=$this->absorbDamage($damage);

        $this->hp=$this->hp-$damage;
        show("{$this->name} has {$this->hp} hp left");
        if ($this->hp<=0){
            $this->die_unit();
        }

    }

    protected function absorbDamage($damage)
    {
       return $damage;
    }

    public function die_unit()
    {
        show("<p>{$this->name} die </p>");
    }

}
class Soldier extends  Unit
{
    protected $damage=40;
    protected $armor;

    public function __construct($name, Armor $armor=null)
    {
        $this->setArmor($armor);
        parent::__construct($name);
    }

    public function setArmor(Armor $armor=null)
    {
      $this->armor=$armor;
    }

    public function attack(Unit $opponent)
    {
        show("<p>{$this->name} cut {$opponent->getName()} with my sword</p>");
        $opponent->takeDamage($this->damage);
    }
public function absorbDamage($damage){
    if ($this->armor)
    {
        $damage=$this->armor->absorbDamage($damage);
    }
}


}
/** We have soldiers with diferents kinds of armors */

class Archer extends Unit
{
    protected $damage=20;

    public function attack(Unit $opponent)
    {
        show("<p>{$this->name} shoot an arrow to {$opponent->getName()} </p>");
        $opponent->takeDamage($this->damage);
    }


}
interface Armor{
    public function absorbDamage($damage);

}
class SilverArmor implements Armor{

    public function absorbDamage($damage){
        return $damage/3;
    }
}
class BronzeArmor implements Armor{

    public function absorbDamage($damage){
      return $damage/2;
    }
}
$armor=new BronzeArmor();
$ramm=new Soldier('Ramm',$armor);
$silence=new Archer('Silence');

$silence->attack($ramm);
$ramm->attack($silence);
