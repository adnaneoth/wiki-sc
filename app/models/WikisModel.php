<?php
namespace app\Models;

use app\config\DataBase;
use PDO;
use PDOException;
use PDOStatement;

class WikisModel
{


    protected $db;
    public function __construct()
    {

        $this->db = DataBase::getInstance()->getConnection();

    }
    public function getwikis()
    {
        $query = "SELECT w.id, w.titre, c.nom, w.contenu FROM wikis w INNER JOIN categories c ON w.id_categorie = c.id WHERE w.statue = 1 LIMIT 6";
        $stm = $this->db->prepare($query);
        $stm->execute();


        $res = $stm->fetchAll(PDO::FETCH_ASSOC);

        return ($res);
    }
    public function searchwikis($input)
    {
        $query = "SELECT w.id, w.titre, c.nom, w.contenu
        FROM wikis w
        INNER JOIN categories c ON w.id_categorie = c.id
        WHERE w.titre LIKE '%{$input}%' AND w.statue = 1
        LIMIT 6;
        ";
        $stm = $this->db->prepare($query);
        $stm->execute();


        $res = $stm->fetchAll(PDO::FETCH_ASSOC);

        return ($res);
    }

    public function getWiki($id)
    {
        $query = "SELECT w.id, w.titre, c.nom, w.contenu, u.nom FROM wikis w INNER JOIN categories c ON w.id_categorie = c.id INNER JOIN users u
            on u.id = w.id_user WHERE w.id=$id";
        $stm = $this->db->prepare($query);
        $stm->execute();
        $res = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $res[0];
    }

    public function addWiki($titre,$contenu,$categorie,$id,$tags)
    {
        $query = $this->db->prepare("INSERT INTO wikis( titre, contenu, statue, id_categorie, id_user)  VALUES(:titre, :contenu, :isAccepted, :id_categorie, :id_user)");
        $query->bindValue(':titre', $titre);
        $query->bindValue(':contenu', $contenu);
        $query->bindValue(':id_categorie', $categorie);
        $query->bindValue(':id_user',$id);
        $query->bindValue(':isAccepted', 0);
        $query->execute();

        
        $lastInsertId = $this->db->lastInsertId();
        foreach($tags as $tag):
        $query = $this->db->prepare("INSERT INTO wikitags( id_wiki, id_tag)   VALUES($lastInsertId,:tag)");
        $query->bindValue(':tag', $tag);
        $res = $query->execute();
        endforeach;
        return $res;
    }

    function insertTags($idwiki,$idTag){
                $sql ="INSERT INTO `wikitags`( `id_wiki`, `id_tag`) VALUES ($idwiki,$idTag)";

               return $stmt = $this->db->query($sql);

    }


}
