<?php
  require_once 'model/sub.category.model.php';
  require_once 'model/item.model.php';
  require_once 'model/category.model.php';

  $item = new Item();
  $SubCat = new SubCategory();
  $cat = new Category();

  if (isset($_GET['id'])) {
      $getItem = $item->getItemById($_GET['id']);
      $related = $item->getItemBySubCat($getItem['sub_category_id']); ?>
<!doctype html>
<html lang="en">

<head>
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="view/assets/img/logo.png">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title><?php echo $getItem['item_name']; ?> - Bakpak</title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="view/assets/fontawesome-free/css/all.css">
  <!-- Material Kit CSS -->
  <link href="view/assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="view/assets/css/style.css">
</head>

<body>
  <nav class="navbar navbar-transparent navbar-color-on-scroll bg-rose fixed-top navbar-expand-lg">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="index.php">Bakpak</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                  <a href="newArrival.php" class="nav-link">New Arrival</a>
                </li>
                <li class="nav-item">
                    <a href="promo.php" class="nav-link">Promo</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Wishlist</a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="register.php" class="nav-link">Sign Up</a>
                </li>
            </ul>
            <form class="form-inline ml-auto">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search" style="width: 450px; background-color: white; padding: 5px;">
                </div>
                <button type="submit" class="btn btn-info btn-fab">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
    </div>
</nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('view/assets/img/background-1.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand text-center">
            <h1>Bakpak</h1>
            <h3 class="title text-center">Your backup to your school pack</h3>
            <a href="login.php"><button class="btn btn-rose btn-round btn-lg">Shop Now</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
        	<div class="col">
        		<img src="../adminBakpak/view/assets/image/<?php echo $getItem['item_image']; ?>" style="display: block; max-width: 100%; height: auto;">
        	</div>
        	<div class="col">
        		<div class="row">
        			<div class="col">
        				<h3><?php echo $getItem['item_name']; ?></h3>
        			</div>
        		</div><hr>
        		<div class="row">
        			<div class="col">
        				<small>Product Description</small>
        				<p><?php echo $getItem['item_description']; ?></p>
        			</div>
        		</div><br>
        		<div class="row">
        			<div class="col">
        				<small>Product Price</small>
        				<h3 class="card-text" style="background-color: lightgray; padding: 5px; color: #e91e63; border-radius: 50px;">₱ <?php echo $getItem['unit_price']; ?> / <?php echo $getItem['unit_measure']; ?></h3>
        			</div>
        		</div><br>
        		<div class="row">
        			<div class="col">
        				<b>Quantity</b>
        				<input type="number" name="qty" class="form-control" min="0" value="1">
        			</div>
        			<div class="col">
        				<a href="login.php" class="btn btn-info btn-lg" role="button"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;&nbsp;Add to Cart</a>
        			</div>
        			<div class="col">
        				<a href="login.php" class="btn btn-warning btn-lg" role="button"><i class="far fa-money-bill-alt"></i>&nbsp;&nbsp;&nbsp;Buy Now</a>
        			</div>
        		</div><hr>
        		<div class="row">
        			<div class="star-rating" style="width:100%;">
						<input id="star-5" type="radio" name="rating" value="star-5">
						<label for="star-5" title="5 stars">
							<i class="active fa fa-star" aria-hidden="true"></i>
						</label>
						<input id="star-4" type="radio" name="rating" value="star-4">
						<label for="star-4" title="4 stars">
							<i class="active fa fa-star" aria-hidden="true"></i>
						</label>
						<input id="star-3" type="radio" name="rating" value="star-3">
						<label for="star-3" title="3 stars">
							<i class="active fa fa-star" aria-hidden="true"></i>
						</label>
						<input id="star-2" type="radio" name="rating" value="star-2">
						<label for="star-2" title="2 stars">
							<i class="active fa fa-star" aria-hidden="true"></i>
						</label>
						<input id="star-1" type="radio" name="rating" value="star-1">
						<label for="star-1" title="1 star">
							<i class="active fa fa-star" aria-hidden="true"></i>
						</label>
					</div>
        		</div>
        	</div>
        </div><hr>
        <h3 class="text-left">Related Products</h3><hr>
        <div class="newArrivalContainer">
          <?php
            // $get = $item->getAllItem();
      foreach ($related as $g) {
          if ($g['item_id'] != $_GET['id']) {
              //   if ($getItem['sub_category_id'] == $g['sub_category_id']) {
              //   if ($g['sub_category_id'] == $getItem['sub_category_id']) {?>
              <a href="product.php?id=<?php echo $g['item_id']; ?>">
                <div class="card newArrival">
                  <h4 class="card-header card-header-info" style="overflow: hidden; text-overflow: ellipsis;"><?php echo $g['item_name']; ?></h4>
                  <div class="card-body">
                    <img class="card-img-top" src="../adminBakpak/view/assets/image/<?php echo $g['item_image']; ?>" alt="Card image cap" style="display: block; max-width: 100%; height: 100px;">
                    <p class="card-text" style="overflow: hidden; text-overflow: ellipsis;"><?php echo $g['item_description']; ?></p>
                    <p class="card-text">₱ <?php echo $g['unit_price']; ?> / <?php echo $g['unit_measure']; ?></p>
                    <a href="login.php" class="btn btn-warning"><i class="fas fa-shopping-cart"></i></a>
                  </div>
                </div>
              </a> 
          <?php
          }
      } ?>
        </div>
        <hr><h3 class="text-left">Comments & Ratings</h3><hr>
        <div class="card">
		  <div class="card-body ">
		        <h4 class="card-title">
		            <a href="#pablo">To Grow Your Business Start Focusing on Your Employees</a>
		        </h4>
		    </div>
		    <div class="card-footer ">
		            <div class="author">
		                <a href="#pablo">
		                   <img src="view/assets/img/logo.png" alt="..." class="avatar img-raised">
		                   <span>Lord Alex</span>
		                </a>
		            </div>
		           <div class="stats ml-auto">
		                <div class="star-rating" style="width:100%;">
							<input id="star-5" type="radio" name="rating" value="star-5">
							<label for="star-5" title="5 stars">
								<i class="active fa fa-star" aria-hidden="true"></i>
							</label>
							<input id="star-4" type="radio" name="rating" value="star-4">
							<label for="star-4" title="4 stars">
								<i class="active fa fa-star" aria-hidden="true"></i>
							</label>
							<input id="star-3" type="radio" name="rating" value="star-3">
							<label for="star-3" title="3 stars">
								<i class="active fa fa-star" aria-hidden="true"></i>
							</label>
							<input id="star-2" type="radio" name="rating" value="star-2">
							<label for="star-2" title="2 stars">
								<i class="active fa fa-star" aria-hidden="true"></i>
							</label>
							<input id="star-1" type="radio" name="rating" value="star-1">
							<label for="star-1" title="1 star">
								<i class="active fa fa-star" aria-hidden="true"></i>
							</label>
						</div>
						<button class="btn btn-social btn-link btn-danger">
					      <i class="fas fa-flag"></i>
					    </button>
		            </div>
		        </div>
		      </div>
    	</div>
    </div>
  </div>
  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li><a href="#">Bakpak</a></li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="fas fa-heart"></i> by
        <a href="#">Bakpak</a>
      </div>
    </div>
  </footer>

  <!--   Core JS Files   -->
  <script src="view/assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="view/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="view/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="view/assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="view/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="view/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for Sharrre btn -->
  <script src="view/assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="view/assets/js/material-kit.js?v=2.0.4" type="text/javascript"></script>
</body>

</html>
<?php
  } else {
      header('location:index.php');
  }
?>