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

<body>
<?php
        if($_SESSION['cargo'] == "Administrador" ){
            include "../menu/menuGerente.php";
        }
         ?>   

    <section id="listar_clientes">


        <div class="container-fluid  py-2">
            <div class="row ">
                <div class="col-lg-12 mx-auto">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-4 bg-white rounded">
                        <h1 class="titletest mt-0 p-2 mb-4">Produtos</h1>
                        <div id="tabela">

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
                            <input id="InputData" type="text" name="data[]" class="form-control inputData"placeholder="Vencimento" required>                                            
                            <button class="btnData btnMais" type="button">+</button>
                        </div>       
                
                    </div>
                    
                </div>
                <div class="d-grid gap-2 mt-4">
                    <button class="btnCadastro confirmar" type="submit">Cadastrar</button>
                </div>
            </form>  
          </div>
        </div>
      </div>
    </div>
    <?php include '../componentes/js.php'; ?>

    <script>

    $(document).ready(function () {
        listarProdutos();
    })

    function listarProdutos() {
        var displayData = "true";
        $.ajax({
            url: "ajax/listar.php",
            type: "post",
            data: {
                mostrar: displayData,
            },

            success: function (data, status) {
                // console.log(status)
                $("#tabela").html(data);
                $('#mytable').DataTable( {
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                }
    } );
            },
        });
    };


    
    const modal = document.getElementById("modalEditar");

    $("#modalEditar").on('hidden.bs.modal', function () {
       $(".inputDataNovo").remove()
    });


    modal.addEventListener("show.bs.modal", (event) => {
        const button = event.relatedTarget;

        const inputId = modal.querySelector("#inputId");
        const inputNome = modal.querySelector("#inputNome_produto");
        const inputMarca = modal.querySelector("#inputMarca");
        const inputCusto = modal.querySelector("#inputCusto");
        const inputValor = modal.querySelector("#inputValor_venda");
        const inputQtd = modal.querySelector("#inputQtd");
        const inputImg = modal.querySelector("#inputLink");
        const img = modal.querySelector(".produto_img");
        const inputVenc = modal.querySelector("#InputData");


        const dados_id = button.getAttribute("data-bs-whateverId");
        const dados_Nome = button.getAttribute("data-bs-whateverNome");
        const dados_Img = button.getAttribute("data-bs-whateverImg");
        const dados_Venc = button.getAttribute("data-bs-whateverVenc");
        const dados_Marca = button.getAttribute("data-bs-whateverMarca");
        const dados_Custo = button.getAttribute("data-bs-whateverCusto");
        const dados_Valor = button.getAttribute("data-bs-whateverValor");
        const dados_Qtd = button.getAttribute("data-bs-whateverQtd");

        inputId.value = dados_id;
        inputNome.value = dados_Nome;
        inputMarca.value = dados_Marca;
        inputCusto.value = dados_Custo;
        inputValor.value = dados_Valor;
        inputQtd.value = dados_Qtd;
        inputImg.value = dados_Img;
        img.src = dados_Img;

        const vencimento = dados_Venc.split(":")

        if(vencimento.length == 1){
            inputVenc.value = vencimento[0]
        }
        else{
            inputVenc.value = vencimento[0]

            $(vencimento).each(function(index) {
                if(index > 0){
                    $(".btnMais").click();
                }

                $(".inputDataNovo .inputData").each(function(index){
                    $(this).val(vencimento[index + 1]);
                
                })
            });
            
            }

    });

    $("#form-editar").on("submit", function (e) {
        e.preventDefault();

        var id = $("#inputId").val();
        var inputNome = $("#inputNome_produto").val();
        var inputMarca = $("#inputMarca").val();
        var inputCusto = $("#inputCusto").val();
        var inputValor = $("#inputValor_venda").val();
        var inputQtd = $("#inputQtd").val();
        var inputImg = $("#inputLink").val();
        var validade = getInputDatas();


        var form_data = new FormData();
        form_data.append("id", id);
        form_data.append("nome", inputNome);
        form_data.append("validade", validade);
        form_data.append("marca", inputMarca);
        form_data.append("custo", inputCusto);
        form_data.append("valor", inputValor);
        form_data.append("quantidade", inputQtd);
        form_data.append("url", inputImg);


        $.ajax({
            url: "ajax/editar.php",
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
                        listarProdutos()
                        $("#edit-btn-close").click();
                    });
            } else {
                swal
                    .fire({
                        icon: "error",
                        text: "Ops! Houve um erro.",
                        type: "success",
                    })
                    .then((okay) => {
                        
                    });
            }
        });
    });

    function deletarProduto(id){
        var form_data = new FormData();
        form_data.append("id", id);

        Swal.fire({
            title: 'Você tem certeza?',
            text: "Você não será capaz de reverter isso!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, deletar'
            }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "ajax/deletar.php",
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
                                text: "Deletado com Sucesso!",
                                type: "success"
                            })
                            .then((okay) => {
                                listarProdutos()
                            });
                    } else {
                        swal
                            .fire({
                                icon: "error",
                                text: "Ops! Houve um erro.",
                                type: "success",
                            })
                            .then((okay) => {
                                
                            });
                    }
                });
            }
            })
    }


    </script>
   

    </body>

</html>
