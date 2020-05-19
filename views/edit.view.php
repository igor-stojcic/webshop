<?php require_once "partials/top.php"; ?>
<?php require_once "partials/nav.php"; ?>

<div id="admin" class="container container-fluid mb-5 w3-animate-zoom">
	<h2 class="display-4 mb-4 mt-n4"><?php echo $edit_product->title; ?></h2>
	<div class="row">

		<div class="col-md-12 edit-fresh-juice">

			<div class="col-md-6 float-left mt-5">
				<img src="upload/<?php echo $edit_product->img; ?>" alt="<?php echo $edit_product->img; ?> product" width="auto" height="500" class="img-fluid">
			</div>

			<div class="col-md-6 float-right mt-5">
				<form action="edit.php" method="POST">
					<input type="hidden" name="id" value="<?php echo $edit_product->id; ?>">
					<input type="text" name="title" placeholder="Naziv" class="form-control mb-2" value="<?php echo $edit_product->title; ?>">
					<textarea type="text" name="description" placeholder="Opis proizvoda" class="form-control mb-2" cols="30" rows="10"><?php echo $edit_product->description; ?></textarea>
		            <input type="hidden" name="img" value="<?php echo $edit_product->img; ?>">
					<input type="number" name="product_num" placeholder="Šifra proizvoda" class="form-control mb-2" value="<?php echo $edit_product->product_num; ?>">
					<input type="number" name="price" placeholder="Cena" class="form-control mb-2" value="<?php echo $edit_product->price; ?>">
					<button type="submit" name="editBtn" class="btn btn-primary form-control">Sačuvaj promene</button>
				</form>
			</div>

		</div>

	</div>
</div>

<?php require_once "partials/bottom.php"; ?>
