<?php
    require_once '../model/item.model.php';
     if ($_SESSION) {
         $item = new Item();
         $getItem = $item->getItemById($_GET['id']);
         $related = $item->getItemBySubCat($getItem['sub_category_id']); ?>
<!doctype html>
<html lang="en">

<head>
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="assets/img/logo.png">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title><?php echo $getItem['item_name']; ?> - Bakpak</title>
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
                                  <a href="#" class="dropdown-item">
                                    <table class="table">
                                      <tr>
                                        <td><img src="" height="50" width="50"></td>
                                        <td></td>
                                        <td></td>
                                        <td>₱ </td>
                                      </tr>
                                    </table>
                                    
                                  </a>
                        </div><hr>
                        <a href="cart.php" class="dropdown-item">See Cart</a>
                      </div>
                    </li>
                    <li class="dropdown nav-item">
                    <a href="#pablo" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <h6 class="dropdown-header"><i class="fas fa-bell"></i>&nbsp;&nbsp;Notification<b class="caret"></b></h6>
                      <a href="#" class="dropdown-item">Notification 1</a>
                      <hr><a href="#" class="dropdown-item text-center">See all notification</a>
                    </div>
                  </li>
                  <li class="dropdown nav-item">
                    <a href="#pablo" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown">
                        <?php echo $_SESSION['user']; ?>&nbsp;<i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <h6 class="dropdown-header"><i class="fa fa-user"></i>&nbsp;&nbsp;My Profile</h6>
                      <a href="updateAccount.php" class="dropdown-item"><i class="fas fa-cog"></i>&nbsp;&nbsp;Account Settings</a>
                      <a href="../controller/user/logout.controller.php" class="dropdown-item"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Logout</a>
                    </div>
                  </li>
                </ul>
              </div>
        </div>
    </div>
</nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/background-1.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand text-center">
            <h1>Bakpak</h1>
            <h3 class="title text-center">Your backup to your school pack</h3>
            <a href="index.php"><button class="btn btn-rose btn-round btn-lg">Shop Now</button></a>
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
            <img src="../../adminBakpak/view/assets/image/<?php echo $getItem['item_image']; ?>" style="display: block; max-width: 100%; height: auto;">
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
                <form method="post" action="../controller/cart/cart.controller.php">
                <input type="number" name="qty" class="form-control" min="1" value="1">
                <input type="item_id" name="item_id" value="<?php echo $getItem['item_id']; ?>" class="form-control" hidden>
                <input type="user_id" name="user_id" value="<?php echo $_SESSION['user_id']; ?>"class="form-control" hidden>
              </div>
              <div class="col">
                <button type="submit" name="prodtocart" class="btn btn-info btn-lg" role="button"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;&nbsp;Add to Cart</a>
              </div>
              <div class="col">
                <button type="submit" name="buynow" class="btn btn-warning btn-lg" role="button"><i class="far fa-money-bill-alt"></i>&nbsp;&nbsp;&nbsp;Buy Now</a>
              </div>
              </form>
            </div><hr>
              Rate:
            <div class="row">
            <form method="post" action="">
              <div class="star-rating" style="width:100%;">
            <input id="star-5" type="radio" name="rating1" value="star-5">
            <label for="star-5" title="5 stars">
              <i class="active fa fa-star" aria-hidden="true"></i>
            </label>
            <input id="star-4" type="radio" name="rating2" value="star-4">
            <label for="star-4" title="4 stars">
              <i class="active fa fa-star" aria-hidden="true"></i>
            </label>
            <input id="star-3" type="radio" name="rating3" value="star-3">
            <label for="star-3" title="3 stars">
              <i class="active fa fa-star" aria-hidden="true"></i>
            </label>
            <input id="star-2" type="radio" name="rating4" value="star-2">
            <label for="star-2" title="2 stars">
              <i class="active fa fa-star" aria-hidden="true"></i>
            </label>
            <input id="star-1" type="radio" name="rating5" value="star-1">
            <label for="star-1" title="1 star">
              <i class="active fa fa-star" aria-hidden="true"></i>
            </label>
              </div>
            </form>
            </div>
          </div>
        </div><hr>
        <h3 class="text-left">Related Products</h3><hr>
        <div class="newArrivalContainer">
          <?php foreach ($related as $r) {
             ?>
              <a href="product.php?id=<?php echo $r['item_id']; ?>">
                <div class="card newArrival">
                  <h4 class="card-header card-header-info" style="overflow: hidden; text-overflow: ellipsis;"><?php echo $r['item_name']; ?></h4>
                  <div class="card-body">
                    <img class="card-img-top" src="../../adminBakpak/view/assets/image/<?php echo $r['item_image']; ?>" alt="Card image cap" style="display: block; max-width: 100%; height: auto;">
                    <p class="card-text" style="overflow: hidden; text-overflow: ellipsis;"><?php echo $r['item_description']; ?></p>
                    <p class="card-text">₱  <?php echo $r['unit_price']; ?>/<?php echo $r['unit_measure']; ?> </p>
                    <a href="login.php" class="btn btn-warning"><i class="fas fa-shopping-cart"></i></a>
                  </div>
                </div>
              </a> 
          <?php
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
                       <img src="assets/img/logo.png" alt="..." class="avatar img-raised">
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

  <?php include 'templates/materialfoot.php'; ?>
</body>

</html>
<?php
        //  include_once 'templates/materialfoot.php';
     } else {
         header('location:../login.php');
     }
?>