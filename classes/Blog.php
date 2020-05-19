<?php 

class Blog extends QueryBuilder {

	public function deletePost($id)
	{			
		$sql = "DELETE FROM blog WHERE id = ?";
		$query = $this->db->prepare($sql);
		$query->execute([$id]);

		if ($query) {
			header('Location: blog.php');
		}
	}

}