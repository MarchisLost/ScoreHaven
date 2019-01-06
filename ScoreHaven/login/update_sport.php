<?php
//Insert Data
	include '../conecta_bd.php';

    session_start();

    $user_id=$_SESSION["id"];
    $fav_sport = $_REQUEST['fav_sport'];
	
	$check_db = $ligacao->query("SELECT sport_name, id_sport FROM sport WHERE sport_name = '$fav_sport'");
		
	if($check_db->num_rows == 0) {
    	echo "not found";
	} 
	else {
    	//echo "$fav_sport"; //debug
    	$sql = "UPDATE users SET fav_s = ( SELECT id_sport FROM sport WHERE sport_name = '$fav_sport') WHERE id='$user_id'";
    	$execute = mysqli_query($ligacao, $sql);
    	

?>

		<div class="container">
	        <div class="alert alert-success">
	          <strong>Success!</strong> Favourite sport set successfully! Reload to see changes
	        </div>
	    </div>
<?php
	}

?>