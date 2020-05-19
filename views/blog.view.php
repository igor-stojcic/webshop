<?php require_once "partials/top.php"; ?>
<?php require_once "partials/nav.php"; ?>

<div id="blog-page" class="container w3-animate-opacity">
	
	<div class="container">
		<div class="row">
			<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
			    <div class="col-md-6 px-0">
			    	<h1 class="display-4 font-italic">Ko ukusno i zdravo hoće, neka jede bobičasto voće</h1>
			    	<p class="lead my-3">Šta je to što nam leto pruža u izobilju, a pršti i puca od vitamina, minerala i antioksidanasa? Ovde ćete pronaći info o voću, sajmovima, popularnim vestima i svemu znanom i neznanom.</p>
			    </div>
			</div>
		</div>
	</div>
	
	<?php $add_num = 1; ?><!-- number for change collapse element -->
	<?php foreach($posts as $post): ?>
	<?php $add_num++; ?>
	<div class="row">
		<div class="col-md-10 offset-md-1 col-sm-12">
			<div id="<?php echo $post->title; ?>" class="w3-card-4 m-3 mb-5 w3-round overflow-hidden">
				<img src="img/blog/<?php echo $post->img; ?>" alt="<?php echo $post->title; ?>" class="w3-image" style="width:100%;">
				<div class="w3-container mt-n5">
			    	<h3><b><?php echo $post->title; ?></b></h3>
			    	<?php if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']->privilege == 'a'): ?>
						<a class="btn btn-sm btn-danger mt-n5 float-right" href="blog.php?id=<?php echo $post->id; ?>">Obriši</a>
					<?php endif; ?>
			    	<h6>Objavljeno:
			    	<span class="w3-opacity"><?php $date = date_create($post->created_at); echo date_format($date,'d.m.Y | H:i'); ?></span></h6>
				</div>

				<div class="w3-container">
				    <div class="text-muted">
						<p class="card-text mb-3" style="text-align: justify;">
							<?php echo $post->description1.'<br>'; ?>
							<a class="dropdown-btn font-weight-bolder text-decoration-none text-danger" data-toggle="collapse" href="#collapseExample<?php echo $add_num; ?>" role="button" aria-expanded="false" aria-controls="collapseExample<?php echo $add_num; ?>"> <i class="fas fa-long-arrow-alt-right pl-2 pr-2"></i> pročitajte ceo tekst...</a>
						</p>
					</div>
					
					<div class="collapse w3-animate-zoom" id="collapseExample<?php echo $add_num; ?>">
						<div class="card card-text border border-white">
							<p style="text-align: justify;"><?php echo $post->description2; ?></p>
							<p style="text-align: justify;"><?php echo $post->description3; ?></p>
							<a class="dropup-btn font-weight-bolder text-decoration-none text-danger mb-2" data-toggle="collapse" href="#collapseExample<?php echo $add_num; ?>" role="button" aria-expanded="false" aria-controls="collapseExample<?php echo $add_num; ?>"> <i class="fas fa-long-arrow-alt-left pl-2 pr-2"></i>...zatvorite</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>

</div>

<?php require_once "partials/bottom.php"; ?>