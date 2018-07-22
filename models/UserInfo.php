<?php


class UserInfo
{
    public static function setUser($login, $email, $region, $city, $district)
    {
        $dbh = Db::getConnection();

        //Checking login and password for uniqueness
        $checkLogin = "SELECT COUNT(login) AS login FROM users WHERE login = :login";
        $stmtLogin = $dbh->prepare($checkLogin);
        $stmtLogin->bindValue(':login', $login);
        $stmtLogin->execute();
        $rowLogin = $stmtLogin->fetch(PDO::FETCH_ASSOC);


        $checkEmail = "SELECT COUNT(email) AS email FROM users WHERE email = :email";
        $stmtEmail = $dbh->prepare($checkEmail);
        $stmtEmail->bindValue(':email', $email);
        $stmtEmail->execute();
        $rowEmail = $stmtEmail->fetch(PDO::FETCH_ASSOC);


        if ($rowLogin['login'] > 0) {
            $checkLogin = "SELECT * FROM users WHERE login = :login";
            $stmtLogin = $dbh->prepare($checkLogin);
            $stmtLogin->bindValue(':login', $login);
            $stmtLogin->execute();
            $rowLogin = $stmtLogin->fetch(PDO::FETCH_ASSOC);


            $userRegion = "SELECT ter_name FROM t_koatuu_tree WHERE ter_id = :region";
            $stmtRegion = $dbh->prepare($userRegion);
            $stmtRegion->bindValue(':region', $rowLogin['region']);
            $stmtRegion->execute();
            $rowRegion = $stmtRegion->fetch(PDO::FETCH_ASSOC);
            $rowLogin['region'] = $rowRegion['ter_name'];
            var_dump($rowRegion);

            $userCity = "SELECT ter_name FROM t_koatuu_tree WHERE ter_id = :city";
            $stmtCity = $dbh->prepare($userCity);
            $stmtCity->bindValue(':city', $rowLogin['city']);
            $stmtCity->execute();
            $rowCity = $stmtCity->fetch(PDO::FETCH_ASSOC);
            $rowLogin['city'] = $rowCity['ter_name'];

            $userDistrict = "SELECT ter_name FROM t_koatuu_tree WHERE ter_id = :district";
            $stmtDistrict = $dbh->prepare($userDistrict);
            $stmtDistrict->bindValue(':district', $rowLogin['district']);
            $stmtDistrict->execute();
            $rowDistrict = $stmtDistrict->fetch(PDO::FETCH_ASSOC);
            $rowLogin['district'] = $rowDistrict['ter_name'];
            
            print "<table>\n";
            print "<tr><th>Name</th><th>Email</th><th>Region</th><th>City</th><th>District</th></tr>\n";
            print "<tr><td>$rowLogin[login]</td><td>$rowLogin[email]</td><td>$rowLogin[region]</td><td>$rowLogin[city]</td><td>$rowLogin[district]</td><</tr>\n";
            print "</table>";

        } else if ($rowEmail['email'] > 0) {
            $checkLogin = "SELECT * FROM users WHERE email = :email";
            $stmtLogin = $dbh->prepare($checkLogin);
            $stmtLogin->bindValue(':email', $email);
            $stmtLogin->execute();
            $rowLogin = $stmtLogin->fetch(PDO::FETCH_ASSOC);


            $userRegion = "SELECT ter_name FROM t_koatuu_tree WHERE ter_id = :region";
            $stmtRegion = $dbh->prepare($userRegion);
            $stmtRegion->bindValue(':region', $rowLogin['region']);
            $stmtRegion->execute();
            $rowRegion = $stmtRegion->fetch(PDO::FETCH_ASSOC);
            $rowLogin['region'] = $rowRegion['ter_name'];
            

            $userCity = "SELECT ter_name FROM t_koatuu_tree WHERE ter_id = :city";
            $stmtCity = $dbh->prepare($userCity);
            $stmtCity->bindValue(':city', $rowLogin['city']);
            $stmtCity->execute();
            $rowCity = $stmtCity->fetch(PDO::FETCH_ASSOC);
            $rowLogin['city'] = $rowCity['ter_name'];



            $userDistrict = "SELECT ter_name FROM t_koatuu_tree WHERE ter_id = :district";
            $stmtDistrict = $dbh->prepare($userDistrict);
            $stmtDistrict->bindValue(':district', $rowLogin['district']);
            $stmtDistrict->execute();
            $rowDistrict = $stmtDistrict->fetch(PDO::FETCH_ASSOC);
            $rowLogin['district'] = $rowDistrict['ter_name'];



            print "<table>\n";
            print "<tr><th>Name</th><th>Email</th><th>Region</th><th>City</th><th>District</th></tr>\n";
            print "<tr><td>$rowLogin[login]</td><td>$rowLogin[email]</td><td>$rowLogin[region]</td><td>$rowLogin[city]</td><td>$rowLogin[district]</td><</tr>\n";
            print "</table>";
        } else {
            //Insert user to database
            $insertUser = $dbh->prepare("INSERT INTO users (login, email, region , city , district ) VALUES (?,?,?,?,?)");
            $insertUser->execute(array($login, $email, $region, $city, $district));
        }
    }
}