<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BugByte Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/styles.css" rel="stylesheet" type="text/css">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="background-image">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-7 col-lg-6 col-md-7">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <a class="sidebar-brand d-flex align-items-center justify-content-center mb-3" href="login.php" style="text-decoration: none;">
                    <div class="sidebar-brand-icon rotate-n-15">
                      <i class="fas fa-bug"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">BugByte</div>
                  </a>
                  <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                  <?php 
                      if(isset($_GET['error'])) {
                        if($_GET['error'] == "emptyfields") {
                          echo '<div class="alert alert-danger" role="alert"> Fill in all fields!</div>';
                        }
                        if($_GET['error'] == "invalidemailusername") {
                          echo '<div class="alert alert-danger" role="alert"> Invalid Username and Email!</div>';
                        }
                        if($_GET['error'] == "invalidemail") {
                          echo '<div class="alert alert-danger" role="alert"> Invalid Email</div>';
                        }
                        if($_GET['error'] == "invalidusername") {
                          echo '<div class="alert alert-danger" role="alert"> Invalid Username</div>';
                        }
                        if($_GET['error'] == "passwordCheck") {
                          echo '<div class="alert alert-danger" role="alert"> Passwords did not match</div>';
                        }
                        if($_GET['error'] == "usernametaken") {
                          echo '<div class="alert alert-danger" role="alert"> This username is taken</div>';
                        }
                      }



                    ?>
                </div>

                <form action="register.inc.php" class="user" method="POST">
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user" name="firstName" id="firstName" placeholder="First Name">
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control form-control-user" name="lastName" id="lastName" placeholder="Last Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username">
                  </div>
                  <div class="form-group row">
                    <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Email">
                  </div>
                  <div class="form-group row">
                    <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                  </div>
                  <div class="form-group row">
                    <input type="password" class="form-control form-control-user" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password">

                  </div>
                  <button type="submit" name="signup-submit" value="signup-submit" class="btn btn-info btn-user btn-block">
                    Create Account
                  </button>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="login.php">Already have an account? Login!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
