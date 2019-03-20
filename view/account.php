<?php
    require_once '../model/user.model.php';
    require_once '../model/history.model.php';
    require_once '../model/user.model.php';
    require_once '../model/item.model.php';
    require_once '../model/delivery.model.php';
    require_once '../model/order.model.php';

    if ($_SESSION) {
        $user = new User();
        $history = new History();
        $user = new User();
        $item = new Item();
        $delivery = new Delivery();
        $order = new Orders();
        $get = $user->getUserById($_SESSION['user_id']); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Account Settings - Bakpak
  </title>
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
                  <a href="#" class="nav-link">New Arrival</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Promo</a>
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
                                <td>₱</td>
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
                        &nbsp;<i class="fa fa-user"></i><?php echo $_SESSION['user']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <h6 class="dropdown-header"><i class="fa fa-user"></i>&nbsp;&nbsp;My Profile</h6>
                      <a href="account.php" class="dropdown-item"><i class="fas fa-cog"></i>&nbsp;&nbsp;Account Settings</a>
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
                <img src="assets/img/logo.png" alt="" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title"></h3>
              </div>
            </div>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-md-2" style="background-color: #d9d9db; padding: 10px; border-radius: 25px;">
              <ul class="nav nav-pills nav-pills-primary flex-column">
                <li class="nav-item">
                  <a class="nav-link active" href="#profile" data-toggle="tab">
                    <i class="fas fa-cog"></i>Profile
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#history" data-toggle="tab">
                    <i class="fas fa-history"></i>History
                  </a>
              </li>
                <li class="nav-item">
                  <a class="nav-link" href="#notification" data-toggle="tab">
                    <i class="fas fa-bell"></i>Notification
                  </a>
                </li>
              </ul>
          </div>
          <div class="col-md-10">
              <div class="tab-content">
                  <div class="tab-pane active" id="profile">
                    <div class="card card-nav-tabs">
                      <div class="card-header card-header-warning text-center">
                        <b>Update Profile</b>
                      </div>
                      <div class="card-body">
                        <form method="post" action="../controller/user/user.controller.php">
                          <input type="hidden" name="id" value="<?php echo $get['user_id']; ?>" required>
                              <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="fname"><i class="far fa-user"></i>&nbsp;&nbsp;First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $get['user_fname']; ?>" required>
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label for="lname"><i class="fas fa-user"></i>&nbsp;&nbsp;Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $get['user_lname']; ?>" required>
                              </div>
                            </div>                            
                          </div>
                          <div class="row">
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label for="addr"><i class="fas fa-home"></i>&nbsp;&nbsp;Address</label>
                                <input type="text" class="form-control" id="addr" name="addr" value="<?php echo $get['user_address']; ?>" required>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label for="addr2"><i class="fas fa-home"></i>&nbsp;&nbsp;Address 2</label>
                                <input type="text" class="form-control" id="addr2" name="addr2" value="<?php echo $get['user_address2']; ?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label for="email"><i class="far fa-envelope"></i>&nbsp;&nbsp;Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $get['user_email']; ?>" required>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label for="phone"><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $get['user_phone']; ?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="user"><i class="far fa-user"></i>&nbsp;&nbsp;Username</label>
                                <input type="text" class="form-control" id="user" name="user" value="<?php echo $get['user_username']; ?>" required>
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label for="pass"><i class="fas fa-lock"></i>&nbsp;&nbsp;Old Password</label>
                                <input type="password" class="form-control" id="pass" name="pass" required>
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label for="newpass"><i class="fas fa-lock"></i>&nbsp;&nbsp;New Password</label>
                                <input type="password" class="form-control" id="newpass" name="newpass">
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label for="confirmnewpass"><i class="fas fa-lock"></i>&nbsp;&nbsp;Confirm New Password</label>
                                <input type="password" class="form-control" id="confirmnewpass" name="confirmnewpass" disabled="true" required="true">
                              </div>
                            </div>
                          </div>
                          <button type="submit" name="update" class="btn btn-info float-right">Update Profile</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="history">
                    <div class="col-lg-14">
                        <div class="card card-nav-tabs">
                          <div class="card-header card-header-info text-center">
                            <b>History</b>
                          </div>
                          <div class="card-body">
                              <table id="cart_table" class="table product-overview">
                                <thead>
                                    <tr>
                                      <th>Order Code</th>
                                      <th>Delivery Code</th>
                                      <th>Item Name</th>
                                      <th>Quantity</th>
                                      <th style="text-align:center">Total</th>
                                      <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $getHist = $history->getAllHistory();
        foreach ($getHist as $g) {
            if ($g['user_id'] == $_SESSION['user_id']) {
                ?>
                                    <tr style="text-align: center;">
                                      <td><?php echo $g['order_code']; ?></td>
                                      <td><?php echo $g['delivery_code']; ?></td>
                                      <td><?php $getItem = $item->getItemById($g['item_id']);
                echo $getItem['item_name']; ?></td>
                                      <td><?php $getOrderQty = $order->getOrderByCode($g['order_code']);
                echo $getOrderQty['quantity']; ?></td>
                                        <td><?php $getTotal = $order->sumAllOrder($g['order_code']);
                echo $getTotal['total']; ?></td>
                                        <td><a href="../controller/history/delete.controller.php?id=<?php echo $g['history_id']; ?>"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                  <?php
            }
        } ?>
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div> 
                  </div>
                  <div class="tab-pane" id="notification">
                      Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                      <br><br>Dynamically innovate resource-leveling customer service for state of the art customer service.
                  </div>
              </div>
          </div>
        </div><hr><br><br>
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
  <script type="text/javascript">
    $('#newpass').keyup(function(){
      if($(this).val() != ''){
        $('#confirmnewpass').removeAttr('disabled');
      }else{
        $('#confirmnewpass').val('');
        $('#confirmnewpass').attr('disabled','true');
      }
    });
  </script>
</body>

</html>
<?php
    } else {
        echo "<script>alert('Login First');</script>";
        header('location:../login.php?Login%first');
    }
?>