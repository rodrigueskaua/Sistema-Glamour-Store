<?php
header('Content-type: application/json');

require_once("../../_scripts/config_pdo.php");
require_once("../../_scripts/functions.php");

try {
  if (isset($_POST['id'])) {

    $id = $_POST['id'];

    
    $query = $pdo->prepare("DELETE FROM cad_produto WHERE id = '$id'");
    $query->execute();
    
    if($query->rowCount()>=1){
      echo json_encode('salvo!'); 
    }else{
        echo json_encode('Falha ao salvar');

    }
}
} catch (PDOException $pe) {
    echo json_encode(die($pe->getMessage()));
}


?>

