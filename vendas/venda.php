<?php
include '../login/protect.php';

?>

<?php
if (isset($_SESSION['venda'])) {
} else {
    $_SESSION['venda'] = array();
}

if (isset($_POST['id'])) {
    $produto = $_POST['id'];
    $_SESSION['venda'][$produto] = $_POST['qtd'];
}

if (isset($_POST['apagar'])) {
    $apagar = $_POST['apagar'];
    unset($_SESSION['venda'][$apagar]);
}

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

    <script src="../_js/functions.js"></script>
    <title>Venda</title>
</head>

<?php
        if($_SESSION['cargo'] == "Administrador" ){
            include "../menu/menuGerente.php";
        }else{
            include "../menu/menuVendedor.php";
        } 
         ?>   



    <section id="listar_produtos">

        <div class="container-fluid  py-2">
            <div class="row py-2">
                <div class="col-lg-12 mx-auto">

                    <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                            <!-- Button trigger modal -->
                            <h1>Venda</h1>
                            <div class="d-flex justify-content-end mb-2 ">
                                <button type="button" class="btnCarrinho btn-primary" data-bs-toggle="modal" data-bs-target="#conteudo">
                                    Carrinho
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="conteudo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Carrinho</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" id="conteudo">
                                            <div class="table-responsive">
                                                <table style="transform: scale(0.9);" id="tabelaCarrinho" class="table table-light table-bordered table-hover  ">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align:center">Img</th>
                                                            <th style="text-align:center">Nome</th>
                                                            <th style="text-align:center">Código</th>
                                                            <th style="text-align:center">Valor</th>
                                                            <th style="text-align:center">Quantidade</th>
                                                            <th style="text-align:center">Remover</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php //Inicio do loop para preencher a tabela
                                                        $total = 0;

                                                        foreach ($_SESSION['venda'] as $Prod => $Quantidade) {
                                                            include "../_scripts/config.php";

                                                            $sql = "SELECT * FROM cad_produto WHERE id ='$Prod'";
                                                            $query = $mysqli->query($sql);
                                                            $dados = $query->fetch_assoc();
                                                        ?>
                                                            <tr>

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
                                                                    R$<?php echo $dados['valor_venda']; ?>
                                                                </td>
                                                                <td style="text-align:center">
                                                                    <?php echo $Quantidade ?>
                                                                </td>
                                                                <td style="text-align:center">
                                                                    <form action="" method="post">
                                                                        <input type="hidden" name="apagar" value="<?php echo $dados['id'] ?>">
                                                                        <button class=" icon apagarIcon"><i class="fa-solid fa-trash-can"></i></button>
                                                                    </form>
                                                                </td>

                                                            </tr>
                                                            <?php
                                                            $total += $dados['valor_venda'] * $Quantidade;
                                                            ?>
                                                        <?php } ?>

                                                    </tbody>
                                                    <?php //Inicio do loop para preencher a tabela
                                                    if (isset($_POST['enviar'])) {
                                                        foreach ($_SESSION['venda'] as $id => $qtd) {
                                                            include "../_scripts/config.php";
                                                            include_once "../_scripts/functions.php";

                                                            $sqlProduto = "SELECT * FROM cad_produto WHERE id = '$id'";
                                                            $queryProduto = $mysqli->query($sqlProduto) or die("ERRO: " . $mysqli->error);
                                                            $produtos = $queryProduto->fetch_assoc();

                                                            $nome = $produtos['nome_produto'];
                                                            $codigo = $produtos['codigo_produto'];
                                                            $valor = $produtos['valor_venda'];


                                                            $sql = "INSERT INTO  consulta_venda(`id`, `nome_produto`, `data_venda`, `cod_produto`,`valor_produto`, `qtde_comprada`) VALUES (NULL, '$nome', current_timestamp(), '$codigo',  '$valor', '$qtd')";
                                                            $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);
                                                            descontarQtd($id, $qtd);

                                                        }
                                                        

                                                    }

                                                    if (isset($_POST['enviar'])){
                                                        unset($_SESSION['venda']);
                                                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
                                                    }

                                                    ?>
                                                </table>
                                                <div class="total d-flex justify-content-end">
                                                    <h4>Total - R$<?php echo number_format($total, 2) ?></h4>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btnCarrinhoCancelar" data-bs-dismiss="modal">Fechar</button>
                                            <form action="" method="post">
                                                <button type="submit" class="btnCarrinho1" id="finalizar" name="enviar">Finalizar Compra</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="table-responsive">
                                <table class="table table-striped table-bordered  table-hover " id="mytable">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">ID</th>
                                            <th style="text-align:center">Img</th>

                                            <th style="text-align:center">Nome</th>
                                            <th style="text-align:center">Código</th>
                                            <th style="text-align:center">Valor</th>
                                            <th style="text-align:center">Estoque</th>
                                            <th style="text-align:center">Vender / Quantidade</th>
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
                                                    R$<?php echo $dados['valor_venda']; ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <?php echo $dados['estoque_qtd']; ?>
                                                </td>
                                                <td style="text-align:center " colspan='2'>
                                                    <div class="row">
                                                        <div class="col-8 mt-2">
                                                            <form action="" method="post">
                                                                <input type="number" min="1" id="qtd" name="qtd" class="form-control" max="<?php echo $dados['estoque_qtd']; ?>" required>
                                                        </div>
                                                        <div class="col-md-4 mt-1">
                                                            <input type="hidden" name="id" value="<?php echo $dados['id'] ?>">
                                                            <button type="submit" class=" icon venderIcon"><i class="fa-solid fa-cart-shopping"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
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