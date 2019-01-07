<?php
    if(isset($_POST["request_new_pass"])){

        require '../conecta_bd.php';

        $user_username=$_SESSION["username"];
        $user_email=$_SESSION["email"];

        //criacao email
        $to = "ScoreHaven@gmail.com";
        $subject ="Help!";
        $msg = "The user" .$user_username ."needs your help, his email is:" .$user_email;
        
        $headers ="Replay-To: ScoreHaven@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        mail($to, $subject, $msg, $headers);

        header('Location: ../user_profile');
    }