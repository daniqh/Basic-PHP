<?php
/*DANIEL QUINTERO
 * (OOP) is a programming paradigm based on the concept of "objects"
 * 
 * An object is an element of real life with certain properties and behaviors.
 * A class is an abstraction of a real-life element to transform them into usable items within the program
 */
class Person {
    var $firstName;
    var $lastName;

    function __construct($firstName,$lasName)
    {
        $this->firstName=$firstName;
        $this->lastName=$lasName;
    }

    function fullName(){
        return $this->firstName .' ' . $this->lastName;
    }
}

$person1=new Person('Daniel','Quintero');
$person2=new Person('Pepe','Espejo');

echo "{$person1->fullName()} and {$person2->fullName()} are friends";

