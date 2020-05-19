<?php 

class Chart extends QueryBuilder {

	public function userGetAllFromChart($id)
	{
		$sql = "SELECT chart.id,chart.product_id,chart.title,chart.description,chart.img,chart.product_num,chart.price,chart.quantity,chart.user_id,chart.created_at FROM chart INNER JOIN users ON chart.user_id=users.id WHERE chart.user_id='$id'";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);

	}

	public function addProductToChart($user_id)
	{
		if (isset($_SESSION['loggedUser'])) {

			$product_id = $_POST['id'];
			$title = $_POST['title'];
			$description = $_POST['description'];
			$img = $_POST['img'];
			$product_num = $_POST['product_num'];
			$price = $_POST['price'];
			$quantity = $_POST['chart_product_quantity'];
			$user_id = $_SESSION['loggedUser']->id;
			$createdAt = date('Y-m-d');

			$sql = "SELECT chart.id,chart.product_id,chart.title,chart.description,chart.img,chart.product_num,chart.price,chart.quantity,chart.user_id,chart.created_at FROM chart INNER JOIN users ON chart.user_id=users.id WHERE chart.user_id='$user_id'";
			$query = $this->db->prepare($sql);
			$query->execute();
			$user_all_products_from_cart = $query->fetchAll(PDO::FETCH_OBJ);

			foreach ($user_all_products_from_cart as $one_product) {
				if ($one_product->product_id == $product_id) {

					$sql = "UPDATE chart SET chart.quantity=? WHERE chart.id=?";
					$query = $this->db->prepare($sql);
					$query->execute([$one_product->quantity+$quantity,$one_product->id]);

					if ($query) {
						if (isset($_POST['add_to_chart_btn'])) {
							header("Location: fresh_juices.php");
						}else{
							header("Location: add_product_to_chart.php");
						}
						exit;
					} else {
						var_dump('Nije uspeo update!');
					}

				}
			}

			$sql = "INSERT INTO chart VALUES (NULL,?,?,?,?,?,?,?,?,?)";
			$query = $this->db->prepare($sql);
			$query->execute([$product_id,$title,$description,$img,$product_num,$price,$quantity,$user_id,$createdAt]);

			if ($query) {
				header("Location: fresh_juices.php");
			} else {
				var_dump('Greska');
			}
			
		}else{
			header("Location: login_register.php");
		}
	}

	public function updateProductInChart()
	{

			$id = $_POST['id'];
			// $product_id = $_POST['product_id'];
			// $title = $_POST['title'];
			// $description = $_POST['description'];
			// $img = $_POST['img'];
			// $product_num = $_POST['product_num'];
			// $price = $_POST['price'];
			$quantity = $_POST['chart_product_quantity'];
			$user_id = $_SESSION['loggedUser']->id;
			$createdAt = date('Y-m-d');

			$sql = "UPDATE chart SET chart.quantity=? WHERE chart.id=?";
			$query = $this->db->prepare($sql);
			$query->execute([$quantity,$id]);

			if ($query) {
				header("Location: add_product_to_chart.php");
			} else {
				var_dump('Doslo je do greske!');
			}

	}

	public function removeProductFromChart($product_of_chart_id)
	{			
		$sql = "DELETE FROM chart WHERE id = ?";
		$query = $this->db->prepare($sql);
		$query->execute([$product_of_chart_id]);

	}

	public function deleteProductsFromChart($user_id)//e-mail success make delete
	{			
		$sql = "DELETE FROM chart WHERE user_id = ?";
		$query = $this->db->prepare($sql);
		$query->execute([$user_id]);

	}


}