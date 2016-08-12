<?php
/**
 * autoload & namespaces
 */
namespace Game;

require 'src/helpers.php';

spl_autoload_register(function($className){
    if(strpos($className,'Game\\')===0){
        $className=str_replace('Game\\','',$className);
    }

    if(file_exists("src/$className.php")){
        require("src/$className.php");
    }

});

$armor=new BronzeArmor();
$ramm=new Soldier('Ramm',$armor);
$silence=new Archer('Silence');

$silence->attack($ramm);
$ramm->attack($silence);
