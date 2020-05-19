<?php 

class Product extends QueryBuilder {

	public $addProductStatus = NULL;
	public $editProductStatus = NULL;

	public function addProduct()
	{
		
		try{
	        $title = $_POST['title'];
			$description = $_POST['description'];
			$product_num = $_POST['product_num'];
			$price = $_POST['price'];

	        $query=$this->db->prepare("show table status like 'products'");
	        $query->execute();
	        $result=$query->fetchAll();
	        foreach($result as $row)
	        $new_id=$row[10];

	        $up_file=$_FILES["img"]["name"];

	        $file_basename=substr($up_file, 0 , strripos($up_file, "."));
	        $file_ext=substr($up_file, strripos($up_file, ".")); 
	        $f1="$new_id".$file_ext;

	        if(($file_ext!=".png")&&($file_ext!=".jpg")&&($file_ext!=".jpeg")&&($file_ext!=".gif"))
	        {
	            throw new Exception("Only jpg, png, jpeg or gif are allow to upload / Empty Logo Field");
	        }
	        move_uploaded_file($_FILES["img"]["tmp_name"],"upload/".$up_file);

	        $sql = "INSERT INTO products VALUES (NULL,?,?,?,?,?)";
			$query = $this->db->prepare($sql);
			$query->execute([$title,$description,$up_file,$product_num,$price]);

			if ($query) {
				return true;
			}else{
				return false;
			}
	    }
	    catch(Exception $e)
	    {
	        $msg=$e->getMessage();
	    }

	}

	public function addBlog()
	{
		
		try{
	        $title = $_POST['title'];
			$description1 = $_POST['description1'];
			$description2 = $_POST['description2'];
			$description3 = $_POST['description3'];
			$created_at = date('Y-m-d H:i');

	        $query=$this->db->prepare("show table status like 'blog'");
	        $query->execute();
	        $result=$query->fetchAll();
	        foreach($result as $row)
	        $new_id=$row[10];

	        $up_file=$_FILES["img"]["name"];

	        $file_basename=substr($up_file, 0 , strripos($up_file, "."));
	        $file_ext=substr($up_file, strripos($up_file, ".")); 
	        $f1="$new_id".$file_ext;

	        if(($file_ext!=".png")&&($file_ext!=".jpg")&&($file_ext!=".jpeg")&&($file_ext!=".gif"))
	        {
	            throw new Exception("Only jpg, png, jpeg or gif are allow to upload / Empty Logo Field");
	        }
	        move_uploaded_file($_FILES["img"]["tmp_name"],"img/blog/".$up_file);

	        $sql = "INSERT INTO blog VALUES (NULL,?,?,?,?,?,?)";
			$query = $this->db->prepare($sql);
			$query->execute([$title,$description1,$description2,$description3,$up_file,$created_at]);

			if ($query) {
				return true;
			}else{
				return false;
			}
	    }
	    catch(Exception $e)
	    {
	        $msg=$e->getMessage();
	    }

	}

	public function deleteProduct($id)
	{			
		$sql = "DELETE FROM products WHERE id = ?";
		$query = $this->db->prepare($sql);
		$query->execute([$id]);
	}

	public function getOneProduct($id)
	{
		$sql = "SELECT * FROM products WHERE id = ?";
		$query = $this->db->prepare($sql);
		$query->execute([$id]);
		return $query->fetch(PDO::FETCH_OBJ);
	}
	
	public function editProduct()
	{			

		try{
			$id = $_POST['id'];
			$title = $_POST['title'];
			$description = $_POST['description'];
			$img = $_POST['img'];
			$product_num = $_POST['product_num'];
			$price = $_POST['price'];

			$sql = "UPDATE products SET products.title=?, products.description=?, products.img=?, products.product_num=?, products.price=? WHERE products.id=$id";
			$query = $this->db->prepare($sql);
			$query->execute([$title,$description,$img,$product_num,$price]);
			header('Location: singl_product.php?id='.$id);
		}
	    catch(Exception $e)
	    {
	        $msg=$e->getMessage();
	    }
	}
		
}