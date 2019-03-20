<?php
    require_once '../model/user.model.php';
    require_once '../model/item.model.php';
    require_once '../model/bundle.model.php';
    require_once '../model/sub.category.model.php';
    require_once '../model/cart.model.php';
    require_once '../model/delivery.model.php';

    if ($_SESSION) {
        date_default_timezone_set('Asia/Manila');
        $start = date('Y-m-d');
        $startDate = $start;
        $date = DateTime::createFromFormat('Y-m-d', $startDate);
        $limitDate = $date->modify('-5 day');
        $newArrival = $limitDate->format('Y-m-d');
        $item = new Item();
        $bundle = new Bundle();
        $subCat = new SubCategory();
        $delivery = new Delivery();
        $cart = new Cart(); ?>
<!doctype html>
<html lang="en">

<head>  <!-- Required meta tags -->
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="assets/img/logo.png">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Bakpak - Online Shopping for School Supplies</title>
  
  <?php include 'templates/materialhead.php'; ?>

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
                  <a href="new.arrival.php" class="nav-link">New Arrival</a>
                </li>
                <li class="nav-item">
                    <a href="promo.php" class="nav-link">Promo</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Wishlist</a>
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
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="dropdown nav-item">
                      <a href="#pablo" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown">
                          <i class="fa fa-shopping-cart"></i>
                          
                              <span class="badge badge-pill badge-info"></span>
                          
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <h6 class="dropdown-header text-center"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Shopping Cart<b class="caret"></b></h6><hr>
                        <div style="overflow: scroll; max-height: 200px; overflow-x: hidden;">
                          <?php $getCart = $cart->getAllCart();
        foreach ($getCart as $get) {
            if ($get['user_id'] == $_SESSION['user_id']) {
                $getItem = $item->getItemById($get['item_id']); ?>
                                  <a href="cart.php" class="dropdown-item">
                                    <table class="table">
                                      <tr>
                                        <td><img src="../../adminbakpak/view/assets/image/<?php echo $getItem['item_image']; ?>" height="50" width="50"></td>
                                        <td><?php echo $getItem['item_code']; ?></td>
                                        <td><?php echo $getItem['item_name']; ?></td>
                                        <td>₱ <?php echo $getItem['item_quantity']; ?> / <?php echo $getItem['unit_measure']; ?></td>
                                      </tr>
                                    </table>                                    
                                  </a>
                          <?php
            }
        } ?>
                        </div><hr>
                        <a href="cart.php" class="dropdown-item">See Cart</a>
                      </div>
                    </li>
                    <li class="nav-item"></li>
                    <li class="dropdown nav-item">
                    <a href="#pablo" rel="tooltip" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <h6 class="dropdown-header"><i class="fas fa-bell"></i>&nbsp;&nbsp;Notification
                      <?php $notif = $delivery->getNotif();
        if (count($notif) > 0) {
            ?>
                      <b class="caret"><?php echo count($notif); ?></b></h6>
                      <?php foreach ($notif as $n) {
                ?>
                      <a href="#" class="dropdown-item"><?php echo $n['order_code']; ?> 1</a>
                      <?php
            } ?>
                      <div class="dropdown-divider"></div>
                      <?php
        } ?>
                      <a href="#" class="dropdown-item text-center">See all notification</a>
                    </div>
                  </li>
                  <li class="nav-item"></li>
                  <li class="dropdown nav-item">
                    <a href="#pablo" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fa fa-user"></i>&nbsp<?php echo $_SESSION['user']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <h6 class="dropdown-header"><i class="fa fa-user"></i>&nbsp;&nbsp;My Profile</h6>
                      <a href="account.php" class="dropdown-item"><i class="fas fa-cog"></i>&nbsp;&nbsp;Account Settings</a>
                      <a href="" class="dropdown-item"><i class="fas fa-package"></i>&nbsp;&nbsp;Orders</a>
                      <div class="dropdown-divider"></div>
                      <a href="../controller/user/logout.controller.php" class="dropdown-item"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Logout</a>
                    </div>
                  </li>
                </ul>
              </div>
        </div>
    </div>
</nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/background-1.jpg')">
    <!-- <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand text-center">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="assets/img/carousel-1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/img/carousel-2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/img/carousel-3.jpg" alt="Third slide">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h4><b>Categories</b></h4><hr>
        <div class="categoryContainer">
            <?php $get = $subCat->getAllSubCat();
        foreach ($get as $g) {
            ?>
              <a href="category.view.php?id=<?php echo $g['id']; ?>">
                <div class="card category">
                  <div class="card-body">
                    <img class="card-img-top" src="assets/img/bg.jpg" alt="" style="display: block; max-width: 100%; height: auto;">
                    <p class="card-text"><?php echo $g['sub_category_name']; ?></p>
                  </div>
                </div>
              </a> 
            <?php
        } ?>
        </div>
        <br><hr><h4 id="newArrivalContainer"><b><a href="">New Arrival</a>  </b></h4><hr><br>
        <div class="newArrivalContainer">
            <?php $get = $item->getAllItem();
        foreach ($get as $g) {
            if ($g['date_added'] >= $newArrival && $g['status'] == 'ACTIVE') {
                ?>
                <div class="card newArrival">
                  <h4 class="card-header card-header-info" style="overflow: hidden; text-overflow: ellipsis;"><?php echo $g['item_name']; ?></h4>
                  <div class="card-body">
                    <a href="product.php?id=<?php echo $g['item_id']; ?>">
                    <img class="card-img-top" src="../../adminBakpak/view/assets/image/<?php echo $g['item_image']; ?>" alt="Card image cap" style="display: block; max-width: 100%; height: 100px;">
                    <p class="card-text" style="overflow: hidden; text-overflow: ellipsis;"><?php echo $g['item_description']; ?></p>
                    <p class="card-text">₱<?php echo $g['unit_price']; ?>/<?php echo $g['unit_measure']; ?></p>
                    </a><br>
                    <form method='post' action="../controller/cart/cart.controller.php">
                      <input type="hidden" name="item_id" value="<?php echo $g['item_id']; ?>">
                      <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                      <input type="number" class="form-control" name="qty" min="1" max="<?php echo $g['item_quantity']; ?>" placeholder="Quantity" value="1" required>
                      <button name="addToCart" type="submit" class="btn btn-warning"><i class="fas fa-shopping-cart"></i></button>
                    </form>
                  </div>
                </div>
                <?php
            }
        } ?>
        </div>
        <br><hr><h4 id="promoContainer"><b>Promo</b></h4><hr>
        <div class="promoContainer">
            <?php $get = $bundle->getAllBundle();
        foreach ($get as $g) {
            if ($g['status'] == 'ACTIVE') {
                ?>
                <div class="card promo">
                  <h4 class="card-header card-header-success" style="overflow: hidden; text-overflow: ellipsis;"><?php echo $g['bundle_name']; ?></h4>
                  <div class="card-body">
                    <a href="">
                    <img class="card-img-top" src="assets/images/new-package-magic-300x228.jpg" alt="Card image cap" style="display: block; max-width: 100%; height: auto;">
                    <p class="card-text" style="overflow: hidden; text-overflow: ellipsis;"><?php echo $g['bundle_description']; ?></p>
                    <p class="card-text">₱<?php echo $g['quantity']; ?> / <?php echo $g['unit_measure']; ?></p>
                    </a><br>
                    <form method='post' action="../controller/cart/cart.controller.php">
                      <input type="hidden" name="prod_id" value="">
                      <input type="hidden" name="user_id" value="">

                      <input type="number" class="form-control" name="qty" min="0" max="" placeholder="Quantity" required>
                      <button name="addToCart" type="submit" class="btn btn-warning"><i class="fas fa-shopping-cart"></i></button>
                    </form>
                  </div>
                </div>     
                <?php
            }
        } ?>     
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
  <?php include 'templates/materialfoot.php'; ?>
</body>

</html>
<?php
    } else {
        echo "<script>alert('Login First');</script>";
        header('location:../login.php?Login%First');
    }
    ?>