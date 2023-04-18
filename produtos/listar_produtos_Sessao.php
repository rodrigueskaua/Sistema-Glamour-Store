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
    <?php include '../componentes/js.php'; ?>
    
    <script>
    $(document).ready(function () {
        listarProdutos();
    })

    function listarProdutos() {
        var displayData = "true";
        $.ajax({
            url: "ajax/listar_produtos.php",
            type: "post",
            data: {
                mostrar: displayData,
            },

            success: function (data, status) {
                $("#tabela").html(data);
                $('#mytable').DataTable( {
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                }
    } );
            },
        });
    };

    </script>
</body>

</html>
