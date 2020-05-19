<?php require_once "partials/top.php"; ?>
<?php require_once "partials/nav.php"; ?>

<div id="top-of-page" class="container forms-style">
	<div class="row">
		<div class="col-sm-6 mb-5 w3-animate-bottom">
			<h4 class="mb-3 font-weight-bolder">Logovanje</h4>
			<small>Već imate otvoren nalog kod nas? Ulogujte se.</small>
			<form action="login_register.php" method="POST">
				<small class="text-danger"><?php echo $error_login_email; ?></small>
				<input type="email" name="login_email" placeholder="Vaš E-mail" value="<?php echo isset($_POST['login_email'])?$_POST['login_email']:''; ?>" class="form-control mb-2">
				<small class="text-danger"><?php echo $error_login_password; ?></small>
				<input type="password" name="login_password" placeholder="password" class="form-control mb-2">
				<button class="btn btn-primary form-control" name="loginBtn">Ulogujte se</button>
				<?php if($user->loggedUser): ?>
					<div class="alert alert-success text-center mb-n2">Uspešno logovanje! Idi na <a href="fresh_juices.php" class="text-decoration-none text-warning">Web-Shop</a></div>
				<?php elseif(isset($_POST['loginBtn']) && ($error_login_email == '' && $error_login_password == '')): ?>
					<div class="alert alert-danger text-center pb-0 mb-n2" style="line-height:1px;"><p>E-mail ili password pogrešni.</p><p><small><a href="forgot_password.php" class="text-decoration-none text-primary">Zaboravili ste password?</a></small></p></div>
				<?php endif; ?>
			</form>
			<img src="img/log_reg.jpg" alt="raspberry" height="auto" width="100%">
		</div>
		
		<div class="col-sm-6 mb-5 w3-animate-bottom">
			<h4 class="mb-3 font-weight-bolder">Registracija</h4>
			<small>Još uvek niste naš <span class="text-danger">VIP</span> član? Registrujte se.</small>
			<form action="login_register.php" method="POST">
				<small class="text-danger"><?php echo $error_first_name; ?></small>
				<input type="text" name="register_first_name" placeholder="Ime" value="<?php echo isset($_POST['register_first_name'])?$_POST['register_first_name']:''; ?>" class="form-control mb-2" >
				<small class="text-danger"><?php echo $error_last_name; ?></small>
				<input type="text" name="register_last_name" placeholder="Prezime" value="<?php echo isset($_POST['register_last_name'])?$_POST['register_last_name']:''; ?>" class="form-control mb-2" >
				<small class="text-danger"><?php echo $error_street; ?></small>
				<input type="text" name="register_street" placeholder="Adresa (ulica i broj)" value="<?php echo isset($_POST['register_street'])?$_POST['register_street']:''; ?>" class="form-control mb-2" >
				<small class="text-danger"><?php echo $error_city; ?></small>
				<input type="text" name="register_city" placeholder="Grad" value="<?php echo isset($_POST['register_city'])?$_POST['register_city']:''; ?>" class="form-control mb-2" >
				<small class="text-danger"><?php echo $error_zip; ?></small>
				<input type="number" name="register_zip" placeholder="Poštanski broj" value="<?php echo isset($_POST['register_zip'])?$_POST['register_zip']:''; ?>" class="form-control mb-2" >
				<small class="text-danger"><?php echo $error_phone; ?></small>
				<input type="tel" name="register_phone" placeholder="Br. telefona" value="<?php echo isset($_POST['register_phone'])?$_POST['register_phone']:''; ?>" class="form-control mb-2" >
				<small class="text-danger"><?php echo $error_email; ?></small>
				<input type="email" name="register_email" placeholder="Vaš E-mail" value="<?php echo isset($_POST['register_email'])?$_POST['register_email']:''; ?>" class="form-control mb-2" >
				<small class="text-danger"><?php echo $error_password; ?></small>
				<input type="password" name="register_password_1" placeholder="password" class="form-control mb-2" >
				<small class="text-danger"><?php echo $error_password; ?></small>
				<input type="password" name="register_password_2" placeholder="Ponovite password" class="form-control mb-2" >
				
				<button class="btn btn-warning form-control" name="registerBtn">Registrujte se</button>
				<?php if ($user->register_result): ?>
					<div class="alert alert-success text-center">Uspešna registracija. Ulogujte se!</div>
				<?php elseif($user->register_exist): ?>
					<div class="alert alert-danger text-center">Korisnik sa datom Email adresom već postoji u bazi. Pokušajte da se ulogujete, a ako ste izgubili password <span><a href="forgot_password.php" class="text-decoration-none text-primary">zatražite novi!</a></span></div>
				<?php elseif(isset($_POST['registerBtn'])): ?>
					<div class="alert alert-danger text-center">Niste ispravno popunili formu!</div>
				<?php endif; ?>
			</form>
		</div>
	</div>
</div>

<?php require_once "partials/bottom.php"; ?>