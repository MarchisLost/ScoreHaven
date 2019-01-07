<?php
//Insert Data
	include '../conecta_bd.php';

    session_start();

    $user_id=$_SESSION["id_u"];
    $nome_e = $_REQUEST['nome_e'];
	
	$check_db = $ligacao->query("SELECT nome_e, id_e FROM equipa WHERE nome_e = '$nome_e'");
		
	if($check_db->num_rows == 0) {
    	echo "not found";
	} 
	else {
    	//echo "$fav_team"; //debug
    	$sql = "UPDATE users SET id_e = ( SELECT id_e FROM equipa WHERE nome_e = '$nome_e') WHERE id_u='$user_id'";
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