<?php
		$servidor = "localhost";
		$utilizador = "id7329100_authentication";
		$pass = "#Qwerty3";
		$bd = "id7329100_authentication";
		$ligacao = new mysqli($servidor, $utilizador, $pass, $bd);

		if ($ligacao -> connect_error){
			die("Erro de conexão" . $ligacao -> connect_error);
		}
?>