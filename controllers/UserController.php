<?php

require_once ROOT  . "/models/UserInfo.php";

class UserController{
    public function actionUser(){
        $listUser = array();
        $listUser = UserInfo::getUser();
        require_once (ROOT ."/views/alluser.php");
        return true;
    }
}

