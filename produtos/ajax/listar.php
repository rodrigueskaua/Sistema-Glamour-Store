<?php

include "../../_scripts/config_pdo.php";

$query = "SELECT * FROM cad_produto";
$statement = $pdo->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$rowCount = $statement->rowCount();

if ($rowCount > 0) {
	$data = '<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover " id="mytable">
      <thead>
          <tr>
              <th style="text-align:center">Foto</th>
              <th style="text-align:center">Nome</th>
              <th style="text-align:center">Marca</th>
              <th style="text-align:center">Custo</th>
              <th style="text-align:center">Valor venda</th>
              <th style="text-align:center">Quantidade</th>
              <th style="text-align:center">Vencimento</th>
              <th style="text-align:center">#</th>
              <th style="text-align:center">#</th>
          </tr>
      </thead>
      <tbody>

	';
	foreach($result as $row) {
		$data .= '
        <tr>
          <td style="text-align:center">
            <img class="img" src="'.$row["url_img"].'" alt="">
          </td>
            <td style="text-align:center">
                '.$row["nome_produto"].'
            </td>

            <td style="text-align:center">
            '.$row["marca"].'
            </td>

            <td style="text-align:center">
                R$'.$row["custo_produto"].'
            </td>

            <td style="text-align:center">
                R$'.$row["valor_venda"].'
            </td>
            <td style="text-align:center">
                '.$row["estoque_qtd"].'
            </td>

            <td style="text-align:center">
                '.$row["vencimento"].'
            </td>
            <td >
                <button type="button" class="icon editarIcon" data-bs-toggle="modal" data-bs-target="#modalEditar"
                data-bs-whateverId="' .$row["id"]. '"
                data-bs-whateverNome="' .$row["nome_produto"]. '"
                data-bs-whateverImg="' .$row["url_img"]. '"
                data-bs-whateverVenc="' .$row["vencimento"]. '"
                data-bs-whateverMarca="' .$row["marca"]. '"
                data-bs-whateverCusto="' .$row["custo_produto"]. '"
                data-bs-whateverValor="' .$row["valor_venda"]. '"
                data-bs-whateverQtd="' .$row["estoque_qtd"]. '"
                >
                    <i class="fa-solid fa-file-pen"></i>
                </button>
            </td>
            <td >
                <button type="button" class="icon apagarIcon" onclick="deletarProduto('.$row["id"].')" >
                    <i class="fa-solid fa-trash-can"></i>                  
                </button>
            </td>
			</tr>
		';
	}

	$data .= '</tbody></table></div>';
}
else {
	$data = "Nenhum registro localizado.";
}

echo $data;

?>
