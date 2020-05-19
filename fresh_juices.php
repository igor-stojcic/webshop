<?php 

require_once 'bootstrap.php';

$products = $product->selectAll('products');

if (isset($_SESSION['loggedUser'])) {
	$products_of_chart = $chart->userGetAllFromChart($_SESSION['loggedUser']->id);
	$products_of_wish_list = $wish->userGetAllFromWish($_SESSION['loggedUser']->id);
}

if (isset($_GET['id']) && $_SESSION['loggedUser']->privilege == 'a') {
	$product->deleteProduct($_GET['id']);
	header('Location: fresh_juices.php');
}

if (isset($_GET['wish_id'])) {
	if (isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']->privilege != 'a') {
		$wish_exist = $wish->addWish($_GET['wish_id'],$_GET['wish_img']);
		header('Location: fresh_juices.php');
	}else{
		header('Location: login_register.php');
	}
	
}

if (isset($_GET['wish_delete_id']) && isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']->privilege != 'a') {
	$wish->deleteWish($_GET['wish_delete_id']);
	header('Location: fresh_juices.php');
}

require_once 'views/fresh_juices.view.php';

 ?>