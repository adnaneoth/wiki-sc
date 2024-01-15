<?php
namespace app\Models;

use app\config\DataBase;
use PDO;

class AuthModel
{
    private $db;
    public function __construct()
    {
        $this->db = DataBase::getInstance()->getConnection();
    }
    public function getallwikis($id)
    {

        $query = "SELECT w.*, c.nom as nom FROM wikis w INNER JOIN categories c ON w.id_categorie = c.id WHERE w.id_user=$id";
        $stm = $this->db->prepare($query);
        $stm->execute();
        $records = $stm->fetchAll(PDO::FETCH_ASSOC);

        return ($records);
    }
}