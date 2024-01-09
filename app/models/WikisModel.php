<?php
namespace app\Models;
use app\config\DataBase;
USE PDO;
class WikisModel extends DataBase{

    public function getwikis(){
        $query = "SELECT w.titre , c.nom ,w.contenu FROM wikis w  inner JOIN categories c where w.id_categorie = c.id limit 6";
        $stm = $this->getConnection()->query($query);
        
       
        $res = $stm->fetchAll(PDO::FETCH_ASSOC);
      
        return($res);
    }
}
