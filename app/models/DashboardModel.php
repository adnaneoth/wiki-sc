<?php
namespace app\Models;

use app\config\DataBase;
use PDO;

class DashboardModel
{
    private $db;
    public function __construct()
    {
        $this->db = DataBase::getInstance()->getConnection();
    }
    public function getallusers()
    {
        $query = "SELECT * FROM users";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return ($records);
    }
    public function getallwikis()
    {

        $query = "SELECT w.*, c.nom as nom FROM wikis w INNER JOIN categories c ON w.id_categorie = c.id WHERE w.statue = 0";
        $stm = $this->db->prepare($query);
        $stm->execute();
        $records = $stm->fetchAll(PDO::FETCH_ASSOC);

        return ($records);
    }


    public function getAlltags()
    {
        $query = "SELECT * FROM tags";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

    public function getAllcategories()
    {
        $query = "SELECT * FROM categories";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

    public function accept($id) {
        $stmt =  $this->db->prepare("update wikis set statue = 1 where id = $id");
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
           
    }


    public function delete($id)
    {

        $stmt = $this->db->prepare("delete from wikis where id = $id");
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}