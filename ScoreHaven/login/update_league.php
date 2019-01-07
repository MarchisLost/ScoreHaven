<?php
//Insert Data
	include '../conecta_bd.php';

    session_start();

    $user_id=$_SESSION["id_u"];
    $nome_l = $_REQUEST['nome_l'];
	
	$check_db = $ligacao->query("SELECT nome_l, id_l FROM liga WHERE nome_l = '$nome_l'");
		
	if($check_db->num_rows == 0) {
    	echo "not found";
	} 
	else {
    	//echo "$fav_league"; //debug
    	$sql = "UPDATE users SET id_l = ( SELECT id_l FROM liga WHERE nome_l = '$nome_l') WHERE id_u='$user_id'";
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