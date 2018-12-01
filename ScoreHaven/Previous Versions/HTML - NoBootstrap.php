<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; 
    charset=ISO 8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>ScoreHaven- Never miss the result of a game again</title>

	<style type="text/css">

	* {
    	box-sizing: border-box;
	}
	
	/*Background HomePage */	
	html{
		background: url(stadium.png) no-repeat center fixed; 
 		background-size: cover;
	}	
	body {
		height: 100%;
  		margin: 0;
	}
	/* Header */
	.header {
	    background-color: #f1f1f1;
	    padding: 20px;
	    background-color: black;
	    color: white;
	}
	.header a{
		left: 30px;
		color: white;
		text-decoration: none;
		display: inline-block;
	}
	.header h3{
		float: right;
		padding: 14px 25px;
   		text-align: center;
	}
	/* Navigation Bar */
	.navbar {
	    overflow: hidden;
	    background-color: #333;
	    font-family: Arial, Helvetica, sans-serif;
	}

	.navbar a {
	    float: left;
	    font-size: 16px;
	    color: white;
	    text-align: center;
	    padding: 14px 16px;
	    text-decoration: none;
	}
	.dropdown {
	    float: left;
	    overflow: hidden;
	}

	.dropdown .dropbtn {
	    cursor: pointer;
	    font-size: 16px;    
	    border: none;
	    outline: none;
	    color: white;
	    padding: 14px 16px;
	    background-color: inherit;
	    font-family: inherit;
	    margin: 0;
	}

	.navbar a:hover, .dropdown:hover .dropbtn, .dropbtn:focus {
	    background-color: red;
	}

	.dropdown-content {
	    display: none;
	    position: absolute;
	    background-color: #f9f9f9;
	    min-width: 160px;
	    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	    z-index: 1;
	}

	.dropdown-content a {
	    float: none;
	    color: black;
	    padding: 12px 16px;
	    text-decoration: none;
	    display: block;
	    text-align: left;
	}

	.dropdown-content a:hover {
	    background-color: #ddd;
	}

	.show {
	    display: block;
	}

	/* Create three unequal columns that floats next to each other */
	.column {
	    float: left;
	    padding: 10px;
	}

	/* Left and right column */
	.column.side {
	    width: 25%;
	}

	/* Middle column */
	.column.middle {
	    width: 50%;
	}

	/* Clear floats after the columns */
	.row:after {
	    content: "";
	    display: table;
	    clear: both;
	}

	/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
	@media screen and (max-width: 600px) {
	    .column.side, .column.middle {
	        width: 100%;
	    }
	}

	/* Style the footer */
	.footer {
	    background-color: black;
	    color: white;
	    padding: 10px;
	    text-align: center;
	    bottom: 0;
	    left: 0;
	    width: 100%;
	    position: relative;
	}

</style>

</head>
<body>

	<div class="header">
  		<a href="home.php">
  			<h1>ScoreHaven</h1>
  		</a>
  		<h3>Your haven when it comes to livescores</h3>
	</div>

	<div class="navbar">
	  <a href="#home">Home</a>
	  <a href="#basketball">Basketball</a>
	  <a href="#volley">Volleyball</a>
	  <a href="#hockey">Hockey</a>

	  <div class="dropdown">
	    <button class="dropbtn" onclick="myFunction()">Dropdown
	    	<!-- "fa fa caret down is the little arrow at the right side of the dropdown option" -->
	      <i class="fa fa-caret-down"></i>
	    </button>
	    <div class="dropdown-content" id="myDropdown">
	      <a href="#">Sport 1</a>
	      <a href="#">Sport 2</a>
	      <a href="iphone.html" target="_blank">Iphone</a>
	    </div>
	  </div> 
	</div>

<script>
	/* When the user clicks on the button, 
	toggle between hiding and showing the dropdown content */
	function myFunction() {
	    document.getElementById("myDropdown").classList.toggle("show");
	}

	// Close the dropdown if the user clicks outside of it
	window.onclick = function(e) {
	  if (!e.target.matches('.dropbtn')) {
	    var myDropdown = document.getElementById("myDropdown");
	      if (myDropdown.classList.contains('show')) {
	        myDropdown.classList.remove('show');
	      }
	  	}
	}
</script>

	<div class="row">
	  <div class="column side">
	  
	  </div>
	  <div class="column middle">
		<?php if(strpos($con = ini_get("disable_functions"), "fsockopen") === false) {if(is_resource($fs = fsockopen("www.livescore.in", 80, $errno, $errstr, 3)) && !($stop = $write = !fwrite($fs, "GET //free/lsapi HTTP/1.1\r\nHost: www.livescore.in\r\nConnection: Close\r\nlsfid: 889305\r\n\r\n"))) {$content = "";while (!$stop && !feof($fs)) {$line = fgets($fs, 128);($write || $write = $line == "\r\n") && ($content .= $line);}fclose($fs);$c = explode("\n", $content);foreach($c as &$r) {$r = preg_replace("/^[0-9A-Fa-f]+\r/", "", $r);}$content = implode("", $c);} else $content .= $errstr."(".$errno.")<br />\n";} elseif(strpos($con, "file_get_contents") === false && ini_get("allow_url_fopen")) {$content = file_get_contents("https://www.livescore.in/free/lsapi", false, stream_context_create(array("http" => array("timeout" => 3, "header" => "lsfid: 889305 "))));} elseif(extension_loaded("curl") && strpos($con, "curl_") === false) {curl_setopt_array($curl = curl_init("https://www.livescore.in/free/lsapi"), array(CURLOPT_RETURNTRANSFER => true, CURLOPT_HTTPHEADER => array("lsfid: 889305 ")));$content = curl_exec($curl);curl_close($curl);} else {$content = "PHP inScore cannot be loaded. Ask your web hosting provider to allow `file_get_contents` function along with `allow_url_fopen` directive or `fsockopen` function.";}echo $content;
		?>
	  </div>
	  <div class="column side">
	   
	  </div>
	</div>

	<div class="footer">
		<p>Livescore service provided by:</p>
		<p><a href="http://www.livescore.in/" title="Livescore.in">Livescore.in</a></p>
	</div>

</body>
</html>