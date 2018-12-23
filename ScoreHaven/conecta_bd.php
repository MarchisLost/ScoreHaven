<?php
		$servidor = "localhost";
		$utilizador = "root";
		$pass = "";
		$bd = "scorehaven";
		$ligacao = new mysqli($servidor, $utilizador, $pass, $bd);

		if ($ligacao -> connect_error){
			die("Erro de conexão" . $ligacao -> connect_error);
		}

?>


<!-- conexao a bd online quando estiver pronta e dar swap, SUPOSTAMENTE!

		$servidor = "localhost";
		$utilizador = "id8288012_sh";
		$pass = "pedrodavid";
		$bd = "id8288012_scorehaven";
		$ligacao = new mysqli($servidor, $utilizador, $pass, $bd);

		if ($ligacao -> connect_error){
			die("Erro de conexão" . $ligacao -> connect_error);
		}
-->