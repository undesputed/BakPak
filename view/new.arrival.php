<?php
    require_once '../model/category.model.php';
    require_once '../model/sub.category.model.php';
    require_once '../model/user.model.php';
    require_once '../model/item.model.php';
    require_once '../model/cart.model.php';
     if ($_SESSION) {
         date_default_timezone_set('Asia/Manila');
         $start = date('Y-m-d');
         $startDate = $start;
         $date = DateTime::createFromFormat('Y-m-d', $startDate);
         $limitDate = $date->modify('-15 day');
         $newArrival = $limitDate->format('Y-m-d');
         //  include_once 'templates/header.php';
         //  include_once 'templates/materialhead.php';
         $user = new User();
         $item = new Item();
         $SubCat = new SubCategory();
         $cart = new Cart();
         $use = $user->getUserById($_SESSION['user_id']); ?>
<!doctype html>
<html lang="en">

<head>  <!-- Required meta tags -->
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="assets/img/logo.png">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>New Arrival Products - Bakpak</title>
  
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
                <li class="nav-item active">
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
                                        <td><img src="../../adminBakpak/view/assets/image/<?php echo $getItem['item_image']; ?>" height="50" width="50"></td>
                                        <td><?php echo $getItemv['item_name']; ?></td>
                                        <td><?php echo $getItem['unit_quantity']; ?></td>
                                        <td>₱ <?php echo $getItem['unit_quantity'] * $cp['unit_price']; ?></td>
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
                        <?php echo $use['user_fname'].' '.$use['user_lname']; ?>&nbsp;<i class="fa fa-user"></i>
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
            <h1 class="title text-center" style="font-family: 'Century Gothic'; background-color: rgba(0,0,0,0.8); padding: 10px; border-radius: 50px;">New Arrival</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <?php
            $getNew = $item->getAllItem();
         foreach ($getNew as $n) {
             if ($n['date_added'] >= $newArrival) {
                 ?>
              <a href="product.php?id=<?php echo $n['item_id']; ?>">
                <div class="card newArrival">
                  <h4 class="card-header card-header-info" style="overflow: hidden; text-overflow: ellipsis;"><?php echo $n['item_name']; ?></h4>
                  <div class="card-body">
                    <img class="card-img-top" src="../../adminBakpak/view/assets/image/<?php echo $n['item_image']; ?>" alt="Card image cap" style="display: block; max-width: 100%; height: 100px;">
                    <p class="card-text" style="overflow: hidden; text-overflow: ellipsis;"><?php echo $n['item_description']; ?></p>
                    <p class="card-text">₱ <?php echo $n['unit_price']; ?> / <?php echo $n['unit_measure']; ?></p>
                    <a href="#" class="btn btn-warning"><i class="fas fa-shopping-cart"></i></a>
                  </div>
                </div>
              </a> 
             <?php
             }
         } ?>
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