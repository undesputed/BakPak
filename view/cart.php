<?php
    require_once '../model/cart.model.php';
    require_once '../model/user.model.php';
    require_once '../model/item.model.php';
    require_once '../model/history.model.php';
    require_once '../model/order.model.php';
    require_once '../model/delivery.model.php';

    if ($_SESSION) {
        $cart = new Cart();
        $user = new User();
        $item = new Item();
        $delivery = new Delivery();
        $history = new History();
        $order = new Orders();
        $getUser = $user->getUserById($_SESSION['user_id']);
        $total = 0;
        $order_code = 0;
        $getCartById = $cart->getCartByUser($_SESSION['user_id']); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Cart - Bakpak
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
                <img src="assets/img/logo.png" alt="<?php echo $_SESSION['user']; ?>" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title"><?php echo $_SESSION['user']; ?></h3>
              </div>
            </div>
          </div>
        </div><hr>
        <div class="row">
          <div class="col-md-2" style="background-color: #d9d9db; padding: 10px; border-radius: 25px;">
              <ul class="nav nav-pills nav-pills-primary flex-column">
                <li class="nav-item">
                  <a class="nav-link" href="#profile" data-toggle="tab">
                    <i class="fas fa-cog"></i>Profile
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="#cart" data-toggle="tab">
                    <i class="fas fa-shopping-cart"></i>Cart
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#history" data-toggle="tab">
                    <i class="fas fa-history"></i>History
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#delivery" data-toggle="tab">
                    <i class="fas fa-bell"></i>Delivery
                  </a>
                </li>
              </ul>
          </div>
          <div class="col-md-10">
              <div class="tab-content">
                  <div class="tab-pane" id="profile">
                    <div class="card card-nav-tabs">
                      <div class="card-header card-header-warning text-center">
                        <b>Update Profile</b>
                      </div>
                      <div class="card-body">
                        <form method="post" action="../controller/user/user.controller.php">
                          <input type="hidden" name="id" value="<?php echo $_SESSION['user_id']; ?>" required>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="fname"><i class="far fa-user"></i>&nbsp;&nbsp;First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $getUser['user_fname']; ?>" required>
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label for="lname"><i class="fas fa-user"></i>&nbsp;&nbsp;Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $getUser['user_lname']; ?>" required>
                              </div>
                            </div>                            
                          </div>
                          <div class="row">
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label for="addr"><i class="fas fa-home"></i>&nbsp;&nbsp;Address</label>
                                <input type="text" class="form-control" id="addr" name="addr" value="<?php echo $getUser['user_address']; ?>" required>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label for="addr2"><i class="fas fa-home"></i>&nbsp;&nbsp;Address 2</label>
                                <input type="text" class="form-control" id="addr2" name="addr2" value="<?php echo $getUser['user_address2']; ?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label for="email"><i class="far fa-envelope"></i>&nbsp;&nbsp;Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $getUser['user_email']; ?>" required>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label for="postal"><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $getUser['user_phone']; ?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="user"><i class="far fa-user"></i>&nbsp;&nbsp;Username</label>
                                <input type="text" class="form-control" id="user" name="user" value="<?php echo $getUser['user_username']; ?>" required>
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
                  <div class="tab-pane active" id="cart">
                    <form method="post" action="../controller/orders/order.controller.php">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card card-nav-tabs">
                              <div class="card-header card-header-info text-center">
                                <b>Shopping Cart</b>
                              </div>
                              <div class="card-body">
                                  <table id="cart_table" class="table product-overview">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product info</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th style="text-align:center">Total</th>
                                            <th style="text-align:center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $get = $cart->getAllCart();
        foreach ($get as $c) {
            if ($c['user_id'] == $_SESSION['user_id']) {
                //  var_dump($cart['quantity']);
                $getItem = $item->getItemById($c['item_id']); ?>                
                                 <input hidden type="text" class="cart_id" value="<?php echo $c['user_id']; ?>">
                                        <tr>
                                            <td width="150"><img src="../../adminBakpak/view/assets/image/<?php echo $getItem['item_image']; ?>" alt="iMac" width="80"></td>
                                            <td width="550">
                                                <h5 class="font-500"><?php echo $getItem['item_name']; ?></h5>
                                                <p><?php echo $getItem['item_description']; ?></p>
                                            </td>
                                            <td class="unit_price"><?php echo $getItem['unit_price']; ?></td>
                                            <td width="70">
                                                <?php if ($c['item_id'] == $getItem['item_id']) {
                    $totalCart = $cart->getCartByUser($_SESSION['user_id']);
                    $totalProd = count($totalCart);
                    $order_code = $_SESSION['user_id'].''.$c['cart_id'];
                    $totalQty = $c['quantity'];
                    $total = ($c['quantity'] * $getItem['unit_price']);
                    // $total = $total;
                    // echo count($getCartById);
                    // echo $total;?>

                                                <input type="number" id="qty" class="form-control" placeholder="1" name="quantity" value="<?php echo $c['quantity']; ?>">
                                    
                                            </td>
                                            <td width="150" align="center" class="total font-500"><?php echo $c['quantity'] * $getItem['unit_price']; ?></td>
                                            <td align="center"><a href="../controller/cart/delete.controller.php?id=<?php echo $c['cart_id']; ?>" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash text-dark"></i></a></td>
                                        </tr>   
                                                <?php
                }
            }
        } ?>                         
                                    </tbody>
                                </table>
                              </div>
                            </div>
                        </div>                        
                        <div class="col">
                            <div class="card card-nav-tabs">
                              <div class="card-header card-header-warning text-center">
                                <b>Cart Summary</b>
                              </div>
                              <div class="card-body">
                                <small>Total Price</small>
                                <!-- <form method="post" action="../controller/orders/order.controller.php"> -->
                                <input type="text" name="order_code" value="<?php echo $order_code; ?>" hidden>
                                <?php
                                $get = $cart->getAllCart();
        foreach ($get as $c) {
            if ($c['user_id'] == $_SESSION['user_id']) {
                ?>
                                <input type="text" name="item_id" value="<?php echo $c['item_id']; ?>" hidden >
                                <input type="text" name="quantity" value="<?php echo $c['quantity']; ?>" hidden>

                                <!-- <h2 class="" hidden><input type="text" name="totalPrice" style="width:300px" value="<?php echo 0; ?>" class="grandTotal" disabled></h2> -->
                                    <?php
            }
        } ?>
                                    <h2 class=""><input type="text" name="totalPrice" style="width:300px" value="<?php  $getTotal = $cart->getTotal($_SESSION['user_id']);
        echo $getTotal['total']; ?>" class="grandTotal" disabled></h2>
                                    <hr>
                                    <a href="payment.php" name="checkout" class="btn btn-success btn-block checkout">Checkout</button>
                                <!-- </form>                                 -->
                                <a href="../controller/cart/delete.all.controller.php?id=<?php echo $_SESSION['user_id']; ?>" class="btn btn-default btn-outline btn-block">Cancel</a>
                              </div>
                            </div><br><br><br>
                            <div class="card card-nav-tabs">
                              <div class="card-header card-header-danger text-center">
                                <b>For Any Support</b>
                              </div>
                              <div class="card-body">
                                <h4><i class="ti-mobile"></i> 09296604887 (Toll Free)</h4> <small>Please contact with us if you have any questions. We are avalible 24h.</small>
                              </div>
                            </div>
                        </div>
                    </div>
                    </form>
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
                                              <td></td>
                                              <td><a href="../controller/history/delete.history.controller.php?id=<?php echo $g['history_id']; ?>"><i class="fa fa-trash"></i></a></td>
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
                  <div class="tab-pane" id="delivery">
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

    $(document).ready(function(){
        // /$('cart_table').dataTables();
        $('body').on('change','#qty', function(){
                // var quantity = $(this).closest('tr').find('#qty').val();
                // var unit_price = $(this).closest('tr').find('.unit_price').text();
                // var total =$(this).closest('tr').find('.total').text();
                
                // for(var h=0;h<unit_price;h++){
                //     unit_price = unit_price.replace(',','');
                // }
                // for(var i=0;i<total;i++){
                //     total = total.replace(',','');
                // }


                // total = parseFloat(unit_price) * quantity;
                // // alert(total);                
                // $(this).closest('tr').find('.total').text(total);
                var p = $(this).closest('tr').find('.unit_price').text();
                var q = $(this).val();
                var total = parseInt(p, 10) * parseFloat(q);
                // alert(total);
                if(!isNaN(total)){
                    $(this).closest('tr').find('.total').text(total.toFixed(2));
                    var grandTotal = 0;
                    $('.total').each(function(){
                        var stval = parseFloat($(this).text());
                        grandTotal += isNaN(stval) ? 0 : stval;
                    });
                    $('.grandTotal').val(grandTotal.toFixed(2));
                }
                else{                    
                    return false;
                }
        });

        $('.checkout').on('click',function(){
        }); 

        // $('#cancel').on('click',function(){
        //     var bool = confirm('Do you want to cancel all Items??');
        //     var user_id = $('.cart_id').val();
        //     var base_url = "../model/";

        //     if(!bool){
        //         return false;
        //     }
            
        //     $.post(base_url+'cart.model.php/deleteCart',{user_id:user_id},function(response){
        //         $('.table_content').html(response).promise().done(function(){
        //             $('#cart_table').show();
        //         });
        //     });
        // });
    });
  </script>
</body>

</html>
<?php
    } else {
        echo "<script>alert('Login First');</script>";
        header('location:../login.php?Login%First');
    }?>