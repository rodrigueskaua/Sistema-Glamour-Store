<?php
function vendasDia(){
    include '../_scripts/config.php';
    
    $sql= "SELECT SUM(qtde_comprada) FROM consulta_venda WHERE DATE(data_venda) = CURRENT_DATE()";
    $query = $mysqli->query($sql);
    $result= $query->fetch_array();



    return intval($result[0]);

}

function vendasMes(){
    include '../_scripts/config.php';
    
    $sql= "SELECT SUM(qtde_comprada) as 'soma' FROM consulta_venda WHERE MONTH(data_venda) =MONTH(CURRENT_DATE())";
    $query = $mysqli->query($sql);
    $result= $query->fetch_array();



    return intval($result[0]);

}



function top10Produtos(){
    include '../_scripts/config.php';

    $i=0;
    $b=array();

    $sql= "SELECT SUM(qtde_comprada) as soma, nome_produto as nome FROM consulta_venda WHERE MONTH(CURRENT_DATE()) GROUP BY cod_produto ORDER BY SUM(qtde_comprada) DESC LIMIT 10";
    $query = $mysqli->query($sql);
    while ($result=$query->fetch_array()){
        $b[$i]= array('country'=> $result['nome'], 'value' =>intval($result['soma']));
    
        $i++;
    }

    return json_encode($b);  

}

?>