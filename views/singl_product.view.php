<?php require_once "partials/top.php"; ?>
<?php require_once "partials/nav.php"; ?>

<main role="main">

  <div id="singl-product" class="container mb-4 w3-animate-opacity">

    <div class="row">

    	<div class="col-md-5 order-md-1 mb-5">
        <img src="upload/<?php echo $single_product->img; ?>" width="500" height="500" background="#eee" color="#aaa" class="bd-placeholder-img-lg img-fluid mx-auto">
      </div>

      <div class="col-md-7 order-md-2 text-center align">
        <p class="text-center mt-n5 pb-4"><i class="fab fa-envira leavs leaf-left"></i><i class="fas fa-leaf leavs leaf-right"></i></p>
        <h2 class=""><?php echo $single_product->title; ?><span class="text-muted"></span></h2>
        <p class=""><?php echo $single_product->description; ?></p><br>
        <a href="" class="btn btn-outline-light text-dark disabled btn-sm float-left mb-2">#<?php echo $single_product->product_num; ?></a>
        <a href="" class="btn btn-outline-light text-dark font-weight-bolder disabled btn-sm float-right "><?php echo $single_product->price; ?> RSD</a>
        
        <?php if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']->privilege == 'a'): ?>
          <a id="singl-edit-btn" href="edit.php?id=<?php echo $single_product->id; ?>" class="w3-win8-emerald w3-animate-opacity w3-btn w3-small w3-round-xxlarge w3-hover-border-amber" style="border:2px dotted white;">Promeni</a>
          <a id="singl-delete-btn" href="fresh_juices.php?id=<?php echo $single_product->id; ?>" class="w3-win8-red w3-animate-opacity w3-btn w3-small w3-round-xxlarge w3-hover-border-amber" style="border:2px dotted white;">Obriši</a>
        <?php else: ?>
          <form action="add_product_to_chart.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $single_product->id; ?>">
            <input type="hidden" name="title" value="<?php echo $single_product->title; ?>">
            <input type="hidden" name="description" value="<?php echo $single_product->description; ?>">
            <input type="hidden" name="img" value="<?php echo $single_product->img; ?>">
            <input type="hidden" name="product_num" value="<?php echo $single_product->product_num; ?>">
            <input type="hidden" name="price" value="<?php echo $single_product->price; ?>">
            <input type="hidden" name="chart_product_quantity" value="1" min="1" max="1000" step="1">
            
            <a id="singl-heart-btn" href="fresh_juices.php?wish_id=<?php echo $single_product->id; ?>&wish_img=<?php echo $single_product->img; ?>" class="w3-win8-red w3-btn w3-small w3-round-xxlarge w3-hover-border-amber" style="border:2px dotted white;"><i class="fa fa-heart w3-text-white"></i></a>
            <button id="singl-cart-btn" type="submit" name="add_to_chart_btn" class="w3-display-midle w3-padding w3-win8-emerald w3-btn w3-small w3-round-xxlarge w3-hover-border-amber" style="border:2px dotted white;"><i class="fa fa-shopping-cart w3-text-white"></i></button>
          </form>
        <?php endif; ?>

      </div>
    </div>

  </div>
  
</main>

<?php require_once "partials/bottom.php"; ?>