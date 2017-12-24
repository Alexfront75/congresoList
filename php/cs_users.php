<?php

/**
 * Created by PhpStorm.
 * User: alexfront
 * Date: 21/12/2017
 * Time: 10:26
 */

include_once 'database.php';
class cs_users
{

    public function checkUser($params)
    {

		$email = $_POST["email"];
        $conn = new database();
		$sql = "SELECT * FROM cs_users WHERE email ='" . $email . "'";
		$rows = $conn->launchQuery($sql);


		if (count($rows) > 0) {
			if ($rows[0][1] == $_POST['email'] && $rows[0][2] == $_POST['password']) {
				$cookie_name = "user";
				$cookie_id_user = $rows[0][0];
				$cookie_value = $cookie_id_user ;
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
				return 'success';
			} else{
				return 'error';
			}
		} else {
			return 'error';
		}

    }

    public function createUser()
    {

    }

    public function updateUser()
    {

    }

    public function deleteUser()
    {

    }

    public function checkCookie()
    {

    }
}