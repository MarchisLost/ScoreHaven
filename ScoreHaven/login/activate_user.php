<?php
    header("Content-Type: text/html; charset=ISO 8859-1",true);

    include '../conecta_bd.php';

  	session_start();
  	
  	$user_id=$_SESSION["id_u"];
  	$username = $_SESSION["username"];

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
                          <a class="dropdown-item waves-effect waves-light" href="user_profile">My account</a>
                          <a class="dropdown-item waves-effect waves-light" href="..\index">Log out</a>
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
<div class="row">
    <div class="col-md-6">
        <label>Activate Users</label>
    </div>
    <div class="col-md-6">
        <div>
            <form method="post">
                <select name="activate_user" class="form-control" onchange="return getval(this);">
                    <?php 
                        $sql = mysqli_query($ligacao, "SELECT username FROM users WHERE active=0");
                        while ($row = $sql->fetch_assoc()){
                            echo "<option value=\"{$row['username']}\">{$row['username']}</option>";
                        }
                    ?>
                </select> 
                 <div id="result"></div>                                             
            </form>
        </div> 
    </div>
</div>
<!-- End of Main Content -->

<script type="text/javascript">
        function getval(sel) {
        var username = sel.value;
        var htm = $.ajax({
        type: "POST",
        url: "update_user.php",
        data: "username=" + username,
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

</script>

</body>
</html>