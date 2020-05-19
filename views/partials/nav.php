<nav id="navbar" class="navbar navbar-expand-md navbar-dark bg-dark w3-animate-opacity">
    <a class="navbar-brand" href="index.php">WebShop</a>
    <?php if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']->privilege != 'a'): ?>
        <a href="add_product_to_chart.php" class="ml-auto navbar-toggler" style="color: #00ff00; font-size: 12px; border: none;"><i class="fa fa-cart-arrow-down" style="color: #ffc61a;"></i><span style="color: #ffc61a;"> <small><i class="fas fa-long-arrow-alt-right"></i> <?php echo count($products_of_chart); ?></small></span></a>
    <?php endif; ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') { echo 'active'; } ?>">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li id="about-as-is-active" class="nav-item make-active">
                <a class="nav-link" href="#about-as">O nama</a>
            </li>
            <li class="nav-item dropdown <?php if(basename($_SERVER['PHP_SELF']) == 'fresh_juices.php' || basename($_SERVER['PHP_SELF']) == 'singl_product.php') { echo 'active'; } ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"> Sveži sokovi </a>
                <ul class="dropdown-menu ml-auto bg-warning w3-animate-opacity" aria-labelledby="navbarDropdownMenuLink">
                    <?php if(basename($_SERVER['PHP_SELF']) != 'fresh_juices.php'): ?>
                        <li>
                            <a class="dropdown-item font-weight-bold text-danger" href="fresh_juices.php"><i class="fas fa-ellipsis-v text-dark mr-2"></i> Svi proizvodi</a>
                        </li>
                    <hr class="m-2 mt-0">
                    <?php endif; ?>
                    <?php foreach($products as $product): ?>
                        <li>
                            <a class="dropdown-item font-weight-bold" href="singl_product.php?id=<?php echo $product->id; ?>"> <?php echo $product->title ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == 'blog.php') { echo 'active'; } ?>">
                <a class="nav-link" href="blog.php">Blog</a>
            </li>
            <li id="contact-is-active" class="nav-item mr-4">
                <a class="nav-link" href="#about-as">Kontakt</a>
            </li>
	        <?php if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']->privilege == 'a'): ?>
				<li class="nav-item">
                    <a href="admin_upload.php" class="nav-link" style="color: #00ff00;">
                        <?php echo $_SESSION['loggedUser']->first_name; ?>
                        <?php if(basename($_SERVER['PHP_SELF']) != 'admin_upload.php'): ?>
                            <span class="text-light"> - Upload</span>
                        <?php endif; ?>
                    </a>
                </li>
				<li class="nav-item">
					<a href="logout.php" class="nav-link">Izloguj se</a>
				</li>
			<?php elseif(isset($_SESSION['loggedUser'])): ?>
				
					<li class="nav-item dropdown">
						<a href="add_product_to_chart.php" id="user-navbar-chart-icon" class="nav-link" style="color: #00ff00;"  data-hover="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['loggedUser']->first_name; ?> <i class="fa fa-cart-arrow-down pl-1" style="color: #ffc61a;"></i><span style="color: #ffc61a;"> <small><i class="fas fa-long-arrow-alt-right"></i> <?php echo count($products_of_chart); ?></small></span></a>


                        <?php if(count($products_of_chart) > 0): ?>

                            <ul class="dropdown-menu dropdown-cart w3-animate-opacity" aria-labelledby="user-navbar-chart-icon" role="menu">
                            
                            <?php $sum_all = 0; ?> <!-- SUM FOR PRODUCT PRICE -->
                            <?php foreach($products_of_chart as $product_of_chart): ?>
                            
                                <li>
                                    <span class="item">
                                        <a href="singl_product.php?id=<?php echo $product_of_chart->product_id; ?>">
                                            <span class="item-left w3-animate-right">
                                                <img class="img-fluid" src="upload/<?php echo $product_of_chart->img; ?>" alt="<?php echo $product_of_chart->title; ?>" width="50" height="auto" background="#55595c" color="#eceeef" class="card-img-body" text="Thumbnail">
                                                <span class="item-info">
                                                    <span><?php echo $product_of_chart->title; ?> <small class="ml-2">x <?php echo $product_of_chart->quantity; ?></small></span>
                                                    <span class="mt-n1"><?php echo (($product_of_chart->price)*($product_of_chart->quantity)); ?> RSD</span>
                                                </span>
                                            </span>
                                        </a>
                                        <span class="item-right w3-animate-right">
                                            <a href="add_product_to_chart.php?id=<?php echo $product_of_chart->id; ?>"><i class="fas fa-times-circle text-bolder mt-3 mr-2" style="font-size: 18px;"></i></a>
                                        </span>
                                    </span>
                                </li>    
                                <hr class="m-1 mt-0">

                                <?php $sum_all += (($product_of_chart->price)*($product_of_chart->quantity)); ?>                         
                            <?php endforeach; ?>

                                <li><small class="pl-2 pr-4">Ukupno: <?php echo $sum_all; ?> RSD</small></li>
                                <li><a class="pl-2 text-decoration-none text-primary font-weight-bolder" href="add_product_to_chart.php">Završite kupovinu</a></li>
                            </ul>

                        <?php endif; ?>


					</li>
				
				<li class="nav-item">
					<a href="logout.php" class="nav-link">Izloguj se</a>
				</li>
			<?php else: ?>
				<li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == 'login_register.php') { echo 'active'; } ?>">
					<a href="login_register.php" class="nav-link">Login/Register</a>
				</li>
			<?php endif; ?>
        </ul>
    </div>
</nav>


<?php if(basename($_SERVER['PHP_SELF']) != 'index.php'): ?>
<div id="page-viewer" class="container">
    <nav class="navbar navbar-expand navbar-light bg-light p-0 w3-animate-zoom">
        <div class="navbar-nav">
            <a class="nav-item nav-link text-warning" href="index.php">Home</a>
            <?php $arrow = '<a class="nav-item nav-link disabled ml-n2 text-dark arrow" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-angle-double-right" style="font-size: 8px;"></i></a>'; ?>
            <?php echo $arrow; ?>
            <?php if(basename($_SERVER['PHP_SELF']) == 'fresh_juices.php'): ?>
                <a class="nav-item nav-link disabled ml-n2 text-dark" href="#" tabindex="-1" aria-disabled="true"> Sveži sokovi</a>
            <?php elseif(basename($_SERVER['PHP_SELF']) == 'singl_product.php'): ?>
                <a class="nav-item nav-link ml-n2 text-warning" href="fresh_juices.php"> Sveži sokovi</a>
                <?php echo $arrow; ?>
                <a class="nav-item nav-link disabled ml-n2 text-dark" href="#" tabindex="-1" aria-disabled="true"> <?php echo $single_product->title; ?></a>
            <?php elseif(basename($_SERVER['PHP_SELF']) == 'edit.php'): ?>
                <a class="nav-item nav-link ml-n2 text-warning" href="fresh_juices.php"> Sveži sokovi</a>
                <?php echo $arrow; ?>
                <a class="nav-item nav-link ml-n2 text-warning" href="singl_product.php?id=<?php echo $edit_product->id; ?>"> <?php echo $edit_product->title; ?></a>
                <?php echo $arrow; ?>
                <a class="nav-item nav-link disabled ml-n2 text-dark" href="#" tabindex="-1" aria-disabled="true"> Promeni</a>
            <?php else: ?>
                <a class="nav-item nav-link disabled ml-n2 text-dark" href="#" tabindex="-1" aria-disabled="true">
                    <?php if(basename($_SERVER['PHP_SELF']) == 'add_product_to_chart.php'){ echo ' Korpa'; } ?>
                    <?php if(basename($_SERVER['PHP_SELF']) == 'admin_upload.php'){ echo ' Administratorski panel'; } ?>
                    <?php if(basename($_SERVER['PHP_SELF']) == 'forgot_password.php'){ echo ' Vraćanje lozinke'; } ?>
                    <?php if(basename($_SERVER['PHP_SELF']) == 'blog.php'){ echo ' Blog'; } ?>
                    <?php if(basename($_SERVER['PHP_SELF']) == 'login_register.php'){ echo ' Logovanje / Registracija'; } ?>
                </a>
            <?php endif; ?>
        </div>
    </nav>
</div>
<?php endif; ?>

