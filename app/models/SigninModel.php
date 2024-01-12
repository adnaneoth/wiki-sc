<?php 
namespace app\Models;
use app\config\DataBase;
use PDO;

class SigninModel{
    private $db;

    public function __construct() {
        $this->db = DataBase::getInstance()->getConnection();
    }

    public function login($email, $password){
      
            $sql = $this->db->prepare("SELECT id,nom, email, password, role FROM users WHERE email = :email and password = :password");  
            $sql->bindParam(':email', $email, PDO::PARAM_STR);
            $sql->bindParam(':password', $password, PDO::PARAM_STR);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            session_start();
 
            $_SESSION['id'] = $result['id'];
            $_SESSION['nom'] = $result['nom'];
            $_SESSION['role'] = $result['role'];
           
            $_SESSION['email'] = $result['email'];
            return !empty($result) ? $result : false;
        
    }
}