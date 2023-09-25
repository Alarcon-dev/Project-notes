<?php 
$folderPaht = dirname($_SERVER['SCRIPT_NAME']); 
$urlPaht = $_SERVER['REQUEST_URI']; 
$url = substr($urlPaht , strlen($folderPaht)); 

define("base_url", $folderPaht."/"); 
define("url", $url); 
define("controller_default", "Main"); 
define("action_default", "index"); 
