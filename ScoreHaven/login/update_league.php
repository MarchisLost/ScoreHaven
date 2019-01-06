<?php
//Insert Data
	include '../conecta_bd.php';

    session_start();

    $user_id=$_SESSION["id"];
    $fav_league = $_REQUEST['fav_league'];
	
	$check_db = $ligacao->query("SELECT league_name, id_league FROM league WHERE league_name = '$fav_league'");
		
	if($check_db->num_rows == 0) {
    	echo "not found";
	} 
	else {
    	//echo "$fav_league"; //debug
    	$sql = "UPDATE users SET fav_l = ( SELECT id_league FROM league WHERE league_name = '$fav_league') WHERE id='$user_id'";
    	$execute = mysqli_query($ligacao, $sql);
    	

?>

		<div class="container">
	        <div class="alert alert-success">
	          <strong>Success!</strong> Favourite league set successfully! Reload to see changes
	        </div>
	    </div>
<?php
	}

?>