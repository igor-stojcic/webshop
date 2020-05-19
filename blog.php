<?php 

require_once "bootstrap.php";

$products = $product->selectAll('products');

if (isset($_SESSION['loggedUser'])) {
	$products_of_chart = $chart->userGetAllFromChart($_SESSION['loggedUser']->id);
}

if (isset($_GET['id']) && $_SESSION['loggedUser']->privilege == 'a') {
	$post->deletePost($_GET['id']);
}

$posts = array_reverse($post->selectAll('blog'));

require_once 'views/blog.view.php';
