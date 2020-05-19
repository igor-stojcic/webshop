<?php 

require_once 'bootstrap.php';

if (!isset($_SESSION['loggedUser']) || $_SESSION['loggedUser']->privilege != 'a') {
	header('Location: index.php');
}

$products = $product->selectAll('products');

if (isset($_GET['id'])) {
	$edit_product = $product->getOneProduct($_GET['id']);
}


if (isset($_POST['editBtn'])) {
	$product->editProduct();
	$edit_product = $product->getOneProduct($_POST['id']);
}

require_once 'views/edit.view.php';

 ?>