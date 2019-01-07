<?php
//Insert Data
	include '../conecta_bd.php';

    session_start();

    $user_id=$_SESSION["id_u"];
    $username = $_REQUEST['username'];
    
    $check_db = $ligacao->query("SELECT username FROM users WHERE username = '$username'");
	


    	//echo "$fav_sport"; //debug
    	$sql = "UPDATE users SET active = 1 WHERE username='$username'";
    	$execute = mysqli_query($ligacao, $sql);
    	

?>

		<div class="container">
	        <div class="alert alert-success">
	          <strong>Success!</strong> User account activated
	        </div>
	    </div>
<?php
	
	
?>