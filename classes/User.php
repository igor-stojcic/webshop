<?php 

class User extends QueryBuilder {

	public $register_result = NULL;
	public $register_exist = NULL;
	public $loggedUser = NULL;
	public $userWithNewPass = NULL;
	public $dontHaveUser = NULL;

	public function registerUser()
	{
		$first_name = $_POST['register_first_name'];
		$last_name = $_POST['register_last_name'];
		$street = $_POST['register_street'];
		$city = $_POST['register_city'];
		$zip = $_POST['register_zip'];
		$phone = $_POST['register_phone'];
		$email = $_POST['register_email'];
		$password1 = $_POST['register_password_1'];
		$password2 = $_POST['register_password_2'];
		$privilege = 'u';


		$sql = "SELECT email FROM users WHERE email = ?";
		$query = $this->db->prepare($sql);
		$query->execute([$email]);
		$exist_check = $query->fetch(PDO::FETCH_BOUND);

		if ($exist_check) {
			$this->register_exist = true;
		}else{
			if ($password1 == $password2) {
				$password = $password1;

				$sql = "INSERT INTO users VALUES(NULL,?,?,?,?,?,?,?,?,?)";
				$query = $this->db->prepare($sql);
				$query->execute([$first_name,$last_name,$street,$city,$zip,$phone,$email,$password,$privilege]);

				if ($query) {
					$this->register_result = true;
				}
			}else {
				$this->register_result = false;
			}
		}

	}

	public function logUser()
	{
		$email = $_POST['login_email'];		
		$password = $_POST['login_password'];
		
		$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
		$query = $this->db->prepare($sql);
		$query->execute([$email,$password]);
		$loggedUser = $query->fetch(PDO::FETCH_OBJ); 

		if ($loggedUser != NULL) {
			$_SESSION['loggedUser'] = $loggedUser;
			$this->loggedUser = $loggedUser;
		}
	}

	public function getNewPass()
	{
		$email = $_POST['forgot_email'];

		$sql = "SELECT first_name, email, password FROM users WHERE email = ?";
		$query = $this->db->prepare($sql);
		$query->execute([$email]);
		$userWithNewPass = $query->fetch(PDO::FETCH_OBJ); 

		if ($userWithNewPass != NULL) {
			$this->userWithNewPass = $userWithNewPass;
		}else{
			$this->dontHaveUser = true;
		}
	}

}

