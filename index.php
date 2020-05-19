<?php 

require_once 'bootstrap.php';

$products = $product->selectAll('products');

if (isset($_SESSION['loggedUser'])) {
	$products_of_chart = $chart->userGetAllFromChart($_SESSION['loggedUser']->id);
}

require_once 'views/index.view.php';

 ?>