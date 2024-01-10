<?php
namespace app\Models ;
use app\config\DataBase;

class TagsModel {

    private $db;

    public function __construct()
    {
        $this->db =DataBase::getInstance()->getConnection();
    }
  
    public function addtags($nom){
        $stmt =  $this->db->prepare("INSERT INTO tags (nom)
        VALUE (?)");
        $stmt->execute([$nom]);
       
    }
}
    