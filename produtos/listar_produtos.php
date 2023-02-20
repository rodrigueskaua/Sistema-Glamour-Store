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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../_css/tabela.css">
    <link rel="stylesheet"  type="text/css" href="../_css/menu.css">
    <link rel="stylesheet" type="text/css" href="../_css/modal.css">

    <link rel="icon" href="../_images/bx-package.svg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../_js/functions.js"></script>

    <title>Produtos</title>
</head>


<?php
        if($_SESSION['cargo'] == "Administrador" ){
            include "../menu/menuGerente.php";
        }else{
            include "../menu/menuVendedor.php";
        } 
         ?>   

         <button type="button" class="tableBtn tableBtnEditar" data-bs-toggle="modal" data-bs-target="#modalEditar" data-bs-whateverid="1" data-bs-whatevernome="Camila Pitanga" data-bs-whateverusuario="gerente" data-bs-whateversenha="1234" data-bs-whatevercpf="123.123.123.12" data-bs-whateverfuncao="Gerente">
                    <i class="bx bx-edit-alt"></i>
                </button>
    <section id="listar_clientes">


        <div class="container-fluid  py-2">
            <div class="row  py-2">
                <div class="col-lg-12 mx-auto">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                        <h1 class="titletest mt-0 mb-5">Produtos</h1>

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

                                            <th style="text-align:center">#</th>
                                            <th style="text-align:center">#</th>
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
                                                <td style="text-align:center">
                                                <button class=" icon editarIcon"><a href="editar_produto.php?id=<?php echo $dados['id']?>"><i class="fa-solid fa-file-pen"></i></a></button>
                                                </td>
                                                <td style="text-align:center">
                                                <button class=" icon apagarIcon" onclick='apagarProduto(event,<?php echo $dados["id"]?>)' id='<?php echo $dados["id"]?>'><i class="fa-solid fa-trash-can"></i></button></td>
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

    <!-- Modal Editar-->
    <div class="modal t-modal fade" id="modalEditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditar" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1>Editar produto</h1>
            <div>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="edit-btn-close"></button>
            </div>
          </div>
          <div class="modal-body">
            <form method="POST" class="formulario" id="form-editar">
              
                <input type="text" hidden class="form form-control" id="inputId" placeholder="Id">
                <div class="form-floating mb-4">
                    <input type="text" id="inputNome_produto" name="nomeProduto" class="form-control" placeholder="Digite o nome do produto" required>
                    <label for="nome_produto">Nome do Produto</label>
                </div>

            <div class="row labelSpace">
                <div class="col-md-6 mb-4 form-floating">
                    <input type="text" id="inputCodigo" name="codigo" class="form-control" placeholder="Digite o código do produto" required>
                    <label for="codigo">Código</label>
                </div>

                <div class="col-md-6 mb-4 form-floating">
                    <input type="text"  id="inputFornecedor" name="fornecedor" class="form-control" placeholder="Digite o fornecedor" required>
                    <label for="fornecedor">Fornecedor</label>

                </div>
            </div>

            <div class="row labelSpace">
                <div class="col-md-4 mb-4 form-floating">
                    <input type="text"  id="inputCusto" name="custo" class="form-control" placeholder="Digite o custo do produto" required>
                    <label for="custo">Custo do Produto</label>

                </div>

                <div class="col-md-4 mb-4 form-floating">
                    <input type="text" id="inputValor_venda" name="valor" class="form-control" placeholder="Digite o valor do produto" required>
                    <label for="valor">Valor do Produto</label>

                </div>

                <div class="col-md-4 mb-4 form-floating">
                    <input type="text" id="inputValor_venda"  name="quantidade" class="form-control" placeholder="Digite o valor do produto" required>
                    <label for="valor">Quantidade</label>
                </div>
            </div>


            <div class="row labelSpace">
                <div class="col-md-12 mb-3 form-floating">
                    <input type="text" id="inputLink"   name="link" class="form-control" placeholder="Digite o custo do produto" required onblur="trocar(event)">
                    <label for="custo">Link imagem</label>

                </div>

            </div>


            <div class="row">
                <div class="col-md-12 mb-2 d-flex justify-content-center align-content-center">
                    <img src="../_images/sem_imagem.png" class="produto_img" alt="">
                </div>
            </div>                

                <div class="d-grid gap-2">
                    <button class="btnCadastro confirmar" type="submit">Cadastrar</button>
                </div>
            </form>  
          </div>
        </div>
      </div>
    </div>
   
        <?php include '../componentes/js.php'; ?>

    </body>

</html>
