<?php
    if(isset($_POST["request_new_pass"])){

        $selector = bin2hex(randow_bytes(8));
        $token = randow_bytes(32);

        $url = "ScoreHaven1.000webhostapp.com/create_new_pass.php?selector=" .$selector ."&validator=" .bin2hex($token); //diretivo para onde o user vai, mais as variaveis a serem enviadas

        $expires = date("U") + 900; //determina o tempo em que o token estara ativo 

        require '../conecta_bd.php';

        $userEmail = $_POST["email"];

        $sql = "DELET FROM pwdResert WHERE pwdResetEmail=?";
        $stmt = mysqli_stmt_init($ligacao);

        if(!mysli_stmt_prepare($stmt, $sql)){
            echo "Error";
            exit();
        } else{
            mysqli_stmt_bin_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
        }

        $sql="INSERT INTO pwdReset (pwdRsetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($ligacao);

        if(!mysli_stmt_prepare($stmt, $sql)){
            echo "Error";
            exit();
        } else{
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            mysqli_stmt_bin_param($stmt, "ssss", $userEmail, $selector, $hashedtoken, $expires);
            mysqli_stmt_execute($stmt);
        }
           
        mysqli_stmt_close($stmt);
        mysqli_close();

        //criacao email
        $to = $userEmail;
        $subject ="Reset your password";
        $msg = "<p>This is a password reset request. If you did not request this reset, please ignore this email.</p> <br> Thank You!";
        $msg .= "<p>Here is your password reset link: </br>";
        $msg .= "<a href=" .$url ."></a></p>";

        $headers = "From: ScoreHaven <ScoreHaven@gmail.com>\r\n";
        $headers .="Replay-To: ScoreHaven@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        mail($to, $subject, $msg, $headers);

        header("Location: ../reset_pass.?Reset=sucess");

    }else{
        header("Location: ../index.php");
    }