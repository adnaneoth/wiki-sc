<?php
namespace app\Models;

use app\config\DataBase;
use PDO;

class SignupModel {
    private $db;

    public function __construct() {
        $this->db = DataBase::getInstance()->getConnection();
    }
    public function registerUser($nom, $email, $password) {

        $sql = $this->db->prepare("INSERT INTO users (nom, email, password, role) VALUES (?, ?, ?, 0)");

        $sql->bindParam(1, $nom, PDO::PARAM_STR);
        $sql->bindParam(2, $email, PDO::PARAM_STR);
        $sql->bindParam(3, $password, PDO::PARAM_STR);

        $result = $sql->execute();
    }


}