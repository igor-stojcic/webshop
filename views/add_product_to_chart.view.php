<?php require_once "partials/top.php"; ?>
<?php require_once "partials/nav.php"; ?>

<div id="cart-page" class="container">
	<div class="row">

		<div class="col-12">
			<div class="row">
				<?php if(count($products_of_chart) > 0): ?>
				<div id="cart-explanation" class="col-sm-12 mb-3 text-center font-weight-bold">
				  	<div class="row">
				    <div class="col-sm-2">
					    </div>
					    <div class="col-sm-2">
					    	Naziv
					    </div>
					    <div class="col-sm-1">
					  		Šifra
					  	</div>
					    <div class="col-sm-2">
					    	Cena
					    </div>
					    <div class="col-sm-2">
					    	Količina
					    </div>
					    <div class="col-sm-2">
					    	Ukupno
					    </div>
					    <div class="col-sm-1">
					  		Obriši
					  	</div>
				  	</div>
				  	<div style="width: 100%;height:1px;background-color: #000;margin:0 auto;"></div>
				</div>

				<?php endif; ?>

				
				<?php $sum_all = 0; ?> <!-- SUM FOR PRODUCT PRICE -->

				<?php foreach($products_of_chart as $product_of_chart): ?>
					
					<div id="<?php echo $product_of_chart->title; ?>" class="col-md-12 mb-3 text-center w3-animate-zoom">
					  	<div class="row mb-2 mt-2">
					    	<div class="col-sm-2 align p-2">
					      		<img class="img-fluid" src="upload/<?php echo $product_of_chart->img; ?>" alt="product" width="70" height="auto" background="#55595c" color="#eceeef" class="card-img-body" text="Thumbnail">
					    	</div>
					    	<div class="col-sm-2 align">
					    		<?php echo $product_of_chart->title; ?>
					    	</div>
					    	<div class="col-sm-1 align">
					  			<small>#<?php echo $product_of_chart->product_num; ?></small>
					  		</div>
					    	<div class="col-sm-2 align">
					    		<?php echo $product_of_chart->price; ?> RSD
					    	</div>
					    	<div class="col-sm-2 align">

					    		<form action="add_product_to_chart.php" method="POST">
									<input type="hidden" name="id" value="<?php echo $product_of_chart->id; ?>">
									<input type="hidden" name="product_id" value="<?php echo $product_of_chart->product_id; ?>">
									<input type="hidden" name="title" value="<?php echo $product_of_chart->title; ?>">
									<input type="hidden" name="description" value="<?php echo $product_of_chart->description; ?>">
									<input type="hidden" name="img" value="<?php echo $product_of_chart->img; ?>">
									<input type="hidden" name="product_num" value="<?php echo $product_of_chart->product_num; ?>">
									<input type="hidden" name="price" value="<?php echo $product_of_chart->price; ?>">
									<div class="input-group pb-1 number-spinner">
										<span class="input-group-btn">
											<button class="btn btn-default btn-sm text-danger" type="submit" name="update_chart_btn" data-dir="dwn"><span><i class="fas fa-minus"></i></span></button>
										</span>
										<input type="number" name="chart_product_quantity" value="<?php echo $product_of_chart->quantity; ?>" min="1" max="1000" step="1" class="form-control form-control-sm text-center">
										<span class="input-group-btn">
											<button class="btn btn-default btn-sm text-success" type="submit" name="update_chart_btn" data-dir="up"><span><i class="fas fa-plus"></i></span></button>
										</span>
									</div>

					    	</div>
					    	<div class="col-sm-2 align">
					    		<?php echo (($product_of_chart->price)*($product_of_chart->quantity)); ?> RSD
					   		</div>
					    	<div class="col-sm-1 align">
					  			<a href="add_product_to_chart.php?id=<?php echo $product_of_chart->id; ?>" class=""><i class="fas fa-times-circle text-bolder" style="font-size: 18px;"></i></a><!-- REMOVE from Cart -->

					  			</form>
					  		</div>
					  	</div>
					  	<hr class="featurette-divider">
					</div>

					<?php $sum_all += (($product_of_chart->price)*($product_of_chart->quantity)); ?> <!-- TOTAL PRODUCTS PRICE -->
				<?php endforeach; ?>
				

			
				<div class="container mt-4">
					<?php if(count($products_of_chart) > 0): ?>
							<div class="container mb-4 p-0 w3-animate-zoom">
								<div class="row">
									<div class="col-md-3 offset-4 text-dark ml-auto text-center">
										<div class="p-1 bg-info text-white rounded-top">
											<h4>Iznos za plaćanje <span class="pl-2 font-weight-bolder"><?php echo $sum_all; ?><small> RSD</small></span></h4>
										</div>
										<div class=" mb-2 bg-light text-dark rounded-bottom">
											<p class="m-0"><small>Minimalan iznos porudžbine je : 1000 RSD</small></p>
											<p class="m-0"><small>U iznos za plaćanje nije uključena poštarina.</small></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-4 offset-4 mb-5">
									<a href="add_product_to_chart.php?products_of_chart=<?php echo count($products_of_chart); ?>" class="btn btn-warning btn-lg form-control font-weight-bolder w3-animate-zoom">Poruči</a>
								</div>
							</div>
					<?php else: ?>
						<div class="col-10 mb-5">
							<img src="img/empty shopping cart.png" alt="empty cart" class="rounded mx-auto d-block mb-5" />
							<h4 class="display-4 text-center mb-5">Vaša korpa je prazna.</h4>
							<h4><a href="fresh_juices.php" class="text-warning text-decoration-none"><i class="fas fa-angle-double-left"></i> Pogledajte sve proizvode...</a></h4>
						</div>
					<?php endif; ?>
				</div>

			</div>
		</div>

	</div>
</div>

<?php if(count($products_of_wish_list) > 0): ?>
<div id="wish-list" class="container mb-5">
	<div class="row row-cols-8 justify-content-center">
		<?php foreach($products_of_wish_list as $wish): ?>
			<a href="singl_product.php?id=<?php echo $wish->product_id; ?>" class="m-1">
				<div class="card text-center bg-light mb-1" style="max-width: 7rem;">
				    <div class="card-head">
					    <img src="upload/<?php echo $wish->img; ?>" class="rounded mx-auto d-block mb-2 mt-2" alt="wish juice" style="max-width: 70px;">
				    </div>
				    <span>
		                <a href="add_product_to_chart.php?wish_id=<?php echo $wish->id; ?>"><i class="fas fa-times-circle text-bolder" style="font-size: 18px;"></i></a>
		            </span>
				</div>
			</a>
		<?php endforeach; ?>
	</div>
	<h5 class="text-center font-weight-bolder mt-1">Vaši omiljeni proizvodi</h5>
</div>
<?php endif; ?>



<p style="display: none;">
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
if (isset($_GET['products_of_chart']) && isset($_SESSION['loggedUser'])) {
	$products_of_chart = $chart->userGetAllFromChart($_SESSION['loggedUser']->id);

	require('fpdf.php');

	class PDF extends FPDF
	{
		// Page header
		function Header()
		{
		    // Logo
		    // $this->Image('logo.png',10,6,30);
		    // Arial bold 15
		    $this->SetFont('Arial','B',15);
		    // Move to the right
		    $this->Cell(80);
		    // Title
		    $this->Cell(30,10,'Porudzbina',1,0,'C');
		    // Line break
		    $this->Ln(20);
		}
		// Page footer
		function Footer()
		{
		    // Position at 1.5 cm from bottom
		    $this->SetY(-15);
		    // Arial italic 8
		    $this->SetFont('Arial','I',8);
		    // Page number
		    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}
	// Instanciation of inherited class
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);

	$pdf->Cell(0,5,'Kupac: ',0,1);
	$pdf->Cell(0,5,$_SESSION['loggedUser']->first_name.' '.$_SESSION['loggedUser']->last_name,0,1);
	$pdf->Cell(0,5,$_SESSION['loggedUser']->street.', '.$_SESSION['loggedUser']->city.', '.$_SESSION['loggedUser']->zip,0,1);
	$pdf->Cell(0,5,$_SESSION['loggedUser']->phone,0,1);
	$pdf->Cell(0,5,$_SESSION['loggedUser']->email,0,1);
	$pdf->Cell(0,5,'........................................',0,1);

	$i=1;
	foreach($products_of_chart as $product_of_chart) { 
	    $pdf->Cell(0,7,'Proizvod: '.$i,0,1);
	    $pdf->Cell(0,5,'Naziv: '.$product_of_chart->title,0,1);
	    $pdf->Cell(0,5,'Opis: '.$product_of_chart->description,0,1);
	    $pdf->Cell(0,5,'Pr.br. #'.$product_of_chart->product_num,0,1);
	    $pdf->Cell(0,5,'Cena: '.$product_of_chart->price,0,1);
	    $pdf->Cell(0,5,'Kolicina: '.$product_of_chart->quantity,0,1);
	    $pdf->Cell(0,7,'---------------------------------------------------------------------------------------------------------------------',0,1);
		$i++;
	}
	// $filename="/home/user/public_html/test.pdf";
	// $pdf->Output($filename,'F');
	$filename="chart_PDF/chart.pdf";
	$pdf->Output($filename,'F');
	
	

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

	$mail->setFrom($_SESSION['loggedUser']->email, $_SESSION['loggedUser']->first_name);
	$mail->addAddress('igor@smarty.rs');     // Add a recipient
	// $mail->addReplyTo(EMAIL);
	$mail->addAttachment('chart_PDF/chart.pdf');         // Add attachments
	// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Poruka sa sajta';
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
		                                                            <b>Porudzbinu je poslao: <br />
		                                                            <span style="color:#5c5c3d;">'.$_SESSION['loggedUser']->first_name.'</span><br />
		                                                            <span style="color:#5c5c3d;">'.$_SESSION['loggedUser']->last_name.'</span><br />
		                                                            <span style="color:#5c5c3d;">'.$_SESSION['loggedUser']->street.'</span><br />
		                                                            <span style="color:#5c5c3d;">'.$_SESSION['loggedUser']->city.'</span><br />
		                                                            <span style="color:#5c5c3d;">'.$_SESSION['loggedUser']->zip.'</span><br />
		                                                            <span style="color:#5c5c3d;">'.$_SESSION['loggedUser']->phone.'</span><br />
		                                                            <span style="color:#5c5c3d;">'.$_SESSION['loggedUser']->email.'</span><br />
		                                                            </b><br />
		                                                            <b>Poruzbina je u prilogu!</b>
		                                                            <hr />
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

	$mail->AltBody = 'Poruku je poslao: '.$_SESSION['loggedUser']->first_name.' '.$_SESSION['loggedUser']->last_name.'. Adresa: '.$_SESSION['loggedUser']->street.', '.$_SESSION['loggedUser']->city.', '.$_SESSION['loggedUser']->zip.'. Telefon: '.$_SESSION['loggedUser']->phone.' E-mail: '.$_SESSION['loggedUser']->email.'Porudzbina je u prilogu!';

	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Message has been sent';
	    $success = true;
	}

	$chart->deleteProductsFromChart($_SESSION['loggedUser']->id);
	echo '<div class="alert alert-success font-weight-bolder text-center fixed-top">
				<h4 class="alert-heading">Uspešno ste poslali porudžbinu!</h4>
				<p>Hvala na ukazanom poverenju.</p>
			</div>';
	echo '<script type="text/javascript">setTimeout(function(){window.location = "add_product_to_chart.php";},5000)</script>';
}
?>
</p>

<?php require_once "partials/bottom.php"; ?>