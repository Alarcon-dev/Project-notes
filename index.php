<?php 
session_start(); 
require_once "./config/parameters.php";
require_once "./helpers/Helpers.php"; 
require_once "./config/DatabaseConect.php"; 
require_once "./helpers/Router.php"; 

$router = new Router(); 