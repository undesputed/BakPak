<?php
  require_once 'model/user.model.php';
  require_once 'model/item.model.php';
  require_once 'model/bundle.model.php';
  require_once 'model/sub.category.model.php';
  require_once 'model/cart.model.php';
  require_once 'model/delivery.model.php';

  date_default_timezone_set('Asia/Manila');
        $start = date('Y-m-d');
        $startDate = $start;
        $date = DateTime::createFromFormat('Y-m-d', $startDate);
        $limitDate = $date->modify('-15 day');
        $newArrival = $limitDate->format('Y-m-d');
        $item = new Item();
        $bundle = new Bundle();
        $subCat = new SubCategory();
        $delivery = new Delivery();
        $cart = new Cart();
?>
<!doctype html>
<html lang="en">

<head>
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="view/assets/img/logo.png">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Bakpak - Online Shopping for School Supplies</title>
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
        <h4>Categories</h4><hr><br>
        <div class="categoryContainer">
        <?php $get = $subCat->getAllSubCat();
        foreach ($get as $g) {
            ?>
            <a href="">
              <div class="card category">
                <div class="card-body">
                  <img class="card-img-top" src="view/assets/img/bg.jpg" alt="" style="display: block; max-width: 100%; height: auto;">
                  <p class="card-text"><?php echo $g['sub_category_name']; ?></p>
                </div>
              </div> 
            </a>
        <?php
        }?>
        </div>
        <br><hr><h4 id="newArrivalContainer">New Arrival</h4><hr><br>
        <div class="newArrivalContainer">
        <?php $get = $item->getAllItem();
        foreach ($get as $g) {
            if ($g['date_added'] >= $newArrival && $g['status'] == 'ACTIVE') {
                ?>
              <a href="product.php?id=<?php echo $g['item_id']; ?>">
                <div class="card newArrival">
                  <h4 class="card-header card-header-info" style="overflow: hidden; text-overflow: ellipsis;"></h4>
                  <div class="card-body">
                    <img class="card-img-top" src="../../adminBakpak/view/assets/image/<?php echo $g['item_image']; ?>" alt="Card image cap" style="display: block; max-width: 100%; height: auto;">
                    <p class="card-text" style="overflow: hidden; text-overflow: ellipsis;"><?php echo $g['item_description']; ?></p>
                    <p class="card-text">₱<?php echo $g['unit_price']; ?>/<?php echo $g['unit_measure']; ?></p>
                    <a href="login.php" class="btn btn-warning"><i class="fas fa-shopping-cart"></i></a>
                  </div>
                </div>
              </a> 
            <?php
            }
        }?>
        </div>
        <br><hr><h4 id="promoContainer">Promo</h4><hr><br>
        <div class="promoContainer">
        <?php $get = $bundle->getAllBundle();
        foreach ($get as $g) {
            if ($g['status'] == 'ACTIVE') {
                ?>
              <a href="product.php?id=<?php echo $n['prod_id']; ?>">
                <div class="card promo">
                  <h4 class="card-header card-header-success" style="overflow: hidden; text-overflow: ellipsis;"></h4>
                  <div class="card-body">
                    <img class="card-img-top" src="view/assets/images/new-package-magic-300x228.jpg" alt="Card image cap" style="display: block; max-width: 100%; height: auto;">
                    <p class="card-text" style="overflow: hidden; text-overflow: ellipsis;"><?php echo $g['bundle_description']; ?></p>
                    <p class="card-text">₱ <?php echo $g['quantity']; ?> / <?php echo $g['unit_measure']; ?></p>
                    <a href="login.php" class="btn btn-primary"><i class="fas fa-shopping-cart"></i></a>
                  </div>
                </div>
              </a>
            <?php
            }
        }?>
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