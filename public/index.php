<?php
require_once(__DIR__.'/../vendor/autoload.php');
use app\Controllers\HomeController;

$router = isset($_GET ['route']) ? $_GET ['route'] : 'home';


switch($router){

    case'home': 
        $controllers = new HomeController;
        $controller = $controllers->gethome();
        break;
    case 'login':
        echo'login page';
        break;

    }