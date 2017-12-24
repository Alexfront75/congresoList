<?php
spl_autoload_register(function ($nombre_clase) {
	include $nombre_clase . '.php';
});

if ($_COOKIE['user']){
	$r = 0;
	switch ($_POST['method']) {
		case 'deleteCustomer':
			$list = new cs_customers();
			$response = $list->deleteCustomer($_POST['id_customer']);
			if (count($response) > 0){
				$response_array['status'] = 'success';
				header('Content-type: application/json');
				die(json_encode(array('response' => $response_array, 'code' => 200)));
			}
			break;
		case 'createCustomer':
			$list = new cs_customers();
			$response = $list->addCustomer($_POST);
			if ($response == true){
				$response_array['status'] = 'success';
				header('Content-type: application/json');
				die(json_encode(array('response' => $response_array, 'code' => 200)));
			}
			break;
	}


} elseif ($_COOKIE['name'] == 'admin') {

} else {
	$loginURL="index.html";
	echo ("<script>location.href='$loginURL'</script>");
}