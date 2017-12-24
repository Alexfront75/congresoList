<?php

/**
 * Created by PhpStorm.
 * User: alexfront
 * Date: 21/12/2017
 * Time: 13:23
 */
include_once 'database.php';
class cs_customers
{
	public function getFullList()
	{
		$conn = new database();
		$sql = "SELECT * FROM cs_customers WHERE active = 1";
		$rows = $conn->launchQuery($sql);
		return $rows;
	}

	public function deleteCustomer($id_customer)
	{
		$conn = new database();
		$sql = "UPDATE cs_customers SET active=0, date_upd = NOW() WHERE id_customer=" . $id_customer;
		$rows = $conn->updateQuery($sql);
		return $rows;
	}

	public function addCustomer($params)
	{
		$name=$params['nameCustomer'];
		$surname=$params['surnameCustomer'];
		$email=$params['emailCustomer'];
		$address=$params['addressCustomer'];
		$origin=$params['originCustomer'];
		$partner=$params['partnerCustomer'];
		$meetings=$params['meetingCustomer'];

		$conn = new database();
		$sql = "INSERT INTO cs_customers (name, surname, email, address, origin, partner, meetings) VALUES 
		(" . "'" . $name . "'" . ", " . "'" . $surname . "'" . ", " . "'" . $email . "'" . ",  " . "'" . $address . "'" .
			",  " . "'" . $origin . "'" . ",  " . "'" . $partner . "'" . ",  " . "'" . $meetings . "'" . ")";
		$rows = $conn->updateQuery($sql);
		return $rows;
	}

	public function updateCustomer()
	{

	}

	public function sendEmail()
	{

	}
}