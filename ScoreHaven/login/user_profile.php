<!DOCTYPE html>
<html>
<head>
    <title></title>

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
                    <img src="img/sitelogo.svg" width="35" height="35" class="d-inline-block align-top" alt="">
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
                        <div class="dropdown-menu dropdown-menu-right dropdown-info show" aria-labelledby="navbarDropdownMenuLink-4">
                          <a class="dropdown-item waves-effect waves-light" href="#">My account</a>
                          <a class="dropdown-item waves-effect waves-light" href="#">Settings</a>
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
                                        Username (Ir buscar a bd)
                                    </h5>
                                    <h6>
                                        Email (Ir buscar a bd)
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
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Ir buscar a bd</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Ir buscar a bd</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Favourite Sport</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Ir buscar a bd</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Favourite Team</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Ir buscar a bd</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Favourite Player</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Ir buscar a bd</p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Change Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Caixa de texto para atualizar o campo na bd</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Change Password</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Caixa de texto para atualizar o campo na bd</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Change Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Caixa de texto para atualizar o campo na bd</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Change Favorite Sport</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Caixa de texto para atualizar o campo na bd</p>
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
</body>
</html>