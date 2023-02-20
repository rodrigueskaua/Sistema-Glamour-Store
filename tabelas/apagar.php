<?php

include "../_scripts/config.php";
include "../_scripts/functions.php";

include "../componentes/js.php";


    if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM cad_produto WHERE id='$id'";

    $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);
    header('Location: ../produtos/listar_produtos.php');
    }

    if(!empty($_GET['idUser'])){
    $id = $_GET['idUser'];

    $sql = "DELETE FROM dados_user WHERE id='$id'";

    $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);
    header('Location: ../usuarios/listar_usuarios.php');
}

    if(!empty($_GET['idVenda'])){
    $id = $_GET['idVenda'];
    $qtd = $_GET['qtd'];
    $cod = $_GET['cod'];
    
    $sql = "DELETE FROM consulta_venda WHERE id='$id'";

    $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);

    devolverQtd($qtd,$cod);
    header('Location: ../vendas/cancelar_venda.php');
}



?>