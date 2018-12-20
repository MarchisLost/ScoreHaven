<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=ISO 8859-1">
    <title>ex13_Pedro_Graça</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://fontawesome.com/releases/v5.0.8/js/all.js"></script> 

    <link rel="stylesheet" href="login/css/logoff.css">

  </head>
  <body>

<?php
  session_start();
?>
    <table> 
      <thead> 
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Idade</th>
          <th scope="col">Numero de Aluno</th>
        </tr>
      </thead>
<?php
          header("Content-Type: text/html; charset=ISO 8859-1",true);
          
          include 'conecta_bd.php';         
?>
              <form method="post" action="logoff.php">
                <tbody>
                  <tr>
                    <td><?php echo $_SESSION["nome"];?></td>                      
                    <td><?php echo $_SESSION["idade"];?></td>
                    <td><?php echo $_SESSION["numaluno"];?></td>
                  </tr>
                 </tbody> 
                 <button id="logoff" type="submit" class="btn btn-success" >Log Off</button>
              </form>

<?php 

          $ligacao -> close();
?>
    </table>
  </body>
</html>