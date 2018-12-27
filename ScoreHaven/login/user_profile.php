<?php
    header("Content-Type: text/html; charset=ISO 8859-1",true);

    include '../conecta_bd.php';

  	session_start();

    $user_id=$_SESSION["id"];
    $user_username=$_SESSION["username"];
    $user_email=$_SESSION["email"];

    $sql_sport="select sport.sport_name from sport inner join users on sport.id_sport = users.fav_s where users.id='$user_id'";
    $execute_sport = mysqli_query($ligacao, $sql_sport);

    $sql_league="select league.league_name from league inner join users on league.id_league = users.fav_l where users.id=$user_id";
    $execute_league = mysqli_query($ligacao, $sql_league);

    $sql_team="select team.team_name from team inner join users on team.id_team = users.fav_t where users.id=$user_id";
    $execute_team = mysqli_query($ligacao, $sql_team);

    if (isset($_POST['change_username_save_btn'])) {
    	$new_username = $_POST["new_username"];
    	$select_u = mysqli_query($ligacao, "SELECT `username` FROM `users` WHERE `username` = '$new_username'") or exit(mysqli_error($ligacao));

        if(mysqli_num_rows($select_u)) {
?>
        	<div class="container">
              <div class="alert alert-warning">
                <strong>Warning!</strong> The username is already being used
              </div>
            </div>
<?php
		}
		else{
			$sql_username_change = "UPDATE users SET username='$new_username' WHERE id='$user_id'";
    		mysqli_query($ligacao, $sql_username_change);

?>
			<script type="text/javascript">
				$("#change_username_save_btn").click(function() {
					$("#change_username_form").hide();
					$("#change_username_btn").show();
				});			
			</script>

			<div class="container">
	            <div class="alert alert-success">
	              <strong>Success!</strong> Username changed successfully! Relog to see changes
	            </div>
	        </div>

<?php
		}
    }

    if (isset($_POST['change_email_save_btn'])) {
    	$new_email = $_POST["new_email"];

		function match($allowed_d, $new_email) //criaçao da funçao para verificar se o email e valido
		{
			foreach($allowed_d as $allowed){
				if (strpos($new_email, $allowed) !== false) {
			  	return true;
				}
			}
			return false;
		}

    	$allowed_d = array('@gmail.com', '@outlook.com', '@outlook.pt');

		if(!match($allowed_d, $new_email)){ //verifica se existe algum dos endereçoes de email validos no email escrito pelo utilizador, caso
	        	//nao exista, e mostrado o aviso abaixo
?>
	        <div class="container">
	        	<div class="alert alert-warning">
	            	<strong>Warning!</strong> Enter only trusted email address providers
	            </div>
	        </div>
<?php
		}
		else {
        	$select_m = mysqli_query($ligacao, "SELECT `email` FROM `users` WHERE `email` = '$new_email'") or exit(mysqli_error($ligacao));
          	if(mysqli_num_rows($select_m)) {
?>
	            <div class="container">
	              <div class="alert alert-warning">
	                <strong>Warning!</strong> The email is already being used
	              </div>
	            </div>
<?php
          	}
          	else{
          		$sql_email_change = "UPDATE users SET email='$new_email' WHERE id='$user_id'";
    			mysqli_query($ligacao, $sql_email_change);
?>
				<script type="text/javascript">
					$("#change_username_save_btn").click(function() {
						$("#change_email_form").hide();
						$("#change_email_btn").show();
					});
				</script>

				<div class="container">
		            <div class="alert alert-success">
		              <strong>Success!</strong> Username changed successfully! Relog to see changes
		            </div>
		        </div>
<?php
          	}
        }
	}

	if (isset($_POST['change_password_save_btn'])) {
		$new_password = $_POST["new_password"];
		$new_password2 = $_POST["new_password2"];

		if ($new_password == $new_password2) {
			$new_password = md5($new_password); //hash password before storing for security purposes
			$sql_password_change = "UPDATE users SET password='$new_password' WHERE id='$user_id'";
    		mysqli_query($ligacao, $sql_password_change);
?>
			<script type="text/javascript">
				$("#change_username_save_btn").click(function() {
					$("#change_password_form").hide();
					$("#change_password_btn").show();
				});
			</script>

			<div class="container">
	            <div class="alert alert-success">
	              <strong>Success!</strong> Password changed successfully! Relog to see changes
	            </div>
	        </div>
<?php
		}
		else {

?>
			<div class="container">
	            <div class="alert alert-warning">
	            	<strong>Warning!</strong> The 2 passwords must match
	            </div>
	        </div>
<?php
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_SESSION["username"];?>'s Profile</title>

      <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <!-- End of Bootstrap -->

    <!-- Links for the footer style -->
    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <!-- End of the links for the footer style -->

    <link rel="stylesheet" type="text/css" href="css/profile.css">
</head>
<body>

<!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
              <a id="logo_navbar_text_type" class="navbar-brand" href="index">
                    <img src="../img/sitelogo.svg" width="35" height="35" class="d-inline-block align-top" alt="">
                    Score<span id="logo_text_color">Haven</span>
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
        
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="index">Soccer</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="basketball">Basketball</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="volleyball">Volleyball</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="hockey">Hockey</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Other
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="amfootball">AM.Football</a>
                      <a class="dropdown-item" href="tennis">Tennis</a>
                      <a class="dropdown-item" href="cricket">Cricket</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="iphone">Iphone</a>
                  </li>
                </ul>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item dropdown show nav-item active">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          <i class="fa fa-user"></i> My Profile </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                          <a class="dropdown-item waves-effect waves-light" href="#">My account</a>
                          <a class="dropdown-item waves-effect waves-light" href="#">Log out</a>
                        </div>
                      </li>
                    </ul>
                </div>
              </div>
        </div>
    </nav>
<!-- End of Navigation Bar -->

<!-- Main Content -->
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    	<?php echo $_SESSION["username"];?>´s Profile
                                    </h5>
                                    <h6>
                                        <?php echo $_SESSION["email"];?>
                                    </h6>
                                    <p class="proile-rating">Member since : <span>Data (Ir buscar a bd)</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Settings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="PDF"/> <!-- Botao PDF -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION["username"];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION["email"];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Favourite Sport</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>    
<?php
                                                    if ($execute_sport !== false) {
                                                        while($linha = mysqli_fetch_array($execute_sport)){
                                                            $sql_sport = $linha['sport_name'];

                                                            echo $sql_sport;
                                                        }
                                                    }else {
                                                        echo 'Choose one on the settings tab';
                                                    }
?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Favourite League</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
<?php
                                                    if ($execute_league !== false) {
                                                        while($linha = mysqli_fetch_array($execute_league)){
                                                            $sql_league = $linha['league_name'];

                                                            echo $sql_league;
                                                        }
                                                    }else {
                                                        echo 'Choose one on the settings tab';
                                                    }
?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Favourite Player</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
<?php
                                                    if ($execute_team !== false) {
                                                        while($linha = mysqli_fetch_array($execute_team)){
                                                            $sql_team = $linha['team_name'];

                                                            echo $sql_team;
                                                        }
                                                    }else {
                                                        echo 'Choose one on the settings tab';
                                                    }
?>
                                                </p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Change Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" id="change_username_btn" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#change_username_form">Change</button>
                                                <div class="collapse" id="change_username_form">
                                                    <form method="post">
                                                        <p>
                                                            <input type="text" class="form-control" name="new_username" required="required" placeholder="Enter new username...">
                                                            <br>
                                                            <button type="submit" name="change_username_save_btn" id="change_username_save_btn" class="btn btn-success btn-sm">
                                                              <span class="glyphicon glyphicon-ok"></span> Save 
                                                            </button>
                                                            <input class="btn btn-default btn-sm" id="change_username_cancel_btn" type="reset" value="Cancel">
                                                            <span class="glyphicon glyphicon-remove"></span>
                                                        </p> 
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Change Password</label>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" id="change_password_btn" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#change_password_form">Change</button>
                                                <div class="collapse" id="change_password_form">
                                                    <form method="post">
                                                        <p>
                                                            <input type="password" class="form-control" name="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="required" placeholder="Enter new password...">
                                                            <br>
                                                            <input type="password" class="form-control" name="new_password2" required="required" placeholder="Confirm new password...">
                                                            <br>
                                                            <button type="submit" class="btn btn-success btn-sm" class="change_password_save_btn" name="change_password_save_btn" id="change_password_save_btn">
                                                              <span class="glyphicon glyphicon-ok"></span> Save 
                                                            </button>
                                                            <input class="btn btn-default btn-sm" id="change_password_cancel_btn" type="reset" value="Cancel">
                                                            <span class="glyphicon glyphicon-remove"></span>
                                                        </p>    
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Change Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" id="change_email_btn" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#change_email_form">Change</button>
                                                <div class="collapse" id="change_email_form">
                                                    <form method="post">
                                                        <p>
                                                          <input type="email" class="form-control" required="required" name="new_email" placeholder="Enter new email...">
                                                          <br>  
                                                            <button type="submit" name="change_email_save_btn" id="change_email_save_btn" class="btn btn-success btn-sm">
                                                                <span class="glyphicon glyphicon-ok"></span> Save 
                                                            </button>
                                                            <input class="btn btn-default btn-sm" id="change_email_cancel_btn" type="reset" value="Cancel">
                                                            <span class="glyphicon glyphicon-remove"></span>
                                                        </p>                                                 
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Change Favorite Sport</label>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="dropdown scrollable-menu">
												  <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												    Pick one
												  </button>
												  <div class="dropdown-menu force-scroll" aria-labelledby="dropdownMenuButton">
												    <a class="dropdown-item" href="#">Action</a>
												    <a class="dropdown-item" href="#">Another action</a>
												    <a class="dropdown-item" href="#">Something else here</a>
												    <a class="dropdown-item" href="#">Action</a>
												    <a class="dropdown-item" href="#">Another action</a>
												    <a class="dropdown-item" href="#">Something else here</a>
												    <a class="dropdown-item" href="#">Action</a>
												    <a class="dropdown-item" href="#">Another action</a>
												    <a class="dropdown-item" href="#">Something else here</a>
												  </div>
												</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Change Favorite Team</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Caixa de texto para atualizar o campo na bd</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Change Favorite Player</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Caixa de texto para atualizar o campo na bd</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label id="note_color"> Note: You can only change one setting at the time</label>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
<!-- End of Main Content -->

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


<script type="text/javascript">

    $("#change_username_btn").click(function() {
        $("#change_username_btn").hide();
        $("#change_username_form").show();
    });

    $("#change_password_btn").click(function() {
        $("#change_password_btn").hide();
        $("#change_password_form").show();
    });

    $("#change_email_btn").click(function() {
        $("#change_email_btn").hide();
        $("#change_email_form").show();
    });

    $("#change_username_cancel_btn").click(function() {
        $("#change_username_form").hide();
        $("#change_username_btn").show();
    });

    $("#change_password_cancel_btn").click(function() {
        $("#change_password_form").hide();
        $("#change_password_btn").show();
    });

    $("#change_email_cancel_btn").click(function() {
        $("#change_email_form").hide();
        $("#change_email_btn").show();
    });

</script>

</body>
</html>