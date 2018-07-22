<?php

class UsersRegister
{

    public static function getRegion()
    {
        $dbh = Db::getConnection();
        $countrySet = array();
        $resultSelect = $dbh->query('SELECT * from t_koatuu_tree WHERE ter_type_id = 0');
        $selectCountries = $resultSelect->fetchAll();
        return $selectCountries;
    }

    public static function getCity($id)
    {
        $dbh = Db::getConnection();

        $resultSelect = $dbh->query("SELECT * FROM t_koatuu_tree WHERE ter_pid = $id AND ter_type_id = 1");
        $selectCountries = $resultSelect->fetchAll();

        foreach ($selectCountries as $selectCountry) {
            echo "<option value = '" . $selectCountry['ter_id'] . "'>" . $selectCountry['ter_name'] . "</option>";
        }
    }

    public static function getDistict()
    {
        $dbh = Db::getConnection();
        if ($_POST['id']) {
            $id = $_POST['id'];

            if ($id == 0) {
                echo "<option>Select District</option>";
            } else {
                $resultSelect = $dbh->query("SELECT * FROM t_koatuu_tree WHERE ter_pid = $id AND ter_type_id = 2 ");
                $selectCountries = $resultSelect->fetchAll();


                foreach ($selectCountries as $selectCountry) {
                    echo "<option value = '" . $selectCountry['ter_id'] . "'>" . $selectCountry['ter_name'] . "</option>";
                }

            }
        }
    }
}
    