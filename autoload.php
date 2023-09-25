<?php 

function autoloadApp($class){
    require_once "controllers/".$class.".php"; 
}


spl_autoload_register("autoloadApp"); 