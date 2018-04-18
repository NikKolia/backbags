<?php
	require_once "start.php";
	
	require_once "manage_class.php";
	require_once "url_class.php";
	
	$manage = new Manage();
	$url = new URL();
	$func = $_REQUEST["func"];
	if ($func == "add_cart") {
		$success = $manage->addCart();
	}
	elseif ($func == "comment") {
		$success = $manage->addComments();
	}
	elseif ($func == "delete_cart") {
		$manage->deleteCart();
	}
	elseif ($func == "cart") {
		$manage->updateCart();
	}
	elseif ($func == "order") {
		$success = $manage->addOrder();
	}
	elseif ($func == "status_pay") {
		$success = $manage->statusPay();
	}
	else exit;
	if ($success) {
		$link = $url->message();
	}
	else {
		$link = ($_SERVER["HTTP_REFERER"] != "")? $_SERVER["HTTP_REFERER"]: $url->index();
	}
	header("Location: $link");
	exit;
?>