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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <link href='../_css/tabela.css' rel= 'stylesheet' type='text/css'>
    <link rel="stylesheet" href="../_css/menu.css">

    <link rel="icon" href="../_images/bx-package.svg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Red+Hat+Text:wght@300;500&display=swap" rel="stylesheet">
</head>


    <title>Baixo Estoque</title>
</head>

<?php
        if($_SESSION['cargo'] == "Administrador" ){
            include "../menu/menuGerente.php";
        }else{
            include "../menu/menuVendedor.php";
        } 
         ?>   


<script type="text/javascript">
    $(document).ready(function() {
        $('#mytable').DataTable();
    });

    $('#mytable').DataTable( {
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        }
    } );

</script>

<body>

<section id="baixo_estoque">


        <div class="container-fluid  py-2">
            <div class="row py-2">
                <div class="col-lg-12 mx-auto">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                        <h1 class="titletest mt-0 mb-5">Produtos Com Estoque Baixo</h1>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover " id="mytable">
                                    <thead>
                                    <tr>
                                        <th style="text-align:center">Nome do produto</th>
                                        <th style="text-align:center">Código</th>
                                        <th style="text-align:center">Quantidade</th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    <?php
                                    include '../_scripts/config.php';  

                                        $sql= "SELECT codigo_produto, nome_produto, estoque_qtd FROM cad_produto WHERE estoque_qtd <=10 ORDER BY estoque_qtd ASC";
                                        $query = $mysqli->query($sql);

                                    while ($result = $query->fetch_array()){
                                    ?>
                                      <tr>
                                            <td style="text-align:center">
                                                <?php echo $result['nome_produto'];?>
                                            </td>
                                            <td style="text-align:center">
                                                <?php echo $result['codigo_produto'];?>
                                            </td>
                                            <td style="text-align:center">
                                                <?php echo $result['estoque_qtd'];?>
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

