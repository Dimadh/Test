<?php

require_once ROOT . "/models/UserInfo.php";
require_once  ROOT . '/models/UsersRegister.php';

class IndexController{

    
    public function actionIndex(){
        
        $listRegion=array();
        $listRegion=UsersRegister::getRegion();

        require_once (ROOT ."/views/index.php");
        return true;
    }
    
    public function actionView(){
        require_once (ROOT . '/views/table.php');
    }

    public function actionSearchCity(){
        if ($_POST['id']) {
            $id = $_POST['id'];
            
            $listCity=UsersRegister::getCity($id);
        }

    }

    public function actionSearchDistrict(){
        if ($_POST['id']) {
            $id = $_POST['id'];

            $listCity=UsersRegister::getDistict($id);
        }

    }
    public function actionAddToBase(){

        require_once (ROOT . "/views/index.php");

        if (isset($_POST['signUp'])) {
            $login = trim($_POST['login']);
            $email = trim($_POST['email']);
            $region = trim($_POST['region']);
            $city = trim($_POST['city']);
            $district = trim($_POST['district']);

            UserInfo::setUser($login,$email,$region,$city,$district);
        }
    }
}