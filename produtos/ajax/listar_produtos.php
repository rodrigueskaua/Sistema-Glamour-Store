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
              <th style="text-align:center">Valor</th>
              <th style="text-align:center">Quantidade</th>
              <th style="text-align:center">Vencimento</th>
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
                R$'.$row["valor_venda"].'
            </td>
            <td style="text-align:center">
                '.$row["estoque_qtd"].'
            </td>

            <td style="text-align:center">
                '.$row["vencimento"].'
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
