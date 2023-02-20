<?php
include '../login/protect.php';

?>

<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="../_css/tabela.css">
    <link rel="stylesheet" href="../_css/menu.css">
    <script src="../_js/functions.js"></script>
    <link rel="icon" href="../_images/bx-package.svg">

    <title>Buscar Usuários</title>
</head>
<?php
        if($_SESSION['cargo'] == "Administrador" ){
            include "../menu/menuGerente.php";
        }else{
            include "../menu/menuVendedor.php";
        } 
         ?>   


    <section id="listar_usuarios">
        

        <div class="container-fluid  py-2">
            <div class="row py-2">
                <div class="col-lg-12 mx-auto">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                        <h1 class="titletest mt-0 mb-5">Usuários</h1>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="mytable">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">ID</th>
                                            <th style="text-align:center">Nome</th>
                                            <th style="text-align:center">Usuário</th>
                                            <th style="text-align:center">CPF</th>
                                            <th style="text-align:center">Tipo</th>

                                            <th style="text-align:center">#</th>
                                            <th style="text-align:center">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //Inicio do loop para preencher a tabela
                                        include "../_scripts/config.php";
                                        $sql = "SELECT * FROM dados_user";
                                        $query = $mysqli->query($sql);
                                        while ($dados = $query->fetch_array()) {

                                        ?>

                                            <tr>
                                                <td style="text-align:center">
                                                    <?php echo $dados['id']; ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <?php echo $dados['nome']; ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <?php echo $dados['usuario']; ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <?php echo $dados['cpf']; ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <?php echo $dados['tipo']; ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <a href='editar_usuario.php?id=<?php echo $dados['id'] ?>'>
                                                        <i class="fa-solid fa-file-pen"></i>
                                                    </a>
                                                </td>
                                                <td style="text-align:center">
                                                    <a href=''>
                                                        <i class="fa-solid fa-trash-can" onclick='apagarUsuario(event,<?php echo $dados["id"] ?>)' id='<?php echo $dados["id"] ?>'></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>>

    <?php include '../componentes/js.php'; ?>



</body>

</html>