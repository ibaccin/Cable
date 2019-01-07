<?php

require_once("core/baseController.php");
require_once("models/studentModel.php");

class homeController extends Controller
{
    public function indexAction()
    {
        $this->renderView("views/home/index.php");
    }
    //for create
    public function createAction()
    {
        $student = new studentModel();
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $this->renderView("views/home/create.php");
        }
        else
        {
            if($student->tryMap($_POST))
            {
                $student->insert();
                header('Location: /home/students');
            }
        }
    }
    //for select
    public function studentsAction()
    {
        $studList = studentModel::selectAll();
        $this->renderView("views/home/students.php", $studList);
        if($_SERVER["REQUEST_METHOD"] == "POST" &&
            isset($_POST["id"]) == TRUE)
            {
                $student = new studentModel();
                $student->deleteStudent($_POST["id"]);
            }
    }
    //for delete
    public function deleteAction()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $id = $_POST["id"];
            $tryDel = studentModel::deleteStudent($id);
            header('Location: /home/students');
        }
    }

    //for upgrade
    public function upgradeAction()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $id = $_POST["id"];
            $tryUp = studentModel::searchUpStudent($id);
            $this->renderView("views/home/upgrade.php", $tryUp);
        }
    }
    public function toUpAction()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $tryUp = studentModel::upgradeStudent($_POST);
            header('Location: /home/students');
        }
    }

    //
}