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
        <div class="col-lg-4 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="POST" action="controller/user/user.controller.php">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title" style="font-family: 'Century Gothic';">Login</h4>
              </div>
              <p class="description text-center">Or Be Classical</p><br>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-user"></i>
                    </span>
                  </div>
                  <input type="text" name="username" class="form-control" placeholder="Username" required="true">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-key"></i>
                    </span>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="Password" required="true">
                </div>
                <div class="input-group">
                  <button type="submit" name="login" class="btn btn-primary btn-round btn-block">Login</button>
                </div>
              </div>
              <div class="footer text-center">
                <a href="register.php" class="btn btn-default btn-link btn-wd btn-lg">Don't have an account yet?</a>
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