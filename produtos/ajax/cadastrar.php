<?php
header('Content-type: application/json');
require_once("../../_scripts/config_pdo.php");
require_once("../../_scripts/functions.php");

try {
    if (isset($_POST['nome']) && isset($_POST['codigo']) && isset($_POST['fornecedor']) && isset($_POST['custo']) && isset($_POST['valor']) && isset($_POST['quantidade']) && isset($_POST['url'])) {
        $nome = $_POST['nome'];
        $codigo = $_POST['codigo'];
        $fornecedor = $_POST['fornecedor'];
        $custo = $_POST['custo'];
        $valor = $_POST['valor'];
        $quantidade = $_POST['quantidade'];
        $url = $_POST['url'];
        
        $query = $pdo->prepare("INSERT INTO cad_produto (id, data_cadastro, nome_produto, fornecedor, custo_produto, valor_venda, estoque_qtd, codigo_produto, url_img)
        VALUES('{NULL}', '{current_timestamp()}','{$nome}', '{$fornecedor}', '{$custo}', '{$valor}', '{$quantidade}', '{$codigo}', '{$url}')");
        $query->execute();

        if ($query->rowCount() >= 1) {
            echo json_encode('salvo!');
        } else {
            echo json_encode('Falha ao salvar');
        }


    } else {
        echo json_encode('Falha ao salvar');
    }
} catch (PDOException $pe) {
    echo json_encode(die($pe->getMessage()));
}
?>