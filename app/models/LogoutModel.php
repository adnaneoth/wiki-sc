<?php  
namespace app\Models;
use app\config\DataBase;
session_start();

class LogoutModel{
    private $db;
    public function __construct()
    {
        $this->db= DataBase::getInstance()->getConnection();
    }

    public function logout(){
 
        session_start();
        session_destroy();
    }
}