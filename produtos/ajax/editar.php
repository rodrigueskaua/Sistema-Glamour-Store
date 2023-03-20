<?php
header('Content-type: application/json');

require_once("../../_scripts/config_pdo.php");
require_once("../../_scripts/functions.php");


try { 
  if (isset($_POST['nome']) && isset($_POST['validade']) && isset($_POST['marca']) && isset($_POST['custo']) && isset($_POST['valor']) && isset($_POST['quantidade']) && isset($_POST['url'])) {

      $nome = $_POST['nome'];
      $validade = $_POST['validade'];
      $marca = $_POST['marca'];
      $custo = $_POST['custo'];
      $valor = $_POST['valor'];
      $quantidade = $_POST['quantidade'];
      $url = $_POST['url'];
      $id = $_POST['id'];

    $query = $pdo->prepare("UPDATE `cad_produto` SET `nome_produto`='$nome',`marca`='$marca',`custo_produto`='$custo', `valor_venda`='$valor',`estoque_qtd`='$quantidade',`vencimento`='$validade' ,`url_img`='$url'  WHERE id = '$id' ");
    $query->execute();  

    if($query->rowCount()>=1){
      echo json_encode('salvo!'); 
    }else{
        echo json_encode('Falha ao salvar');

    }}

}catch (PDOException $pe) {
  echo json_encode(die($pe->getMessage()));
}
?>