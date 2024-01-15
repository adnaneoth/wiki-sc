<?php
namespace app\Controllers;
use app\Models\WikisModel;

class HomeController{

    public function gethome(){
        $wikis = new WikisModel;
        $allWikis = $wikis->getwikis(); 
        require_once __DIR__.'/../../Views/home.php';
    }
    
    public function wikishow(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $wikiModel = new WikisModel();
            $wiki = $wikiModel->getWiki($id);
            require_once __DIR__.'/../../Views/wikishow.php';
        }
    }
    public function search($input){
     
        $wikis = new WikisModel;
        if ($input == "all"){
            $allWikis = $wikis->getwikis();
            require_once __DIR__.'/../../public/search.php';

 
        }else{
           $allWikis= $wikis->searchwikis($input);
           require_once __DIR__.'/../../public/search.php';
        }

    }
}