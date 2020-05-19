<?php 

require_once 'bootstrap.php';

$products = $product->selectAll('products');

if (isset($_SESSION['loggedUser'])) {
	$products_of_chart = $chart->userGetAllFromChart($_SESSION['loggedUser']->id);
}

if (isset($_GET['id'])) {
	$single_product = $product->getOneProduct($_GET['id']);
}

require_once 'views/singl_product.view.php';

 ?>