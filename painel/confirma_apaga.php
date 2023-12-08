<?php
    session_start();
    if((!isset($_SESSION['id']) == true) and (!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true)){
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        header('Location: ../index.html');
    }
    require('conecta.php');

?>
<?php
    include_once('cabecalho.php');
    $id_cliente = $_GET['id']; //Pega da URL

?>
<div class="alert alert-danger" role="alert">
        A simple danger alert—check it out!
        <div class="btn-group"  arial-label="Basic example">
          <a a href="apaga_cliente.php?id=<?php echo $id_cliente; ?>" class="btn btn-danger" >Apagar</a>
          <a href="index.php" class="btn btn-primary">não</a>
        </div>
</div>
