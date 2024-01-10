<?php
namespace app\Controllers;

use app\Models\DashboardModel;
use app\Models\TagsModel;


class DashboardController
{
    public function index()
    {
        $users = new DashboardModel;
        $users = $users->getallusers();

        $wikis = new DashboardModel;
        $wikis = $wikis->getallwikis();

        $tags = new DashboardModel;
        $tags = $tags->getalltags();

        include "../Views/dashboard/dashboard.php";
    }

    public function accept()
    {
        $id = $_POST['id'];
        $wikis = new DashboardModel;
        $wikis = $wikis->accept($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


    public function delete()
    {
        $id = $_POST['id'];
        $wikis = new DashboardModel;
        $wikis->delete($id);
        header("Location:index.php?route=dashboard ");

    }

    public function addTags()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $tags = new TagsModel;
            $nom = $_POST['nom_tag'];
            $tags->addtags($nom);
            header("Location:index.php?route=dashboard ");

        }



    }
}