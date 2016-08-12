<?php
/**
 * Encapsulation, getters and setters in PHP
 *
 * Encapsulation allows protect and hide information, so it can not be modified or viewed by other classes.
 * To access information safely we should use setter and getters.
 *
 */
class Person {
    protected $firstName; //public,protected and private
    protected $lastName;
    protected $nickname;
    protected $changedNickname;

    function __construct($firstName,$lasName)
    {
        $this->firstName=$firstName;
        $this->lastName=$lasName;
    }

    //Getter
    function getFirstName(){
        return $this->firstName;
    }

    function getLastName(){
        return $this->firstName;
    }

    function getFullName(){
        return $this->firstName .' ' . $this->lastName;
    }

    //Setter
    function setNickname($nickname){
        if ($this->changedNickname >=2){
            throw new Exception( "You can't change a nickname more than 2 times");
        }
        $this->nickname=$nickname;
        $this->changedNickname++;
    }

    function getNickname(){
            return ($this->nickname);
    }





}

$person1=new Person('Daniel','Quintero');


$person1->setNickname('Templar');
$person1->setNickname('Silence');

exit($person1->getNickname());