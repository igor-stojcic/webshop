<?php require_once "partials/top.php"; ?>
<?php require_once "partials/nav.php"; ?>

<div id="admin" class="container container-fluid mb-5">
	<div class="row">

			<div class="col-md-6 mb-4 w3-animate-left">
				<h2 class="mt-n4 text-center">Ubaci proizvod</h2>
				<form action="admin_upload.php" method="POST" enctype="multipart/form-data">
					<div class="input-group mb-3">
						<div class="input-group mb-2">
							<label class=".sr-only" for="addName"></label>
							<input type="text" name="title" placeholder="Naziv" id="addName" class="form-control" required>
						</div>
						<div class="input-group mb-2">
							<label class=".sr-only" for="addText"></label>
							<textarea type="text" name="description" placeholder="Opis proizvoda" id="addText" class="form-control" cols="30" rows="8"></textarea>
						</div>
						<div class="input-group mb-2">
			                <div class="border rounded-sm text-center">
			                	<img src="img/Loader.gif" class="img-fluid" id="preview" width="30" height="auto" />
			            	</div>
			                <div class="custom-file">
			                    <input type="file" name="img" class="custom-file-input" id="inputGroupFile">
			                    <label class="custom-file-label" for="inputGroupFile" aria-describedby="inputGroupFileAddon">Izaberi sliku</label>
			                </div>
			            </div>
			            <div class="input-group mb-2">
							<label class=".sr-only" for="addProductNum"></label>
							<input type="number" name="product_num" placeholder="Šifra proizvoda" id="addProductNum" class="form-control" required>
						</div>
						<div class="input-group mb-2">
							<label class=".sr-only" for="addPrice"></label>
							<input type="number" name="price" placeholder="Cena" id="addPrice" class="form-control" required>
						</div>
						<button type="submit" name="addFreshJuiceBtn" class="btn btn-primary form-control">Dodaj proizvod</button>
					</div>
				</form>

				<?php if($success_add_juice): ?>
					<div class="alert alert-success">Uspešno dodat proizvod. Pogledaj sve <a href="fresh_juices.php" class="text-decoration-none text-warning">proizvode...</a></div>
				<?php endif; ?>
			</div>

			<div class="col-md-6 mb-4 w3-animate-right">
				<h2 class="mt-n4 text-center">Ubaci post na Blog</h2>
				<form action="admin_upload.php" method="POST" enctype="multipart/form-data">
					<div class="input-group mb-2">
						<label class=".sr-only" for="addTitle"></label>
						<input type="text" name="title" placeholder="Naslov" id="addTitle" class="form-control" required>
					</div>
					<div class="input-group mb-2">
						<label class=".sr-only" for="addDescription1"></label>
						<textarea type="text" name="description1" placeholder="Prvi pasus..." id="addDescription1" class="form-control" cols="30" rows="4"></textarea>
					</div>
					<div class="input-group mb-2">
						<label class=".sr-only" for="addDescription2"></label>
						<textarea type="text" name="description2" placeholder="Drugi pasus..." id="addDescription2" class="form-control" cols="30" rows="3"></textarea>
					</div>
					<div class="input-group mb-2">
						<label class=".sr-only" for="addDescription3"></label>
						<textarea type="text" name="description3" placeholder="Treći pasus..." id="addDescription3" class="form-control" cols="30" rows="3"></textarea>
					</div>
					<div class="input-group mb-2">
		                <div class="border rounded-sm text-center">
		                	<img src="img/Loader.gif" class="img-fluid" id="preview2" width="30" height="auto" />
		            	</div>
		                <div class="custom-file">
		                    <input type="file" name="img" class="custom-file-input" id="inputGroupFile2">
		                    <label class="custom-file-label" for="inputGroupFile2" aria-describedby="inputGroupFileAddon">Izaberi sliku</label>
		                </div>
		            </div>
					<button type="submit" name="addPostToBlogBtn" class="btn btn-dark form-control">Dodaj post</button>
				</form>

				<?php if($success_add_post): ?>
					<div class="alert alert-success">Uspešno dodat post na Blog. Pogledaj sve <a href="blog.php" class="text-decoration-none text-warning">postove...</a></div>
				<?php endif; ?>
			</div>

	</div>
</div>

<?php require_once "partials/bottom.php"; ?>