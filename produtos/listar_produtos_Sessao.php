<?php
include '../login/protect.php';
include "../_scripts/functions.php";

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
    <link rel="icon" href="../_images/bx-package.svg">

    <script src="../_js/functions.js"></script>

    <title>Pesquisar Produtos</title>
</head>
<?php
        if($_SESSION['cargo'] == "Administrador" ){
            include "../menu/menuGerente.php";
        }else{
            include "../menu/menuVendedor.php";
        } 
         ?>   

    <section id="listar_clientes">

        <div class="container-fluid py-2 ">
            <div class="row py-2">
                <div class="col-lg-12 mx-auto">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                        <h1 class="titletest mt-0 mb-5">Pesquisar Produtos</h1>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover " id="mytable">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">ID</th>
                                            <th style="text-align:center">Img</th>

                                            <th style="text-align:center">Nome</th>
                                            <th style="text-align:center">Código</th>
                                            <th style="text-align:center">Fornecedor</th>
                                            <th style="text-align:center">Custo</th>
                                            <th style="text-align:center">Valor venda</th>
                                            <th style="text-align:center">Quantidade</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //Inicio do loop para preencher a tabela
                                        include "../_scripts/config.php";
                                        $sql = "SELECT * FROM cad_produto";
                                        $query = $mysqli->query($sql);
                                        while ($dados = $query->fetch_array()) {
                                        ?>
                                            <tr>
                                                <td style="text-align:center">
                                                    <?php echo $dados['id']; ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <img class="img" src=" <?php echo $dados['url_img']; ?>" alt="">

                                                </td>
                                                <td style="text-align:center">
                                                    <?php echo $dados['nome_produto']; ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <?php echo $dados['codigo_produto']; ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <?php echo $dados['fornecedor']; ?>
                                                </td>

                                                <td style="text-align:center">
                                                    R$<?php echo $dados['custo_produto']; ?>
                                                </td>
                                                <td style="text-align:center">
                                                    R$<?php echo $dados['valor_venda']; ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <?php echo $dados['estoque_qtd']; ?>
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
    <?php include '../componentes/js.php'; ?>

</body>

</html>
