<?php
namespace app\Models;
use app\config\DataBase;
USE PDO;
class WikisModel {

   
    protected $db;
    public function __construct() {
        
        $this->db = DataBase::getInstance()->getConnection();

    }
    public function getwikis(){
        $query = "SELECT w.id, w.titre, c.nom, w.contenu FROM wikis w INNER JOIN categories c ON w.id_categorie = c.id WHERE w.statue = 1 LIMIT 6";  
         $stm = $this->db->prepare($query);
        $stm->execute();
        
       
        $res = $stm->fetchAll(PDO::FETCH_ASSOC);
      
        return($res);
    }
    public function searchwikis($input){
        $query = "SELECT w.id, w.titre, c.nom, w.contenu
        FROM wikis w
        INNER JOIN categories c ON w.id_categorie = c.id
        WHERE w.titre LIKE '%{$input}%' AND w.statue = 1
        LIMIT 6;
        ";  
         $stm = $this->db->prepare($query);
        $stm->execute();
        
       
        $res = $stm->fetchAll(PDO::FETCH_ASSOC);
      
        return($res);
    }


    public function getWiki($id){
            $query = "SELECT w.id, w.titre, c.nom, w.contenu, u.nom FROM wikis w INNER JOIN categories c ON w.id_categorie = c.id INNER JOIN users u
            on u.id = w.id_user WHERE w.id=$id";
            $stm = $this->db->prepare($query);
            $stm->execute();
            $res = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $res[0];
    }

    
}
