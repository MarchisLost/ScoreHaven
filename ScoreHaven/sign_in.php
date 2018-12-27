<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO 8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ScoreHaven - Sign in</title>

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

<!-- Confirmação dos dados inseridos pelo utilizador -->
<?php

 // header("Content-Type: text/html; charset=ISO 8859-1",true);esta a dar o mesmo erro do session start, dunno why

  header("Content-Type: text/html; charset=ISO 8859-1",true);

  include 'conecta_bd.php';

  if(isset($_POST["login_btn"])){ 

    session_start();

    $name= $_POST["username"]; //receber os dados que o utilizador escreveu

    /*//codigo pra ir buscar o salt a bd
    $sql_salt="select salt from encript";                 
    $sql_s= mysqli_query($ligacao, $sql_salt);
    $salt= mysqli_fetch_assoc($sql_s);*/
    //echo $salt; //debug*/

    //$salt="pedro123david";
    $passw=md5($_POST["password"]);
    //echo $passw; debug
    $sql_r="select password from users where username= '$name'";
    $sql_pw= mysqli_query($ligacao, $sql_r);
    $pw= mysqli_fetch_assoc($sql_pw);
     
    //compara a pw que o utilizador com a que esta guardada na bd
    //se for verdadeiro vai buscar os dados a bd sobre esse utilizador e gurdados na session onde vao ser usados no dados.php
    if($pw["password"] == $passw){
      $sel_sql="select username,email,id_u, data_insc from users where username= '$name'";
      $info= mysqli_query($ligacao, $sel_sql);
      $data= mysqli_fetch_assoc($info);

      $_SESSION["username"]=$data['username'];
      $_SESSION["email"]=$data['email'];
      $_SESSION["id"]=$data['id'];
      $_SESSION["data_insc"]=$data['data_insc'];
      //echo "aaaaaaaaaaaaaaahhh"; //debug

      header("Location: login/user_profile.php");

    }else{
?>
      <div class="container">
        <div class="alert alert-warning">
          <strong>Warning!</strong> Username or password incorrect, try again please.
        </div>
      </div>

      <!--ou-->

      <!--<script>
        alert("O seu username ou password estão incorretos \nTorne a inserir os dados! \nObrigado!");
      </script>-->

<?php
    }
  }
?>  

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" method="post">
              <div class="form-label-group">
                <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
                <label for="inputUsername">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="login_btn" type="submit">Sign in</button>
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