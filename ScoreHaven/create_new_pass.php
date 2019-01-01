<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO 8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ScoreHaven - Create New Password</title>

  <!-- All sizes including Android,iOS... Favicon -->
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="img/favicon/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="img/favicon/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="img/favicon/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="img/favicon/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="img/favicon/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="img/favicon/favicon-196x196.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="img/favicon/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="img/favicon/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="img/favicon/favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="img/favicon/favicon-128.png" sizes="128x128" />
	<meta name="application-name" content="&nbsp;"/>
	<meta name="msapplication-TileColor" content="img/favicon/#FFFFFF" />
	<meta name="msapplication-TileImage" content="img/favicon/mstile-144x144.png" />
	<meta name="msapplication-square70x70logo" content="img/favicon/mstile-70x70.png" />
	<meta name="msapplication-square150x150logo" content="img/favicon/mstile-150x150.png" />
	<meta name="msapplication-wide310x150logo" content="img/favicon/mstile-310x150.png" />
	<meta name="msapplication-square310x310logo" content="img/favicon/mstile-310x310.png" />
    <!-- End of Favicon -->


    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.13/css/all.css"></script>
    <!-- End of Bootstrap -->
 

    <!-- Links for the footer style -->
    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <!-- End of the links for the footer style -->

    <!-- CSS files -->
    <link rel="stylesheet" href="login/css/sign_in.css">
    <!-- End of CSS files -->

</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <form class="form-signin" action="Create_email_new_pass" method="post">
              <div class="form-label-group">
                <?php 
                $selector = $_GET["selector"];
                $validator = $_GET["valdiator"];

                if(empty($selector) || empty($validator)){
                    echo "Could not validaete your request!";
                }elseif(ctype_xdigit($selector) == true && ctype_xdigit($validator) == true){
?>
                    <form action="reset_pwd" method="post">
                        <input class="form-control" type="hidden" name="selector" value="<?php echo $selector ?>">
                        <input class="form-control" type="hidden" name="validator" value="<?php echo $validator ?>">
                        <input class="form-control" type="password" name="pwd" placehodler="Enter New password">
                        <input class="form-control" type="password" name="pwd2" placehodler="Enter New password again">
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="newpwd_btn">Reset Password</button>
                    </form>
<?php
                }
                ?>
                <input type="text" id="inputUsername" name="email" class="form-control" placeholder="Enter you e-mail adress" required autofocus>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="request_new_pass">Receive new password by email</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Footer -->
<footer class="bg-dark">
      <div class="container">
      	<br>
        <p  id="company" class="m-0 text-center text-white">Copyright &copy; ScoreHaven 2018</p>
        <p id="contributor" class="m-0 text-center text-gray">Livescore service provided by: <a href="http://www.livescore.in/" title="Livescore.in" target="_blank">Livescore.in</a></p>
        <br>
      </div>
    </footer>
<!-- End of Footer -->

</body>
</html>