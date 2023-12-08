<?php
    session_start();
    if((!isset($_SESSION['id']) == true) and (!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true)){
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        header('Location: ../index.html');
    }
    require('conecta.php');

    $id_cliente = $_GET['id']; //Pega da URL

    $nome_cliente_novo = $_POST['nome_cliente_novo'];
    $email_cliente_novo = $_POST['email_cliente_novo'];
    $cidade_novo = $_POST['cidade_novo'];

    var_dump($nome_cliente_novo);

    $sql = "UPDATE cadastro SET nome_cliente = '$nome_cliente_novo', email_cliente = '$email_cliente_novo', cidade = '$cidade_novo'
    WHERE id_cliente = '$id_cliente' ";

    $conexao->query($sql);

    header('Location: index.php');

?>
<div class="content mt-3">
    <div class="col-sm-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="card">
            <form action="insere_cliente.php" method="POST" class="p-3">
                <div class="mb-3">
                    <label for="nome_cliente" class="form-label">Nome do Cliente</label>
                    <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" required>
                </div>

                <div class="mb-3">
                    <label for="email_cliente" class="form-label">Email do Cliente</label>
                    <input type="email" class="form-control" id="email_cliente" name="email_cliente" required>
                </div>

                <div class="mb-3">
                    <label for="cidade" class="form-label">Cidade do Cliente</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" required>
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
</div>