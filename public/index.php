<?php
use app\Controllers\AuthController;
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

    case 'search':
 
        $input = $_POST['input'];
        $wikis = new HomeController;
        $wikis->search($input);
        

        break;

    case 'Signup':
        $controllers = new AuthController;
        $controllers->index();
        break;

    case 'Signin':
        $controllers = new AuthController;
        $controllers->signin();
        break;

    case 'signupaction':
        $controllers = new AuthController;
        $controllers->signup();
        break;

    case 'signinaction':
        $controllers = new AuthController;
        $controllers->log();
        break;

    case 'logout':
        $controllers = new AuthController;
        $controllers->logout();
        break;


    case 'dashboard':
        $controllers = new DashboardController;
        $controllers->index();
        break;

    case 'wikidelete':
        $controllers = new DashboardController;
        $controllers->delete();
        break;

    case 'wikiaccept':
        $controllers = new DashboardController;
        $controllers->accept();
        break;

    case 'wikiarchive':
        $controllers = new DashboardController;
        $controllers->archive();
        break;

    case 'addTags':
        $controllers = new DashboardController;
        $controllers->addTags();

        break;

    case 'addCategories':
        $controllers = new DashboardController;
        $controllers->addCategories();

        break;
    case 'tagdelete':
        $controllers = new DashboardController;
        $controllers->tagdelete();
        break;

    case 'categoriedelete':
        $controllers = new DashboardController;
        $controllers->categoriedelete();
        break;

    case 'author':
        $controllers = new AuthController;
        $controllers->signinauth();

        break;

    case 'wikishow':
        
        $controllers = new HomeController;
        $controllers->wikishow();

        break;




    default:
        $controllers = new ErrorController;
        $controllers->error();
        break;


}
