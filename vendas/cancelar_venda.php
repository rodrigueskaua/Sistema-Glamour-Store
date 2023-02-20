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
    <link rel="stylesheet" href="../_css/venda.css">

    <link rel="stylesheet" href="../_css/menu.css">
    <link rel="icon" href="../_images/bx-package.svg">

    <title>Produtos</title>
</head>

<?php
        if($_SESSION['cargo'] == "Administrador" ){
            include "../menu/menuGerente.php";
        }else{
            include "../menu/menuVendedor.php";
        } 
         ?>   
    <section id="listar_clientes">

        <div class="container-fluid  py-2">
            <div class="row py-2">
                <div class="col-lg-12 mx-auto">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-5  bg-white rounded">
                            <div class="table-responsive">
                            <h1 class="titletest mt-0 mb-5">Cancelar Venda</h1>

                                <table class="table table-striped table-bordered table-hover " id="mytable">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">ID</th>
                                            <th style="text-align:center">Data da Venda</th>
                                            <th style="text-align:center">Nome</th>
                                            <th style="text-align:center">Código</th>
                                            <th style="text-align:center">Valor Produto</th>
                                            <th style="text-align:center">Quantidade</th>
                                            <th style="text-align:center">Valor Total</th>
                                            <th style="text-align:center">Cancelar</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //Inicio do loop para preencher a tabela
                                        include "../_scripts/config.php";
                                        $sql = "SELECT * FROM consulta_venda";
                                        $query = $mysqli->query($sql);
                                        while ($dados = $query->fetch_array()) {
                                        ?>
                                            <tr>
                                                <td style="text-align:center">
                                                    <?php echo $dados['id']; ?>
                                                </td>

                                                <td style="text-align:center">
                                                    <?php echo $dados['data_venda']; ?>
                                                </td>

                                                <td style="text-align:center">
                                                    <?php echo $dados['nome_produto']; ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <?php echo $dados['cod_produto']; ?>
                                                </td>

                                                <td style="text-align:center">
                                                    R$<?php echo $dados['valor_produto']; ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <?php echo $dados['qtde_comprada']; ?>
                                                </td>

                                                <td style="text-align:center">
                                                    R$ <?php echo number_format($dados['valor_produto'] * intval($dados['qtde_comprada']), 2) ?>
                                                </td>

                                                <td style="text-align:center">
                                                    <button class=" icon apagarIcon" onclick='apagarVenda(event,<?php echo $dados["id"] ?>, <?php echo $dados["qtde_comprada"]; ?>, "<?php echo $dados["cod_produto"]; ?>" )' id='<?php echo $dados["id"] ?>'><i class="fa-solid fa-trash-can"></i></button>
                                                </td>
                                            </tr>
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
    </div>

    <?php include '../componentes/js.php'; ?>

</body>

</html>