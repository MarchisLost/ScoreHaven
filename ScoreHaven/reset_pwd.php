<?php
    if(isset($_POST["newpwd_btn"])){
        $selector = $_POST["selector"];
        $valdiator = $_POST["validator"];
        $pwd1 = $_POST["pwd"];
        $pwd2 = $_POST["pwd2"];

    }else{
        header("Location: ../index.php");
    }
?>