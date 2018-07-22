<?php

class Db 
{
    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/dbconection.php';
        $params = include($paramsPath);
            $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
            $dbh = new PDO($dsn, $params['user'], $params['password']);
            $dbh->exec("set names utf8");
        return $dbh;
    }
}