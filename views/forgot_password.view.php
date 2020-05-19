<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
?>
<?php require_once "partials/top.php"; ?>
<?php require_once "partials/nav.php"; ?>

<div class="container forms-style">
	<div class="row">
		<div class="col-sm-8 offset-sm-2 col-12 mb-5">

			<?php if($user->userWithNewPass): ?>
				<p style="display: none;"><?php 

				require 'vendor/autoload.php';
                require 'validation/cre/credential.php';
        
                $mail = new PHPMailer;
        
                //if we want to send via SMTP
                // $mail->isSMTP();
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->Host = "mail.smarty.rs";
                $mail->Port = 465; //587
                // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //TLS
                $mail->SMTPAuth = true;
                $mail->Username = EMAIL;
                $mail->Password = PASS;

				$mail->setFrom($user->userWithNewPass->email, $user->userWithNewPass->first_name);
				$mail->addAddress($user->userWithNewPass->email);     // Add a recipient
				$mail->isHTML(true);                                  // Set email format to HTML

				$mail->Subject = 'Reset lozinke';
				$mail->Body    = '  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				             			<html xmlns="http://www.w3.org/1999/xhtml">
				             			<head>
				             			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
				             			<title>WebShop</title>
				             			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				             			</head>
				             			<body style="margin: 0; padding: 0;">
				             			    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
				             			        <tr>
				             			            <td style="padding: 10px 0 30px 0;">
				             			                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
				                                            <tr>
				                                            	<td align="center" bgcolor="#808080" style="padding: 0px 0 0px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
				                                            	    <img src="http://test.plastikakrsmanovic.com/img/mix.png" alt="Creating Email Magic" width="450" height="230" style="display: block;" />
				                                            	</td>
				                                            </tr>
				                                            <tr>
					                                            <td bgcolor="#ffffb3" style="padding: 20px 30px 20px 30px;">
					                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
					                                                    <tr>
					                                                        <td style="padding: 10px 0 5px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 30px;">
					                                                            <b>Zdravo <span style="color:#5c5c3d;">'.$user->userWithNewPass->first_name.'</span>
					                                                            </b><br />
					                                                            <b>Vasa lozinka je: <span style="color:#5c5c3d;">'.$user->userWithNewPass->password.'</span><br />
					                                                            </b><br />
					                                                            <hr /><br />
					                                                            <b>Ako ste greskom dobili ovaj e-mail, ignorisite ga i obrisite!</b><br />
					                                                        </td>
					                                                    </tr>
					                                                                    
					                                                </table>
					                                            </td>
				                                            </tr>
				                                            <tr>
				                                                <td bgcolor="#808080" style="padding: 20px 30px 20px 30px;">
				                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
				                                                        <tr>
				                                                            <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
				                                                                            &reg; Smoothi berries<br/>
				                                                                <a href="http://test.plastikakrsmanovic.com/" style="color: #ffffff;"><font color="#9999ff">test.plastikakrsmanovic.com</font></a>
				                                                            </td>
				                                                            <td align="right" width="25%">
				                                                                <table border="0" cellpadding="0" cellspacing="0">
				                                                                    <tr>
				                                                                        <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
				                                                                            <a href="http://test.plastikakrsmanovic.com/" style="color: #ffffff;">
				                                                                            <img src="http://test.plastikakrsmanovic.com/img/mix.png" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
				                                                                            </a>
				                                                                 		</td>
				                                                                                    
				                                                                    </tr>
				                                                                </table>
				                                                            </td>
				                                                        </tr>
				                                                    </table>
				                                                </td>
				                                            </tr>
				                                        </table>
				                                    </td>
				                                </tr>
				                            </table>
				                        </body>
				                        </html>';

				$mail->AltBody = 'Zdravo '.$user->userWithNewPass->first_name.'. Vasa zaboravljena lozinka je '.$user->userWithNewPass->password.'. Ako ste greskom dobili ovaj e-mail, ignorisite ga i obrisite!';

				if(!$mail->send()) {
				    echo 'Message could not be sent.';
				    echo 'Mailer Error: ' . $mail->ErrorInfo;
				} else {
				    echo 'Message has been sent';
				}
				echo '<div class="alert alert-success font-weight-bolder text-center">Na Vašu E-mail adresu je poslata lozinka.</div>';
				echo '<script type="text/javascript">setTimeout(function(){window.location = "login_register.php";},4000)</script>';
				 ?></p>
			<?php elseif($user->dontHaveUser): ?>
				<div class="alert alert-danger text-center">Vi niste registrovani na našem sajtu. <a href="login_register.php" class="text-decoration-none text-success">Registrujte se ovde</a></div>
			<?php endif; ?>


			<h4 class="mb-3 font-weight-bolder">Obnova lozinke</h4>
			<small >Zaboravili ste password? Ne brinite, poslaćemo Vam ga.</small>
			<form action="forgot_password.php" method="POST">
				<small class="text-danger"><?php echo $error_forgot_email; ?></small>
				<input type="email" name="forgot_email" placeholder="Vaš E-mail" class="form-control mb-3">
				<button class="btn btn-primary form-control" name="forgotBtn">Pošalji</button>
			</form>
			<img src="img/log_reg.jpg" alt="raspberry" height="auto" width="100%">

			
		</div>
	</div>
</div>

<?php require_once "partials/bottom.php"; ?>