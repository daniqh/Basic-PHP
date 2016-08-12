<?php

namespace Game;
class Archer extends Unit
{
    protected $damage=20;

    public function attack(Unit $opponent)
    {
        show("<p>{$this->name} shoot an arrow to {$opponent->getName()} </p>");
        $opponent->takeDamage($this->damage);
    }


}