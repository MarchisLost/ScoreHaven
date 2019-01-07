<?php
    header("Content-Type: text/html; charset=ISO 8859-1",true);

    include '../conecta_bd.php';

  	session_start();

    //variveis vem do sign in por session  
    $user_username=$_SESSION["username"];
    $user_email=$_SESSION["email"];
    $user_id=$_SESSION["id_u"];
    $user_data_insc=$_SESSION['data_insc'];

    //buscar o desporto, equipa e liga favorita do user
    $sql_sport="SELECT desporto.nome_d from desporto left join users on desporto.id_d = users.id_d where users.id_u=$user_id";
    $execute_sport = mysqli_query($ligacao, $sql_sport);
    $numlinha1 = mysqli_num_rows($execute_sport);

    $sql_league="SELECT liga.nome_l from liga left join users on liga.id_l = users.id_l where users.id_u=$user_id";
    $execute_league = mysqli_query($ligacao, $sql_league);
    $numlinha2 = mysqli_num_rows($execute_league);

    $sql_team="SELECT equipa.nome_e from equipa left join users on equipa.id_e = users.id_e where users.id_u=$user_id";
    $execute_team = mysqli_query($ligacao, $sql_team);
    $numlinha3 = mysqli_num_rows($execute_team);

    //Mudar username
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
			$sql_username_change = "UPDATE users SET username='$new_username' WHERE id_u='$user_id'";
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

    //Mudar email
    if (isset($_POST['change_email_save_btn'])) {
    	$new_email = $_POST["new_email"];

		function match($allowed_d, $new_email) //cria�ao da fun�ao para verificar se o email e valido
		{
			foreach($allowed_d as $allowed){
				if (strpos($new_email, $allowed) !== false) {
			  	return true;
				}
			}
			return false;
		}

    	$allowed_d = array('@gmail.com', '@outlook.com', '@outlook.pt');

		if(!match($allowed_d, $new_email)){ //verifica se existe algum dos endere�oes de email validos no email escrito pelo utilizador, caso
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

    //Mudar password
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
                      <a class="dropdown-item" href="iphone"></a>
                  </li>
                </ul>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item dropdown show nav-item active">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          <i class="fa fa-user"></i> My Profile </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                          <a class="dropdown-item waves-effect waves-light" href="#">My account</a>
                          <a class="dropdown-item waves-effect waves-light" href="..\logoff.php">Log out</a>
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
                        <form action="upload_pic.php" metod="post" enctype="multipart/form-data">
                            <div class="profile-img"> 
<?php
                                //Seleçao da imagem de perfil, se houver uma na bd daquele user usa se essa, caso contrario fica a default
                                $sql = "SELECT img_p FROM users WHERE id_u = $user_id";
                                $res = mysqli_query($ligacao, $sql);

                                //Even tho the next 2 lines output the same thing, the first one is used in OOP, while the 2nd one not, so ill use the seond one unless ill work in OOP
                                //while($row = $sql -> fectch_assoc())
                                while($row = mysqli_fetch_assoc($res)){
                                    if($row["img_p"] != NULL){
                                        $imgP = base64_encode($row["img_p"]);
                                        echo '<img width="240" high="240" src = "data:image/jpeg;base64, '.$imgP.'"  />';
                                    }else{
                                        echo '<img src="uploads/profileD.jpg" alt="Profile Picture"/>';
                                    }
                                }
?>
                                <div class="file btn btn-lg btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Change Photo
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    	<?php echo $_SESSION["username"];?>'s Profile
                                    </h5>
                                    <h6>
                                        <?php echo $_SESSION["email"];?>
                                    </h6>
                                    <p class="proile-rating"> <span> Member since : <?php echo $_SESSION["data_insc"];?> </span></p>
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
                    
                    <!-- Botao para criar PDF -->
                    <div class="col-md-2">
                        <form action = "cpdf.php">
                            <input type="submit" class="profile-edit-btn" name="btncrtPDF" value="PDF"/> 
                        </form>
                    </div>                   
                </div>
                <div class="row">
                    <div class="col-md-4">

                    <!--Apresentação das informações do user -->
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
                                            //print do desporto, liga e equipa favorita
                                            if ($numlinha1 != NULL) {
                                                while($linha = $execute_sport -> fetch_assoc()){
                                                    echo $linha["nome_d"];
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
                                            if ($numlinha2 != NULL) {
                                                while($linha = mysqli_fetch_array($execute_league)){
                                                    echo $linha['nome_l'];
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
                                        <label>Favourite Team</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
<?php
                                            if ($numlinha3 != NULL) {
                                                while($linha = mysqli_fetch_array($execute_team)){
                                                    echo $linha['nome_e'];
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
                                                <button type="button" id="change_sport_btn" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#change_sport_form">Change</button>
                                                <div class="collapse" id="change_sport_form">
                                                    <form method="post">
                                                        <select name="select_fav_sport" class="form-control" onchange="return getval(this);">
                                                            <?php 
                                                                $sql = mysqli_query($ligacao, "SELECT nome_d FROM desporto");
                                                                while ($row = $sql->fetch_assoc()){
                                                                    echo "<option value=\"{$row['nome_d']}\">{$row['nome_d']}</option>";
                                                                }
                                                            ?>
                                                        </select> 
                                                         <div id="result"></div>                                             
                                                    </form>
                                                </div>  
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Change Favorite League</label>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" id="change_league_btn" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#change_league_form">Change</button>
                                                <div class="collapse" id="change_league_form">
                                                    <form method="post">
                                                        <select name="select_fav_league"class="form-control" onchange="return getval2(this);">
                                                            <?php 
                                                                $sql = mysqli_query($ligacao, "SELECT nome_l FROM liga WHERE id_d IN (SELECT id_d FROM users WHERE id_u='$user_id')");
                                                                while ($row = $sql->fetch_assoc()){
                                                                    echo "<option value=\"{$row['nome_l']}\">{$row['nome_l']}</option>";
                                                                }
                                                            ?>
                                                        </select> 
                                                         <div id="result2"></div>                                             
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Change Favorite Team</label>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" id="change_team_btn" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#change_team_form">Change</button>
                                                <div class="collapse" id="change_team_form">
                                                    <form method="post">
                                                        <select name="select_fav_team"class="form-control" onchange="return getval3(this);">
                                                            <?php 
                                                                $sql = mysqli_query($ligacao, "SELECT nome_e FROM equipa WHERE id_d IN (SELECT id_d FROM users WHERE id_u='$user_id') ORDER BY nome_e");
                                                                while ($row = $sql->fetch_assoc()){
                                                                    echo "<option value=\"{$row['nome_e']}\">{$row['nome_e']}</option>";
                                                                }
                                                            ?>
                                                        </select> 
                                                        <div id="result3"></div>                                             
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label id="note_color"> Note: You can only change one setting at the time.
                                                    <br>
                                                    Choose favorite sport first to be able to choose a league.
                                                </label>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="upload_pic.php" method="POST" enctype="multipart/form-data" >
        <input class="btn btn-light" type="file" name="file">
        <button type="submit" class="btn btn-light" name="submit_img" value="img_send">Upload</button>                                                                                 
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End of Modal -->

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

        function getval(sel) {
        var nome_d = sel.value;
        var htm = $.ajax({
        type: "POST",
        url: "update_sport.php",
        data: "nome_d=" + nome_d,
        async: false
        }).responseText;

        if(htm)
        {
            $("#result").html(htm);
            return true;
        }
        else
        {
            $("#result").html("no result found");
            return false;
        }
    }

    function getval2(sel) {
        var nome_l = sel.value;
        var htm = $.ajax({
        type: "POST",
        url: "update_league.php",
        data: "nome_l=" + nome_l,
        async: false
        }).responseText;

        if(htm)
        {
            $("#result2").html(htm);
            return true;
        }
        else
        {
            $("#result2").html("no result found");
            return false;
        }
    }

    function getval3(sel) {
        var nome_e = sel.value;
        var htm = $.ajax({
        type: "POST",
        url: "update_team.php",
        data: "nome_e=" + nome_e,
        async: false
        }).responseText;

        if(htm)
        {
            $("#result3").html(htm);
            return true;
        }
        else
        {
            $("#result3").html("no result found");
            return false;
        }
    }
</script>

</body>
</html>