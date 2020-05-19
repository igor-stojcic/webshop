<?php 

session_start();

$config = require 'config.php';

require 'classes/Connection.php';

$db = Connection::connect($config['database']);

require 'classes/QueryBuilder.php';
require 'classes/User.php';
require 'classes/Product.php';
require 'classes/Chart.php';
require 'classes/Blog.php';
require 'classes/Wish.php';

$query = new QueryBuilder($db);
$user = new User($db);
$product = new Product($db);
$chart = new Chart($db);
$post = new Blog($db);
$wish = new Wish($db);

 ?>