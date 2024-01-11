<?php
namespace app\Models ;
use app\config\DataBase;

class CategoriesModel {

    private $db;

    public function __construct()
    {
        $this->db =DataBase::getInstance()->getConnection();
    }
  
    public function addcategories($nom){
        $stmt =  $this->db->prepare("INSERT INTO categories (nom)
        VALUE (?)");
        $stmt->execute([$nom]);
       
    }
}
    