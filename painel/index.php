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
?>

        <div class="content mt-3">
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <!--/.col-->
            <div class="col-sm-12">
            <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOME</th>
                                            <th>EMAIL</th>
                                            <th>CIDADE</th>
                                            <th>AÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                         $sql = "SELECT * FROM cadastro";
                                         $consulta = $conexao->query($sql);
                                         while ($dados = $consulta->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td>".$dados['id_cliente']."</td>";
                                            echo "<td>".$dados['nome_cliente']."</td>";
                                            echo "<td>".$dados['email_cliente']."</td>";
                                            echo "<td>".$dados['cidade']."</td>";
                                        ?>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <div class="container-btn">

                                                    <button class="botao"> <a a href="form_atualiza_cliente.php?id=<?php echo $dados['id_cliente']; ?>" class="btn verde" >Atualizar</a></button>
                                                    <button class="botao"> <a href="#" class="btn vermelho" data-toggle="modal" data-target="#apagarModal">Apagar</a></button>

                                                </div>
                                                  

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="apagarModal" tabindex="-1" role="dialog" aria-labelledby="apagarModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="apagarModalLabel">Confirmação</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Tem certeza que deseja apagar?
                                                                    </div>
                                                                    <div class="modal-footer"> 
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                        <!-- Replace the '#' with the actual URL for deleting -->
                                                                        <a href="apaga_cliente.php?id=<?php echo $dados['id_cliente']; ?>" class="btn btn-danger">Apagar</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Your HTML content --> 
                                                                                                       
                                                </div>
                                            </td>
                                        <?php
                                            echo "</tr>";
                                         }
                                    ?>    
                                    </tbody>                                    
                                </table>
                            </div>
                        </div>
            </div>
            <!--/.col-->
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Fim Painel Direito -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Poppins:wght@500;700&family=Roboto+Slab&display=swap" rel="stylesheet">
    <style>
        .container-btn .btn, .botao {
            outline: none;
            cursor: pointer;
            background: none;
            transition: 0.5s;
            border-radius: 6px;
            font-family: 'Roboto Slab', serif;
            margin-right:10px;
            
            }


            .container-btn .btn:hover, .botao {

            border: none;
            color: white;
            transform: scale(1.1);

            }

            /*Cores*/
            .verde {
            border: 2px solid #0d6efd;
            color: #0d6efd;
            }

            .verde:hover {
            background-color: #0d6efd;
            transition: all 0.3s ease-in-out;
            }

            .vermelho {
            border: 2px solid #EE2727;
            color: #EE2727;
            }

            .vermelho:hover {
            background-color: #EE2727;
            transition: all 0.3s ease-in-out;
            }
            /*Button*/
            [class^="icon-"]:before, [class*=" icon-"]:before {
                font-family: "untitled-font-1" !important;
                font-style: normal !important;
                font-weight: normal !important;
                font-variant: normal !important;
                text-transform: none !important;
                speak: none;
                line-height: 0;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }
    </style>

</body>

</html>
