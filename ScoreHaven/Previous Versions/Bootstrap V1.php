<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; 
    charset=ISO 8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ScoreHaven</title>

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

    <!-- CSS files -->
    <link rel="stylesheet" href="styles2.css">
    <link rel="stylesheet" href="footer.css">
    <!-- End of CSS files -->

</style>
</head>
<body>

<!-- Background
	<div class="container">
		<img src="stadium.png" class="img-fluid" alt="Responsive image">
	</div>
       
End of background -->

<!-- Navigation bar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		    <div class="container-fluid">
	    	  <a id="logo_navbar_text_type" class="navbar-brand" href="index.php">
	    	  		<img src="sitelogo.png" width="35" height="35" class="d-inline-block align-top" alt="">
	        		Score<span id="logo_text_color">Haven</span>
	    	  </a>
	    	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    	    <span class="navbar-toggler-icon"></span>
	    	  </button>
	    
	    	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    	    <ul class="navbar-nav mr-auto">
	    	      <li class="nav-item active">
	    	        <a class="nav-link" href="index.php">Soccer<span class="sr-only">(current)</span></a>
	    	      </li>
	    	      <li class="nav-item">
	    	        <a class="nav-link" href="basketball" title="Basketball">Basketball</a>
	    	      </li>
	    	      <li class="nav-item">
	    	        <a class="nav-link" href="volleyball" title="Volleyball">Volleyball</a>
	    	      </li>
	    	      <li class="nav-item">
	    	        <a class="nav-link" href="hockey" title="Hockey">Hockey</a>
	    	      </li>
	    	      <li class="nav-item dropdown">
	    	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    	          Other
	    	        </a>
	    	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	    	          <a class="dropdown-item" href="amfootball" title="AMFootball">AM.Football</a>
	    	          <a class="dropdown-item" href="tennis" title="Tennis">Tennis</a>
	    	          <a class="dropdown-item" href="cricket" title="Cricket">Cricket</a>
	    	          <div class="dropdown-divider"></div>
	    	          <a class="dropdown-item" href="iphone" title="Iphone">Iphone</a>
	    	      </li>
	    	    </ul>
	    	    	<div>
	    		    	<button type="button" class="btn btn-outline-secondary">Create Account</button>
	    		    	<button type="button" class="btn btn-outline-success">LOGIN</button>
	    		    </div>
	    	  </div>
	        </div>
		</nav>
<!-- End of Navigation Bar -->

<!-- Center -->
     <div class="container">
            <?php if(strpos($con = ini_get("disable_functions"), "fsockopen") === false) {if(is_resource($fs = fsockopen("www.livescore.in", 80, $errno, $errstr, 3)) && !($stop = $write = !fwrite($fs, "GET //free/lsapi HTTP/1.1\r\nHost: www.livescore.in\r\nConnection: Close\r\nlsfid: 889305\r\n\r\n"))) {$content = "";while (!$stop && !feof($fs)) {$line = fgets($fs, 128);($write || $write = $line == "\r\n") && ($content .= $line);}fclose($fs);$c = explode("\n", $content);foreach($c as &$r) {$r = preg_replace("/^[0-9A-Fa-f]+\r/", "", $r);}$content = implode("", $c);} else $content .= $errstr."(".$errno.")<br />\n";} elseif(strpos($con, "file_get_contents") === false && ini_get("allow_url_fopen")) {$content = file_get_contents("https://www.livescore.in/free/lsapi", false, stream_context_create(array("http" => array("timeout" => 3, "header" => "lsfid: 889305 "))));} elseif(extension_loaded("curl") && strpos($con, "curl_") === false) {curl_setopt_array($curl = curl_init("https://www.livescore.in/free/lsapi"), array(CURLOPT_RETURNTRANSFER => true, CURLOPT_HTTPHEADER => array("lsfid: 889305 ")));$content = curl_exec($curl);curl_close($curl);} else {$content = "PHP inScore cannot be loaded. Ask your web hosting provider to allow `file_get_contents` function along with `allow_url_fopen` directive or `fsockopen` function.";}echo $content;
            ?>
    </div>
<!-- End of Center -->

<!-- Footer -->
    <footer class="footer-distributed">
		<div class="footer-left">
			<h3>Score<span>Haven</span></h3>
			<p class="footer-links">
				<a href="#">Home</a>
				·
				<a href="#">About</a>
				·
				<a href="#">Faq</a>
			</p>
			<p class="footer-company-name">ScoreHaven &copy; 2018</p>
		</div>
		<div class="footer-center">
			<div>
				<i class="fa fa-map-marker"></i>
				<p><span>Universidade Lusófona</span> Oporto, Portugal</p>
			</div>

			<div>
				<i class="fa fa-phone"></i>
				<p>+351 123 456789</p>
			</div>

			<div>
				<i class="fa fa-envelope"></i>
				<p><a href="mailto:scorehaven@gmail.com">scorehaven@gmail.com</a></p>
			</div>
		</div>
		<div class="footer-right">
			<p class="footer-company-about">
				<span>Contributors</span>
				Livescore service provided by: <a href="http://www.livescore.in/" title="Livescore.in" target="_blank">Livescore.in</a>
			</p>
			<div class="footer-icons">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-github"></i></a>
			</div>
		</div>
	</footer>
<!-- End of Footer-->

</body>
</html>