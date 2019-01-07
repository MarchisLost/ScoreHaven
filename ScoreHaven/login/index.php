<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; 
    charset=ISO 8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ScoreHaven</title>

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
    <link rel="stylesheet" href="../CSS/styles.css">
    <!-- End of CSS files -->

</head>
<body>
    
    <button onclick="topFunction()" id="backtotop" title="Go to top">Back to Top</button>
    
    <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("backtotop").style.display = "block";
        } else {
            document.getElementById("backtotop").style.display = "none";
        }
    }
    
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>


	<div id="container">
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
		    	      <li class="nav-item active">
		    	        <a class="nav-link" href="index">Soccer<span class="sr-only">(current)</span></a>
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
		    	          <div class="dropdown-divider"></div>
		    	          <a class="dropdown-item" href="iphone"></a>
		    	      </li>
		    	    </ul>
		    	    	<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
					        <ul class="navbar-nav ml-auto">
					          <li class="nav-item dropdown show">
					            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					              <i class="fa fa-user"></i> My Profile </a>
					            <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
					              <a class="dropdown-item waves-effect waves-light" href="user_profile.php">My account</a>
					              <a class="dropdown-item waves-effect waves-light" href="../logoff.php">Log out</a>
					            </div>
					          </li>
					        </ul>
	      				</div>
		    	</div>
		    </div>
		</nav>
	<!-- End of Navigation Bar -->

	<!-- Center -->
		<div id="body">
	        <div class="row">	
	        	<div class="col-lg-3"></div>	
	          	<div class="col-lg-6" id="api">
	            	<?php if(strpos($con = ini_get("disable_functions"), "fsockopen") === false) {if(is_resource($fs = fsockopen("www.livescore.in", 80, $errno, $errstr, 3)) && !($stop = $write = !fwrite($fs, "GET //free/lsapi HTTP/1.1\r\nHost: www.livescore.in\r\nConnection: Close\r\nlsfid: 343745\r\n\r\n"))) {$content = "";while (!$stop && !feof($fs)) {$line = fgets($fs, 128);($write || $write = $line == "\r\n") && ($content .= $line);}fclose($fs);$c = explode("\n", $content);foreach($c as &$r) {$r = preg_replace("/^[0-9A-Fa-f]+\r/", "", $r);}$content = implode("", $c);} else $content .= $errstr."(".$errno.")<br />\n";} elseif(strpos($con, "file_get_contents") === false && ini_get("allow_url_fopen")) {$content = file_get_contents("https://www.livescore.in/free/lsapi", false, stream_context_create(array("http" => array("timeout" => 3, "header" => "lsfid: 343745 "))));} elseif(extension_loaded("curl") && strpos($con, "curl_") === false) {curl_setopt_array($curl = curl_init("https://www.livescore.in/free/lsapi"), array(CURLOPT_RETURNTRANSFER => true, CURLOPT_HTTPHEADER => array("lsfid: 343745 ")));$content = curl_exec($curl);curl_close($curl);} else {$content = "PHP inScore cannot be loaded. Ask your web hosting provider to allow `file_get_contents` function along with `allow_url_fopen` directive or `fsockopen` function.";}echo $content; ?>
	          	</div>
	          	<div class="col-lg-3">
	          		<iframe frameborder="0"
	                	scrolling="no"
	                	id="chat_embed"
	                	src="https://www.twitch.tv/embed/itachi_the_exile/chat"
	                	height="500"
	                	width="350">
	            	</iframe>
	          </div>	
	        </div>
	    </div>
	<!-- End of Center -->

	<!-- Footer -->
	    <div id="footer" class="bg-dark">
	      	<br>
	        <p  id="company" class="m-0 text-center text-white">Copyright &copy; ScoreHaven 2018</p>
	        <p id="contributor" class="m-0 text-center text-gray">Livescore service provided by: <a href="http://www.livescore.in/" title="Livescore.in" target="_blank">Livescore.in</a></p>
	        <br>
	    </div>
	<!-- End of Footer -->
	</div>

</body>
</html>