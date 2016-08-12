<?php

namespace Game;
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