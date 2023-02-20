<?php
include '../login/protect.php';
?>

<?php
if (!empty($_GET['id'])) {
    include "../_scripts/config.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM cad_produto WHERE id=$id";

    $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);
    if ($query->num_rows > 0) {

        while ($dados = mysqli_fetch_assoc($query)) {
            $nome = $dados['nome_produto'];
            $codigo = $dados['codigo_produto'];
            $fornecedor = $dados['fornecedor'];
            $custo = $dados['custo_produto'];
            $valor = $dados['valor_venda'];
            $qtd = $dados['estoque_qtd'];
            $url = $dados['url_img'];
        }
    } else {
        header('Location: listar_produtos.php');
    }
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <link rel="icon" href="../_images/bx-package.svg">

    <link rel="stylesheet" href="../_css/cadastro_produtos.css">
        <link rel="stylesheet" href="../_css/menu.css">

    <title>Cadastro usuario</title>
</head>

<body>

    <?php
        if($_SESSION['cargo'] == "Administrador" ){
            include "../menu/menuGerente.php";
        }else{
            include "../menu/menuVendedor.php";
        } 
         ?>

    <section class="h-100 h-custom">
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-10">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-md-3">
                            <h1 class="mb-4 pb-2 pb-md-0 mt-md-4 mb-md-5 px-md-2 text-center">Editar  Produto</h1>

                            <form class="px-md-2" action="" method="POST">

                                <div class="form-floating mb-4">
                                    <input type="text" value="<?php echo $nome?>" id="inputNome_produto" name="nomeProduto" class="form-control" placeholder="Digite o nome do produto" required>
                                    <label for="nome_produto">Nome do Produto</label>

                                </div>

                                <div class="row labelSpace">
                                    <div class="col-md-6 mb-4 form-floating">
                                        <input type="text" value="<?php echo $codigo?>" id="inputCodigo" name="codigo" class="form-control" placeholder="Digite o código do produto" required>
                                        <label for="codigo">Código</label>

                                    </div>

                                    <div class="col-md-6 mb-4 form-floating">
                                        <input type="text" value="<?php echo $fornecedor?>" id="inputFornecedor" name="fornecedor" class="form-control" placeholder="Digite o fornecedor" required>
                                        <label for="fornecedor">Fornecedor</label>

                                    </div>


                                </div>

                                <div class="row labelSpace">
                                    <div class="col-md-4 mb-4 form-floating">
                                        <input type="text" value="<?php echo $custo?>" id="inputCusto" name="custo" class="form-control" placeholder="Digite o custo do produto" required>
                                        <label for="custo">Custo do Produto</label>

                                    </div>

                                    <div class="col-md-4 mb-4 form-floating">
                                        <input type="text" value="<?php echo $valor?>" id="inputValor_venda" name="valor" class="form-control" placeholder="Digite o valor do produto" required>
                                        <label for="valor">Valor do Produto</label>

                                    </div>

                                    <div class="col-md-4 mb-4 form-floating">
                                        <input type="text" id="inputValor_venda" value="<?php echo $qtd?>" name="quantidade" class="form-control" placeholder="Digite o valor do produto" required>
                                        <label for="valor">Quantidade</label>
                                    </div>
                                </div>


                                <div class="row labelSpace">
                                    <div class="col-md-12 mb-3 form-floating">
                                        <input type="text" id="inputLink" value="<?php echo $url?>"  name="link" class="form-control" placeholder="Digite o custo do produto" required onblur="trocar(event)">
                                        <label for="custo">Link imagem</label>

                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-12 mb-2 d-flex justify-content-center align-content-center">
                                        <img src="<?php echo $url?>" class="produto_img" alt="">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6  d-flex justify-content-center">
                                        <button onclick='voltarTabela(event)' type="submit" class="botao btn-cancelar  mb-1">Cancelar</button>

                                    </div>

                                    <div class="col-md-6 d-flex justify-content-center">
                                        <input type="hidden" name="id" value="<?php echo $id?>">
                                        <button type="submit" id="update" name="update" class="botao btn-confirmar  mb-1">Confirmar</button>
                                    </div>
                                </div>

                            </form>

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

<?php
if (isset($_POST['update'])){


    
    if (editarProduto($_POST)) { ?>        
        <script language='javascript'>
            swal.fire({ 
                icon:"success",
                text: "Feito com Sucesso!",
                type: "success"}).then(okay => {
                    if (okay) {
                        window.location.href = "listar_produtos.php";
                    }
                });
            </script>
            <?php }else { ?>
        <script language='javascript'>
            swal.fire({ 
                icon:"error",
                text: "Ops! Ouve um erro.",
                type: "success"}).then(okay => {
                    // if (okay) {
                    //     window.location.href = "painel.php?r=";
                    // }
                });
            </script>
            <?php }


}
?>