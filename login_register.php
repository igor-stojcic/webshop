<?php 

require_once "bootstrap.php";
require_once "validation/formvalidator.php";

if (isset($_SESSION['loggedUser'])) {
	header('Location: index.php');
}

$products = $product->selectAll('products');


$error_first_name = '';
$error_last_name = '';
$error_street = '';
$error_city = '';
$error_zip = '';
$error_phone = '';
$error_email = '';
$error_password = '';
if (isset($_POST['registerBtn'])) {

	//Setup Validations
    $validator = new FormValidator();
    $validator->addValidation("register_first_name","req","Obavezno polje");
    $validator->addValidation("register_first_name","alpha","Ime može sadržati samo slova");
    $validator->addValidation("register_last_name","req","Obavezno polje");
    $validator->addValidation("register_last_name","alpha","Prezime može sadržati samo slova");
    $validator->addValidation("register_street","req","Obavezno polje");
    $validator->addValidation("register_street","alnum_s","Ulica može sadržati samo slova i brojeve");
    $validator->addValidation("register_city","req","Obavezno polje");
    $validator->addValidation("register_city","alpha","Grad može sadržati samo slova");
    $validator->addValidation("register_zip","req","Obavezno polje");
    $validator->addValidation("register_zip","num","ZIP mora biti broj");
    $validator->addValidation("register_phone","req","Obavezno polje");
    $validator->addValidation("register_phone","num","Telefon mora biti broj");
    $validator->addValidation("register_email","req","Obavezno polje");
    $validator->addValidation("register_email","email","Morate uneti validan Email");
    $validator->addValidation("register_password_1","req","Obavezno polje");
    $validator->addValidation("register_password_1","eqelmnt=register_password_2","Niste uneli ispravan password");
    //Now, validate the form
    if($validator->ValidateForm()){
        //Validation success. 
        //Here we can proceed with processing the form 
        //(like sending email, saving to Database etc)
        // In this example, we just display a message
        $user->registerUser();

    }else{
	    $error_hash = $validator->GetErrors();
	    foreach($error_hash as $inpname => $inp_err)
	    {
	        if ($inpname == 'register_first_name') {
	        	$error_first_name = $inp_err;
	        }
	        if ($inpname == 'register_last_name') {
	        	$error_last_name = $inp_err;
	        }
	        if ($inpname == 'register_street') {
	        	$error_street = $inp_err;
	        }
	        if ($inpname == 'register_city') {
	        	$error_city = $inp_err;
	        }
	        if ($inpname == 'register_zip') {
	        	$error_zip = $inp_err;
	        }
	        if ($inpname == 'register_phone') {
	        	$error_phone = $inp_err;
	        }
	        if ($inpname == 'register_email') {
	        	$error_email = $inp_err;
	        }
	        if ($inpname == 'register_password_1') {
	        	$error_password = $inp_err;
	        }
	    }        
    }
}


$error_login_email = '';
$error_login_password = '';
if (isset($_POST['loginBtn'])) {

	$validator = new FormValidator();
	$validator->addValidation("login_email","req","Obavezno polje");
    $validator->addValidation("login_email","email","Morate uneti validan Email");
    $validator->addValidation("login_password","req","Obavezno polje");

    if($validator->ValidateForm()){
        //Validation success. 
        //Here we can proceed with processing the form 
        //(like sending email, saving to Database etc)
        // In this example, we just display a message
        $user->logUser();
		if (isset($_SESSION['loggedUser'])) {
			$products_of_chart = $chart->userGetAllFromChart($_SESSION['loggedUser']->id);
		}

    }else{
    	$error_hash = $validator->GetErrors();
	    foreach($error_hash as $inpname => $inp_err)
	    {
	        if ($inpname == 'login_email') {
	        	$error_login_email = $inp_err;
	        }
	        if ($inpname == 'login_password') {
	        	$error_login_password = $inp_err;
	        }
	    }
	}
}

require_once 'views/login_register.view.php';

 ?>