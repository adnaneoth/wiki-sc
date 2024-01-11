<?php
namespace app\Models ;
use app\config\DataBase;
USE PDO;

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
   

    
        public function tagdelete($id) {
            $stmt = $this->db->prepare("DELETE FROM tags WHERE id = ?");
            $stmt->execute([$id]);
            
            header("Location: index.php?route=dashboard");
        }

        public function categoriedelete($id) {
            $stmt = $this->db->prepare("DELETE FROM categories WHERE id = ?");
            $stmt->execute([$id]);
            
            header("Location: index.php?route=dashboard");
        }
    
}
    