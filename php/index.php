<?php
/**
 * Created by PhpStorm.
 * User: alexfront
 * Date: 21/12/2017
 * Time: 10:38
 */
$nombre_clase = 'cs_users';
spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});
include_once 'config.php';

$params = $_POST;
$user = new cs_users();
$response = $user->checkUser($params);

if ($response == 'success') {
	$response_array['status'] = 'success';
} else {
	$response_array['status'] = 'error';
}

header('Content-type: application/json');
die(json_encode(array('response' => $response_array, 'code' => 200)));
