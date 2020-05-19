<?php 

require_once "bootstrap.php";
require_once "validation/formvalidator.php";

if (isset($_SESSION['loggedUser'])) {
	header('Location: index.php');
}


$error_forgot_email = '';
if (isset($_POST['forgotBtn'])) {

	$validator = new FormValidator();
	$validator->addValidation("forgot_email","req","Obavezno polje");
    $validator->addValidation("forgot_email","email","Morate uneti validan Email");

    if($validator->ValidateForm()){
        //Validation success. 
        //Here we can proceed with processing the form 
        //(like sending email, saving to Database etc)
        // In this example, we just display a message
        $user->getNewPass();
    }else{
	    $error_hash = $validator->GetErrors();
	    foreach($error_hash as $inpname => $inp_err)
	    {
	        if ($inpname == 'forgot_email') {
	        	$error_forgot_email = $inp_err;
	        }
	    }
	}
}


require_once 'views/forgot_password.view.php';

 ?>