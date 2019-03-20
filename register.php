<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="view/assets/img/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Bakpak - Online Shop for School Supplies
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="view/assets/fontawesome-free/css/all.css">
  <!-- CSS Files -->
  <link href="view/assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="view/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="index.php">Bakpak</a>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" style="background-image: url('view/assets/img/background-1.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="POST" action="controller/user/user.controller.php">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title" style="font-family: 'Century Gothic';">Registration</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-user"></i>
                        </span>
                      </div>
                      <input type="text" name="fname" class="form-control" placeholder="First Name" required="true">
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                      <input type="text" name="lname" class="form-control" placeholder="Last Name" required="true">
                    </div>
                  </div>                 
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-home"></i>
                        </span>
                      </div>
                      <input type="text" name="addr" class="form-control" placeholder="Address" required="true">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-home"></i>
                        </span>
                      </div>
                      <input type="text" name="addr2" class="form-control" placeholder="Address 2" required="true">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-8">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-envelope"></i>
                        </span>
                      </div>
                      <input type="email" name="email" class="form-control" placeholder="Email Address" required="true">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-mobile-alt"></i>
                        </span>
                      </div>
                      <input type="text" name="phone" class="form-control" placeholder="Phone Number" required="true">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-user"></i>
                        </span>
                      </div>
                      <input type="text" name="user" class="form-control" placeholder="Username" required="true">
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-lock"></i>
                        </span>
                      </div>
                      <input type="password" name="pass" class="form-control" placeholder="Password" required="true">
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-lock"></i>
                        </span>
                      </div>
                      <input type="password" name="confirm" class="form-control" placeholder="Confirm Password" required="true">
                    </div>
                  </div>
                </div>
                <div class="input-group">
                  <button type="submit" name="register" class="btn btn-primary btn-round btn-block">Register</button>
                </div>
              </div><br><br>
              <div class="footer text-center">
                <a href="login.php" class="btn btn-default btn-link btn-wd btn-lg">Already have an account? Click Here.</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
        <nav class="float-left">
          <ul>
            <li>
              <a href="#">
                About Us
              </a>
            </li>
            <li>
          </ul>
        </nav>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="view/assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="view/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="view/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="view/assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="view/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="view/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--	Plugin for Sharrre btn -->
  <script src="view/assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="view/assets/js/material-kit.js?v=2.0.4" type="text/javascript"></script>
</body>

</html>