<?php 

require_once "bootstrap.php";

if (!isset($_SESSION['loggedUser']) || $_SESSION['loggedUser']->privilege != 'a') {
	header('Location: login_register.php');
}

$products = $product->selectAll('products');

if ($_SESSION['loggedUser']->privilege != 'a') {
	header('Location: index.php');
}

$success_add_juice = '';
if (isset($_POST['addFreshJuiceBtn'])) {
	$success_add_juice = $product->addProduct();
}

$success_add_post = '';
if (isset($_POST['addPostToBlogBtn'])) {
	$success_add_post = $product->addBlog();
}

require_once "views/admin_upload.view.php";

 ?>