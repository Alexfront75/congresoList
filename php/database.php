<?php
/**
 * Created by PhpStorm.
 * User: alexfront
 * Date: 21/12/2017
 * Time: 12:11
 */
class database
{
	public function launchQuery($sql)
	{
		$conn = new MySQLi('localhost', 'root','', 'congreso');
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$result = $conn->query($sql);
		$row = $result->fetch_all();
		$conn->close();
		return $row;
	}

	public function updateQuery($sql)
	{
		$conn = new MySQLi('localhost', 'root','', 'congreso');
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$result = $conn->query($sql);
		$conn->close();
		return true;
	}

}