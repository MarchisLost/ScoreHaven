<?php
    if(isset($_POST["newpwd_btn"])){
        $selector = $_POST["selector"];
        $valdiator = $_POST["validator"];
        $pwd1 = $_POST["pwd"];
        $pwd2 = $_POST["pwd2"];

        if(empty($pwd1) || empty($pwd2)){
            header("Location: ../creat_new_pass.php");
            exit();
        }elseif($pwd1 != $pwd2){
            header("Location: ../creat_new_pass.php");
            exit();
        }

        $currentDate = date("U");

        include 'conecta_bd.php';
        
        $sql = "Select * From pwdReset Where pwdResetSelector = ? AND pwdResetExpires >= ";
        if(!mysli_stmt_prepare($stmt, $sql)){
            echo "Error";
            exit();
        } else{
            mysqli_stmt_bin_param($stmt, "s", $selector);
            mysqli_stmt_execute($stmt);

            $res = mysqli_stmt_get_result($stmt);
            if(!$row = mysqli_fetch_asoc($res)){
                echo "You need to re-submite your reser request.";
                exit();
            }else{
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

                if($tokenCheck === false){
                    echo "You need to re-submit your reset request.";
                    exit();
                }elseif($tokenCheck === true){
                    $tokenEmail = $row["pwdRestEmail"];

                    $sql = "SELECT * FROM users WHERE email =?";
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        echo "Error";
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        $res = mysqli_stmt_get_result($stmt);
                        if(!$row = mysqli_fetch_assoc($res)){
                            echo "Error";
                            exit();
                        }else{
                            $sql = "UPDATE user SET pwdUsers =? WHERE email=?";
                            mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                            mysqli_stmt_execute($stmt);
                            $res = mysqli_stmt_get_result($stmt);
                            if(!$row = mysqli_fetch_assoc($res)){
                                echo "Error";
                                exit();
                            }else{
                                $newPwdHash = 
                                mysqli_stmt_bind_param($stmt, "ss", $tokenEmail);
                                mysqli_stmt_execute($stmt);

                            }
                        }
                        
                    }
                }

            }
        }
    }else{
        header("Location: ../index.php");
    }
?>