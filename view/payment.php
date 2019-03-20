<?php
    require_once '../model/item.model.php';
    require_once '../model/order.model.php';
    require_once '../model/delivery.model.php';

     if ($_SESSION) {
         $item = new Item();
         $delivery = new Delivery();
         $order = new Orders();
         $getOrders = $order->getAllOrders(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Cart - Bakpak
  </title>
  <link rel="stylesheet" type="text/css" href="assets/css/stepper.css">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <?php include 'templates/materialhead.php'; ?>
</head>

<body class="profile-page sidebar-collapse" style="margin: 0;">
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
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/background-1.jpg')"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="assets/img/logo.png" alt="<?php echo $_SESSION['user']; ?>" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title"><?php echo $_SESSION['user']; ?></h3>
              </div>
            </div>
          </div>
        </div>
        <hr>
          <h3>Select Payment</h3><hr>
          <div class="row">
            <div class="col">              
              <div class="card bg-dark text-white">        
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#paymaya">
                <i class="fas fa-plus"></i> Add Promo
            </button>      
                <img class="card-img" src="assets/img/Paymaya.jpg" alt="Card image" style="display: block; max-width: 100%; height: auto;" >
                <!-- <div class="card-img-overlay">
                  <h4 class="card-title">Card title</h4>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text">Last updated 3 mins ago</p>
                </div> -->                               
              </div>              
            </div>
            <div class="col">
              <div class="card bg-dark text-white">
                <a href="#">
                <img class="card-img" src="assets/img/coins_ph.png" alt="Card image" style="display: block; max-width: 100%; height: auto;">
                <!-- <div class="card-img-overlay">
                  <h4 class="card-title">Card title</h4>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text">Last updated 3 mins ago</p>
                </div> -->
                </a>
              </div>
            </div>
            <div class="col">
              <div class="card bg-dark text-white">
                <a href="../controller/orders/cod.controller.php">
                <img class="card-img" src="assets/img/cod.jpg" alt="Card image" style="display: block; max-width: 100%; height: auto;">
                </a>
                <!-- <div class="card-img-overlay">
                  <h4 class="card-title">Card title</h4>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text">Last updated 3 mins ago</p>
                </div> -->
              </div>
            </div>
          </div><hr><br>
          <!-- paymaya modal -->
          <div class="modal fade" id="paymaya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="paymaya">Add Promo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    Hello                              
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="setup" class="btn btn-primary" id="addProd">Proceed</button>
                </div>
              </form>
                </div>
              </div>                                
            </div>
          </div>
                  <!-- End of add Modal -->
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li><a href="index.php">Bakpak</a></li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="fas fa-heart"></i> by
        <a href="index.php">Bakpak</a>
      </div>
    </div>
  </footer>
  <?php include 'templates/materialfoot.php'; ?>
  
</body>
<script type="text/javascript">

</script>
</html>
<?php
     } else {
         header('location:../login.php?loginFirst');
     }
?>