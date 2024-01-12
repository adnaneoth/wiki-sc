<?php
namespace app\Controllers;

use app\Models\SignupModel;
use app\Models\SigninModel;
use app\Models\LogoutModel;

class AuthController
{
    public function index()
    {
        require '../Views/signup.php';
    }
    public function signin()
    {
        include("../Views/signin.php");
    }
    public function signup()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $reg = new SignupModel();
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $reg->registerUser($nom, $email, $password);
            header("Location:./index.php?route=home");
        }
    }


    public function log()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {



            $email = $_POST['email'];
            $password = $_POST['password'];
            $signinModel = new SigninModel();

            $user = $signinModel->login($email, $password);

            if ($user) {

                if ($user['role'] == 1) {
                    header("Location:./index.php?route=dashboard");
                    
                    // echo $_SESSION['id'] .''. $_SESSION['nom'] .''. $_SESSION['role'] .''. $_SESSION['email'];
                } else {
                    header("Location:./index.php?route=home");
                }
            } else {
                header("Location:./index.php?route=signup");
            }
        }
    }

    public function logout(){
        $lo = new LogoutModel;
        $lo->logout();
        header("Location:./index.php?route=home");
        // echo $_SESSION['id'] .''. $_SESSION['nom'] .''. $_SESSION['role'] .''. $_SESSION['email'];

    }    

}