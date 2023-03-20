<?php
include '../login/protect.php';
include "../_scripts/functions.php";

?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <link rel="icon" href="../_images/bx-package.svg">
    <link rel="stylesheet" href="../_css/cadastro_produtos.css">
    <link rel="stylesheet" href="../_css/menu.css">

    <title>Cadastro Produto</title>
</head>

<body>

    <?php
    if ($_SESSION['cargo'] == "Administrador") {
        include "../menu/menuGerente.php";
    } else {
        include "../menu/menuVendedor.php";
    }
    ?>

    <section class="">
        <div class="container-fluid py-2">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-8 col-xl-8">
                    <div class="card shadow border-0">
                        <div class="card-body p-md-3">
                            <h1 class="mb-4 pb-2 pb-md-0 mt-md-4 mb-md-5 px-md-2 text-center">Cadastrar Produto</h1>

                            <form class="px-md-2" id="form-cadastrar"method="POST">

                            <div class="row labelSpace">
                                    <div class="col-md-6 mb-3 form-floating">
                                        <input type="text" id="inputNome_produto" name="nomeProduto" class="form-control"
                                            placeholder="Digite o nome do produto" required>
                                        <label for="nome_produto">Nome do Produto</label>

                                    </div>

                                    <div class="col-md-6 mb-3 form-floating">
                                        <input type="text" id="inputMarca" name="marca" class="form-control"
                                            placeholder="Digite o fornecedor" required>
                                        <label for="fornecedor">Marca</label>
                                    </div>
                                </div>
                               

                                <div class="row labelSpace">
                                
                                    <div class="col-md-4 mb-3 form-floating">
                                        <input id="inputCusto" name="custo" class="form-control"
                                            placeholder="Digite o custo do produto" type="number" pattern="[0-9]+([,\.][0-9]+)?" min="1" step="any" required>
                                        <label for="custo">Custo</label>

                                    </div>

                                    <div class="col-md-4 mb-3 form-floating">
                                        <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="1" step="any" id="inputValor_venda" name="valor" class="form-control"
                                            placeholder="Digite o valor do produto" required>
                                        <label for="valor">Valor</label>

                                    </div>

                                    <div class="col-md-4 mb-3 form-floating">
                                        <input type="number" min="1" id="inputQtd" name="quantidade" class="form-control"
                                            placeholder="Digite o valor do produto" required>
                                        <label for="valor">Qtd</label>
                                    </div>
                                </div>

                                <div class="row labelSpace ">
                                    <div class="col-md-6 form-floating">
                                        <input type="text" id="inputLink" name="link" class="form-control mb-3 "
                                            placeholder="Digite o custo do produto" required>
                                        <label for="custo">Link imagem</label>

                                        <img src="../_images/sem_imagem.png" class="produto_img" alt="">
                                    </div>

                                    <div class="col-md-6 inputsData">
                                        <div class="input-group DivbtnData mb-3">
                                            <input id="inputVenc" type="text" name="data[]" class="form-control inputData"placeholder="Vencimento" required>                                            
                                            <button class="btnData btnMais" type="button">+</button>
                                        </div>       
                                
                                    </div>
                                    
                                </div>

                                <button type="submit" class="botao btn-confirmar  mt-3 mb-3">Confirmar</button>
                                <button class="botao btn-cancelar  ">Cancelar</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <?php include '../componentes/js.php'; ?>

</body>

</html>

<script>
    $(document).ready(function(){
        $("#form-cadastrar").on("submit", function (e) {
            e.preventDefault();

            var nome = $("#inputNome_produto").val();
            var marca = $("#inputMarca").val();
            var custo = $("#inputCusto").val();
            var valor = $("#inputValor_venda").val();
            var quantidade = $("#inputQtd").val();
            var url = $("#inputLink").val();
            var validade = getInputDatas();

            var form_data = new FormData();
            form_data.append("nome", nome);
            form_data.append("validade", validade);
            form_data.append("marca", marca);
            form_data.append("custo", custo);
            form_data.append("valor", valor);
            form_data.append("quantidade", quantidade);
            form_data.append("url", url);

            $.ajax({
                url: "ajax/cadastrar.php",
                method: "POST",
                dataType: "json",
                processData: false,
                contentType: false,
                data: form_data,

            }).done(function (resultado) {
                if (resultado == "salvo!") {
                    swal
                        .fire({
                            icon: "success",
                            text: "Feito com Sucesso!",
                            type: "success"
                        })
                        .then((okay) => {
                            if (okay) {
                                document.getElementById('form-cadastrar').reset()
                                $(".produto_img").attr("src", "../_images/sem_imagem.png")
                            }
                        });
                } else {
                    swal
                        .fire({
                            icon: "error",
                            text: "Ops! Houve um erro.",
                            type: "success",
                        })
                        .then((okay) => {
                            window.history.back()
                        });
                }
            });
        });

        $(".btn-cancelar").on("click", function (e) {
            Swal.fire({
                title: 'Tem certaza?',
                text: "Você não será capaz de reverter isso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, apagar'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deletado',
                    'O produto não foi salvo',
                    'success'
                    ).then((okay) => {
                        window.history.back()
                    });
                }
            })
        })


        
    })
    

</script>

