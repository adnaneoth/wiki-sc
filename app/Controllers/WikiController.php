<?php
namespace app\Controllers;

use app\Models\WikisModel;

class WikiController
{
    function addWiki()
    {
        $tags = $_POST["tags"];
        unset($_POST["tags"]); 
        $wiki = new WikisModel;
        $wiki->insert($_POST);
        $lastIdInserted = $wiki->getDb()->lastInsertId();
        $status = true ;
        foreach($tags as $tag){ 
             if(!$wiki->insertTags( $lastIdInserted,$tags)) $status =false;
        
        }
        if($status) echo "succes";
        else echo "error";
       
    }

    

}