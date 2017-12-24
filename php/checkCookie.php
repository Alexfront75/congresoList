<?php
/**
 * Created by PhpStorm.
 * User: alexfront
 * Date: 21/12/2017
 * Time: 0:07
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "congreso";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM cs_users WHERE id_user=' . $_COOKIE["value"] . ' ';
$result = $conn->query($sql);
$row = $result->fetch_assoc();
hash($row['password'] . $_POST['email'], 'The quick brown fox jumped over the lazy dog.');