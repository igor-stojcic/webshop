<?php require_once "partials/top.php"; ?>
<?php require_once "partials/nav.php"; ?>


<div class="w3-main w3-content w3-padding forms-style" style="max-width:100%;margin:0;padding:0 !important;">

	<?php $products_chunk = array_chunk($products,8); ?>
	<?php for($i=0;$i<count($products_chunk);$i++): ?>
	<div id="all-fresh-juices-cards" class="container products-chunk">
		<div class="row">
			<?php foreach($products_chunk[$i] as $product): ?>
			<div class="col-sm-6 col-md-3 mb-5">
				<div class="card-deck text-center">
					<div class="card card-fresh-juice w3-animate-zoom">
						<p class="blink position-absolute p-2 text-center text-success">Tap</p>
				    	<img class="card-img-top img-fluid" src="upload/<?php echo $product->img; ?>" alt="<?php echo $product->title; ?>">
				    	<div class="card-body description-text">
				    		<h5 class="card-title"><?php echo $product->title; ?></h5>
				    		<p class="card-text"><span class="d-inline-block text-truncate" style="max-width: 150px;"><?php echo $product->description; ?></span></p>
				    	</div>
					    <div class="card-footer border-white bg-white mt-n4 pb-0">
					    	<p class="card-text float-left ml-n2">#<?php echo $product->product_num; ?></p>
					    	<p class="card-text float-right font-weight-bolder mr-n2"><?php echo $product->price; ?> RSD</p>
					    </div>
					    <div class="overlay-fresh-juice">
					    	<?php if(!isset($_SESSION['loggedUser']) || $_SESSION['loggedUser']->privilege != 'a'): ?>
					    		<a id="heart-btn" href="fresh_juices.php?wish_id=<?php echo $product->id; ?>&wish_img=<?php echo $product->img; ?>" class="w3-win8-red w3-btn w3-small w3-round-xxlarge w3-hover-border-amber" style="border:2px dotted white;"><i class="fa fa-heart w3-text-white"></i></a>
					    	<?php endif; ?>
							
							<?php if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']->privilege == 'a'): ?>
								<a id="delete-fresh-juice-btn" href="fresh_juices.php?id=<?php echo $product->id; ?>" class="w3-win8-red w3-btn w3-small w3-round-xxlarge w3-hover-border-amber" style="border:2px dotted white;">Obriši</a>
								<a id="details-btn" href="singl_product.php?id=<?php echo $product->id; ?>" class="w3-win8-olive w3-btn w3-small w3-round-xxlarge w3-hover-border-amber" style="border:2px dotted white;">Detalji</a>
								<a id="edit-fresh-juice-btn" href="edit.php?id=<?php echo $product->id; ?>" class="w3-win8-emerald w3-btn w3-small w3-round-xxlarge w3-hover-border-amber" style="border:2px dotted white;">Promeni</a>
							<?php else: ?>
					    		<a id="details-btn" href="singl_product.php?id=<?php echo $product->id; ?>" class="w3-win8-olive w3-btn w3-small w3-round-xxlarge w3-hover-border-amber" style="border:2px dotted white;">Detalji</a>
					    	<?php endif; ?>
					    	
					    	<form action="add_product_to_chart.php" method="POST">
								<input type="hidden" name="id" value="<?php echo $product->id; ?>">
								<input type="hidden" name="title" value="<?php echo $product->title; ?>">
								<input type="hidden" name="description" value="<?php echo $product->description; ?>">
								<input type="hidden" name="img" value="<?php echo $product->img; ?>">
								<input type="hidden" name="product_num" value="<?php echo $product->product_num; ?>">
								<input type="hidden" name="price" value="<?php echo $product->price; ?>">
								<input type="hidden" name="chart_product_quantity" value="1" min="1" max="1000" step="1">
												
								<?php if(!isset($_SESSION['loggedUser']) || $_SESSION['loggedUser']->privilege != 'a'): ?>
									<button id="cart-btn" type="submit" name="add_to_chart_btn" class="w3-display-midle w3-padding w3-win8-emerald w3-btn w3-small w3-round-xxlarge w3-hover-border-amber" style="border:2px dotted white;"><i class="fa fa-shopping-cart w3-text-white"></i></button>
								<?php endif; ?>
							</form>
					 	</div>
				  	</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php endfor; ?>

  	<!-- Pagination -->
  	<div class="w3-center w3-padding-32 w3-animate-opacity mb-5">
    	<div class="w3-bar">
      	<a href="#" id="chunk-btn-backward" class="w3-bar-item w3-button w3-circle"><i class="fas fa-caret-left"></i></a>
      	<?php for($i=0;$i<count($products_chunk);$i++): ?>
      		<a href="#" class="chunk-btn w3-bar-item w3-button w3-ripple w3-hover-dark-grey w3-circle"><?php echo $i+1; ?></a>
      	<?php endfor; ?>
      	<a href="#" id="chunk-btn-forward" class="w3-bar-item w3-button w3-circle"><i class="fas fa-caret-right"></i></a>
    	</div>
  	</div>

	<?php if(isset($_SESSION['loggedUser']) && count($products_of_wish_list) > 0): ?>
	<div id="wish-list" class="container mb-5">
		<div class="row row-cols-8 justify-content-center">
			<?php foreach($products_of_wish_list as $wish): ?>
				<a href="singl_product.php?id=<?php echo $wish->product_id; ?>" class="m-1" data-toggle="tooltip" data-placement="top" title="<?php foreach($products as $product) { if($product->id == $wish->product_id) { echo $product->title; } } ?>">
					<div class="card text-center bg-light mb-1" style="max-width: 7rem;">
					    <div class="card-head">
						    <img src="upload/<?php echo $wish->img; ?>" class="rounded mx-auto d-block mb-2 mt-2" alt="wish juice" style="max-width: 70px;">
					    </div>
					    <span>
			                <a href="fresh_juices.php?wish_delete_id=<?php echo $wish->id; ?>"><i class="fas fa-times-circle text-bolder" style="font-size: 18px;"></i></a>
			            </span>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
		<h5 class="text-center font-weight-bolder mt-1">Vaši omiljeni proizvodi</h5>
	</div>
	<?php endif; ?>
  
  	<hr class="featurette-divider ml-5 mr-5">

  	<!-- About Section -->
	<div class="w3-container w3-padding-32 w3-center w3-animate-zoom">
	  	<p class="text-center"><i class="fab fa-envira leavs leaf-left"></i><i class="fas fa-leaf leavs leaf-right"></i></p>
	    <h3 class="w3-padding-32">100% CEĐENI SOKOVI</h3>
	    <div>
	      	<h4><b>Ukratko o našem daru prirode!</b></h4>
	      	<h6 class="w3-padding-16"><i>Za sve Vas, koji brinete o svom zdravlju</i></h6>
	      	<p>Svi znamo da su potrošači često u zabludi kada kupe voćni sok na kojem stoji oznaka "100%", misleći da se radi o napitku koji sadrži samo isceđeno voće. Nažalost, njihov natpis "100%" označava samo da sok nema dodatih šećera, odnosno da se sastoji isključivo od voćnog koncentrata i vode, a udeo voća kod ovih sokova je najčešće oko 50-60 odsto. U želji da ljudima koji prvenstveno brinu o svom zdravlju i zdravlju njihovih članova porodice omogućimo da po pristupačnim cenama dođu do pravih "100%" organskih voćnih sokova, proizveli smo više vrsta voćnih sokova spravljenih isključivo ceđenjem sveže ubrani plodova, kojima između ostalog hranimo i našu decu. Naši "100%" voćni sokovi ne sadrže nikakve boje, arome, konzervanse ili dodatne šećere. Njihov izgled, miris i ukus potiču isključivo od voća od koga su napravljenji.</p>
	    </div>
	</div>
</div>

<script src="js/productsChunks.js"></script>
<?php require_once "partials/bottom.php"; ?>