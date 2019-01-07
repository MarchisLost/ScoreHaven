<?php
    header("Content-Type: text/html; charset=ISO 8859-1", true);
    if(isset($_POST["sendMail"])){
        require '../conecta_bd.php';

        session_start();
        
        $user_username=$_SESSION["username"];
        $user_email=$_SESSION["email"];

       // echo $user_email;

        //criacao email
        $to = "ScoreHaven@gmail.com";
        $subject ="Help!";
        $msg = "The user  " ." " . $user_username ."  needs your help, his email is:" ." " .$user_email;
        
        $headers ="Replay-To: ScoreHaven@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        mail($to, $subject, $msg, $headers);


        header("Refresh:0; url=user_profile");
        
    }
?>