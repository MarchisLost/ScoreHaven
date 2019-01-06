<?php
    if(isset($_POST["newpwd_btn"])){
        $selector = $_POST["selector"];
        $valdiator = $_POST["validator"];
        $pwd1 = $_POST["pwd"];
        $pwd2 = $_POST["pwd2"];

        if(empty($pwd) || empty($pwd2)){
            header("Location: ../sign_in.php");
            exit();

        }elseif($pwd != $pwd2){
            header("Location: ../sign_in.php");
            exit();
        }

        $currentDate= date("U");
        require "conecta_bd.php";

        $sql= "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >=?";

        $stmt = mysqli_stmt_init($ligacao);

        if(!mysli_stmt_prepare($stmt, $sql)){
            echo "Error";
            exit();
        } else{
            mysqli_stmt_bin_param($stmt, "s", $selector);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            if(!$row = mysqli_fetch_assoc($result)){
                echo "You need to re-submit your reset request.";
                exit();
            }else{
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

                if($tokenCheck === false){
                    echo "You need to re-submit your reset request.";

                }elseif($tokenCheck === true){
                    $tokenEmail = $row["pwdResetEmail"];

                    $sql = "SELECT * FROM users WHERE emailUsers=?;";

                }
            }
        }

    }else{
        header("Location: ../index.php");
    }
?>