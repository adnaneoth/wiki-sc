<?php
namespace app\Controllers;

use app\Models\AuthModel;
use app\Models\DashboardModel;
use app\Models\SignupModel;
use app\Models\SigninModel;
use app\Models\LogoutModel;
use app\Models\WikisModel;

class AuthController
{

    public function signinauth(){

        session_start();
        $id = $_SESSION['id'];
        $wikis = new AuthModel;
        $wikis = $wikis->getallwikis($id);
        $Dashboard = new  DashboardModel();
        $categories = $Dashboard->getAllCategories();
        $tags = $Dashboard->getAlltags();
        include("../Views/authpage.php");
    }

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

    public function addWiki()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            session_start();
            $wiki = new WikisModel;
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];
            $categorie = $_POST['categorie'];
            $tags = $_POST['tags'];
            $id=$_SESSION['id'];
            // var_dump($tags);
            // die();
            $wiki->addWiki($titre,$contenu,$categorie,$id,$tags);

            require '../Views/authpage.php';

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
                    header("Location:./index.php?route=author");
                }
            } else {
                header("Location:./index.php?route=Signin");
            }
        }
    }

    public function logout()
    {
        $lo = new LogoutModel;
        $lo->logout();
        header("Location:./index.php?route=home");
        // echo $_SESSION['id'] .''. $_SESSION['nom'] .''. $_SESSION['role'] .''. $_SESSION['email'];

    }

}