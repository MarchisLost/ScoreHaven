<?php
		$servidor = "localhost";
		$utilizador = "root";
		$pass = "#Qwerty3";
		$bd = "authentication";
		$ligacao = new mysqli($servidor, $utilizador, $pass, $bd);

		if ($ligacao -> connect_error){
			die("Erro de conexão" . $ligacao -> connect_error);
		}

?>