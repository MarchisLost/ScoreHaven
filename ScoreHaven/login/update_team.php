<?php
//Insert Data
	include '../conecta_bd.php';

    session_start();

    $user_id=$_SESSION["id"];
    $fav_team = $_REQUEST['fav_team'];
	
	$check_db = $ligacao->query("SELECT team_name, id_team FROM team WHERE team_name = '$fav_team'");
		
	if($check_db->num_rows == 0) {
    	echo "not found";
	} 
	else {
    	//echo "$fav_team"; //debug
    	$sql = "UPDATE users SET fav_t = ( SELECT id_team FROM team WHERE team_name = '$fav_team') WHERE id='$user_id'";
    	$execute = mysqli_query($ligacao, $sql);
    	

?>

		<div class="container">
	        <div class="alert alert-success">
	          <strong>Success!</strong> Favourite team set successfully! Reload to see changes
	        </div>
	    </div>
<?php
	}

?>