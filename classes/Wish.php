<?php 

class Wish extends QueryBuilder {

	public $wish_exist = NULL;

	public function userGetAllFromWish($id)
	{
		$sql = "SELECT wish_list.id, wish_list.product_id, wish_list.img, wish_list.user_id FROM wish_list INNER JOIN users ON wish_list.user_id=users.id WHERE wish_list.user_id='$id'";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	public function addWish($product_id,$img)
	{
		if (isset($_SESSION['loggedUser'])) {
			$wish_exist = NULL;

			$product_id;
			$img;
			$user_id = $_SESSION['loggedUser']->id;

			$sql = "SELECT wish_list.id, wish_list.product_id, wish_list.img, wish_list.user_id FROM wish_list INNER JOIN users ON wish_list.user_id=users.id WHERE wish_list.user_id='$user_id'";
			$query = $this->db->prepare($sql);
			$query->execute();
			$user_all_from_wish_list = $query->fetchAll(PDO::FETCH_OBJ);

			$wish_counter = 0;

			foreach ($user_all_from_wish_list as $one_wish) {
				if ($one_wish->product_id == $product_id) {
					$wish_counter++;
				}
			}

			if ($wish_counter == 0) {
				$sql = "INSERT INTO wish_list VALUES (NULL,?,?,?)";
				$query = $this->db->prepare($sql);
				$query->execute([$product_id,$img,$user_id]);

				if ($query) {
					$this->wish_exist = true;
				}else{
					header("Location: error.php");
				}

			}

		}else{
			header("Location: login_register.php");
		}

	}

	public function deleteWish($id)
	{			
		$sql = "DELETE FROM wish_list WHERE id = ?";
		$query = $this->db->prepare($sql);
		$query->execute([$id]);
	}

}