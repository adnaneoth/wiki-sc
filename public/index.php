<?php
use app\Controllers\DashboardController;
define('APP_URL', "http://localhost/wiki-sc/");
require_once(__DIR__ . '/../vendor/autoload.php');
use app\Controllers\HomeController;
use app\Controllers\SignupController;
use app\Controllers\ErrorController;



$router = isset($_GET['route']) ? $_GET['route'] : 'home';



switch ($router) {

    case 'home':
        $controllers = new HomeController;
        $controllers->gethome();

        break;
    case 'Signup':
        $controllers = new SignupController;
        $controllers->index();
        break;
    
        case 'dashboard':
            $controllers = new DashboardController;
            $controllers->affich();
            break;
    
    
    
        default:
    $controllers = new ErrorController;
    $controllers->error();
    break;
    

}