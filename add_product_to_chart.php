<?php 

require_once "bootstrap.php";

if (!isset($_SESSION['loggedUser']) || $_SESSION['loggedUser']->privilege == 'a') {
	header('Location: index.php');
}

$products = $product->selectAll('products');

$products_of_wish_list = $wish->userGetAllFromWish($_SESSION['loggedUser']->id);

if (isset($_POST['add_to_chart_btn'])) {
	$chart->addProductToChart($_SESSION['loggedUser']->id);
}

if (isset($_POST['update_chart_btn'])) {
	$chart->updateProductInChart();
}

if (isset($_GET['id'])) {
	$chart->removeProductFromChart($_GET['id']);
}

if (isset($_GET['wish_id'])) {
	$wish->deleteWish($_GET['wish_id']);
	header('Location: add_product_to_chart.php');
}

$products_of_chart = $chart->userGetAllFromChart($_SESSION['loggedUser']->id);

require_once 'views/add_product_to_chart.view.php';

 ?>