<?php

//chargement config
require_once(__DIR__.'/config/config.php');

//error_reporting(0);

//chargement autoloader pour autochargement des classes
require_once(__DIR__.'/config/Autoload.php');
Autoload::charger();

$_SESSION = array();

session_start();

//Provisoire
/*
$contU = new CtrlUser();
$contA = new CtrlAdmin();
*/

$ctrl = new FrontController();
