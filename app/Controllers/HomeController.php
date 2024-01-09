<?php
namespace app\Controllers;
use app\Models\WikisModel;

class HomeController{

    public function gethome(){
        $wikis = new WikisModel;
        $allWikis = $wikis->getwikis(); 
        
       
        require_once __DIR__.'/../../Views/home.php';
    }
}