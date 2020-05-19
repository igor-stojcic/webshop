<?php 
use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    require_once "validation/formvalidator.php";
    
    $error_name = '';
    $error_email = '';
    $error_message = '';
    $validator = new FormValidator();
    $validator->addValidation("name","req","* Fill this area please!");
    $validator->addValidation("name","alpha_s","* Only leters please!");
    $validator->addValidation("email","req","* Fill this area please!");
    $validator->addValidation("email","email","* E-mail not correct!");
    $validator->addValidation("message","req","* Fill this area please!");

    if($validator->ValidateForm()){
        //Validation success. 
        //Here we can proceed with processing the form 
        //(like sending email, saving to Database etc)
        // In this example, we just display a message
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];


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

        $mail->setFrom($email, $name);
        $mail->addAddress('igor@smarty.rs');     // Add a recipient
        // $mail->addReplyTo(EMAIL);
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Poruka sa - webshop.smarty.rs';
        $mail->Body    = '  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title>Plastika Krsmanović</title>
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
                                                        <b>Poruku je poslao: <span style="color:#5c5c3d;">'.$name.'</span></b>
                                                        <hr />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 30px;">
                                                        <b>Kontakt e-mail: <span style="color:#5c5c3d;">'.$email.'</span></b>
                                                        <hr />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 15px;">
                                                        <b>Poruka: </b><br /><br /><span style="color:#5c5c3d;">'.$message.'</span>
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
                                                        &reg; Smoothie berries<br/>
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

        $mail->AltBody = 'Poruku je poslao: '.$name.'Kontakt e-mail: '.$email.'Poruka: '.$message;

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
                    
        } else {
            echo 'Message has been sent';
        }


    }else{
        $error_hash = $validator->GetErrors();
        foreach($error_hash as $inpname => $inp_err)
        {
            if ($inpname == 'name') {
                $error_name = $inp_err;
            }
            if ($inpname == 'email') {
                $error_email = $inp_err;
            }
            if ($inpname == 'message') {
                $error_message = $inp_err;
            }
        }
    }
              
 ?>