<?php

namespace Game;
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