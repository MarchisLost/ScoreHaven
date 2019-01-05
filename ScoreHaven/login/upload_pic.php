<?php

session_start();
include '../conecta_bd.php';

$id = $_SESSION["id_u"];

if(isset($_POST["submit_img"])){

    $img_ready = addslashes(file_get_contents($_FILES['file']['tmp_name']));
    $sql = "UPDATE users SET img_p= '".$img_ready."' WHERE users.id_u= ".$id;
    $res = mysqli_query($ligacao, $sql);
    if($res){
        header("Location: user_profile.php");
    }else{
        echo "And error has occured, please try again";
    }


    //Neste momento as imagens estao a ser guardadas na base de dados, no entanto este codigo permite que sejam guardadas numa pasta
    /*$file = $_FILES["file"];
    // echo "$file"; //debug

    //$_FILE da um Array que e composto por (name, type, tmp_name(diretivo), error, size)
    $fileName = $_FILES["file"]["name"];
    $fileTmpName = $_FILES["file"]["tmp_name"];
    $fileSize = $_FILES["file"]["size"];
    $fileError = $_FILES["file"]["error"];
    $fileType = $_FILES["file"]["type"];

    //o nome vem como 'nome.type', aqui vamos separar os dois
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 500000){
                $fileNameNew = "profile" .$id ."." .$fileActualExt; //e criado o nome da imagem
                $fileDestination = 'uploads/' .$fileNameNew; // sitio onde vai ser guardada
                move_uploaded_file($fileTmpName, $fileDestination); // comando que guarda a imagem no git

                header("Location: user_profile.php");
            }else{
                echo "Your file is too big! It has to be less than 5Mb.";
            }
        }else{
            echo "There was an error uploading your file! Please try again";
        }
    }else{
        echo "You cannot upload images of this type, try jpg, jpeg or png";
    }*/

}   
?>