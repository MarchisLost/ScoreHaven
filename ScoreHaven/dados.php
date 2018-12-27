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

  <table> <!-- class="table table-hover"  ao meter isto a tabela expande se horizontalmente-->
      <thead> 
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
        </tr>
      </thead>
<?php
      header("Content-Type: text/html; charset=ISO 8859-1",true);

      session_start();
      include 'conecta_bd.php';       
?>
      <form method="post" action="logoff.php">
        <tbody>
          <tr>
            <td><?php echo $_SESSION["username"];?></td>                      
            <td><?php echo $_SESSION["mail"];?></td>
          </tr>
        </tbody> 
        <button type="submit" >Log Off</button>
      </form>
<?php 
          $ligacao -> close();
?>
    </table>
  </body>
</html>