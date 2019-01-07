<?php
//Insert Data
	include '../conecta_bd.php';

    session_start();

    $user_id=$_SESSION["id_u"];
    $nome_d = $_REQUEST['nome_d'];
	
	$check_db = $ligacao->query("SELECT nome_d, id_d FROM desporto WHERE nome_d = '$nome_d'");
		
	if($check_db->num_rows == 0) {
    	echo "not found";
	} 
	else {
    	//echo "$fav_sport"; //debug
    	$sql = "UPDATE users SET id_d = ( SELECT id_d FROM desporto WHERE nome_d = '$nome_d') WHERE id_u='$user_id'";
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