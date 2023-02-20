<?php

function produtoExiste($codigo)
{
    include "config.php";
    $sql = "SELECT codigo_produto FROM cad_produto WHERE codigo_produto='$codigo'";
    $query = $mysqli->query($sql);
    $total = mysqli_num_rows($query);

    return $total;
}

function usuarioExiste($cpf)
{
    include "config.php";
    $sql = "SELECT cpf FROM dados_user WHERE cpf='$cpf'";
    $query = $mysqli->query($sql);
    $total = mysqli_num_rows($query);

    return $total;
}

function cadastrarUsuario($dados)
{
    include "config.php";

    $nome = $dados['nome'];
    $cpf = $dados['cpf'];
    $usuario = $dados['inUsuario'];
    $senha = $dados['inSenha'];
    $tipo = $dados['tipo'];


    if (usuarioExiste($cpf) == 0) {

        $sql = "INSERT INTO `dados_user` (`id`, `nome`, `usuario`, `senha`, `cpf`, `tipo`) VALUES (NULL, '$nome', '$usuario', '$senha', '$cpf', '$tipo')";

        $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);
        return $query;
    } else {
        return False;
    }
}



function cadastrarProduto($dados)
{
    include "config.php";

    $nome = $dados['nomeProduto'];
    $codigo = $dados['codigo'];
    $fornecedor = $dados['fornecedor'];
    $custo = $dados['custo'];
    $valor = $dados['valor'];
    $qtd = $dados['quantidade'];
    $url = $dados['link'];


    if (produtoExiste($codigo) == 0) {

        $sql = "INSERT INTO `cad_produto` (`id`, `data_cadastro`, `nome_produto`, `fornecedor`, `custo_produto`, `valor_venda`, `estoque_qtd`, `codigo_produto`, `url_img`) VALUES (NULL, current_timestamp(), '$nome', '$fornecedor', '$custo', '$valor', '$qtd', '$codigo', '$url')";

        $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);
        return $query;
    } else {
        return False;
    }
}

function editarProduto($dados)
{
    include "config.php";
    $id = $dados['id'];
    $nome = $dados['nomeProduto'];
    $codigo = $dados['codigo'];
    $fornecedor = $dados['fornecedor'];
    $custo = $dados['custo'];
    $valor = $dados['valor'];
    $qtd = $dados['quantidade'];
    $url = $dados['link'];

    $sql = "UPDATE  cad_produto SET  nome_produto='$nome', fornecedor='$fornecedor', custo_produto='$custo', valor_venda='$valor', estoque_qtd='$qtd', codigo_produto='$codigo', url_img='$url' WHERE id='$id'";

    $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);
    return $query;
}

function editarUsuario($dados)
{
    include "config.php";
    $id = $dados['id'];
    $nome = $dados['nome'];
    $cpf = $dados['cpf'];
    $usuario = $dados['inUsuario'];
    $senha = $dados['inSenha'];
    $funcao = $dados['tipo'];

    $sql = "UPDATE  dados_user SET  nome='$nome', cpf='$cpf', usuario='$usuario', senha='$senha', tipo='$funcao' WHERE id='$id'";

    $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);
    return $query;
}


function descontarQtd($id,$qtd)
{
    include "config.php";
    $sql = "SELECT * FROM `cad_produto` WHERE id='$id'";
    $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);
    $dados = $query->fetch_assoc();
    $estoque_atual = $dados['estoque_qtd'];

    $estoque_atualizado = intval($estoque_atual) - intval($qtd);
    $sql1 = "UPDATE `cad_produto` SET estoque_qtd='$estoque_atualizado' WHERE id='$id'";
    $query = $mysqli->query($sql1) or die("ERRO: " . $mysqli->error);
}


function devolverQtd($qtd,$cod)
{
    include "config.php";
    $sql = "SELECT * FROM `cad_produto` WHERE codigo_produto='$cod'";
    $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);
    $dados = $query->fetch_assoc();
    $estoque_atual = $dados['estoque_qtd'];

    $estoque_atualizado = intval($estoque_atual) + intval($qtd);
    $sql1 = "UPDATE `cad_produto` SET estoque_qtd='$estoque_atualizado' WHERE codigo_produto='$cod'";
    $query = $mysqli->query($sql1) or die("ERRO: " . $mysqli->error);
}



function login($dados)
{
    include "config.php";

    // Adiciona os valores do inputs ás váriaveis (real_escape_string para previnir sql injector)
    $usuario = $mysqli->real_escape_string($dados['usuario']);
    $senha = $mysqli->real_escape_string($dados['senha']);

    //Código sql para checar na tabela "dados_user" se o úsuario e a senha estão corretos
    $sql = "SELECT * FROM dados_user WHERE usuario = '$usuario' AND senha = '$senha'";
    //Executa o código sql e em caso de falha retorna o erro
    $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);

    $user = $query->fetch_assoc();
    $qtd = $query->num_rows;


    if ($qtd == 1) {
        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['cargo'] = $user['tipo'];
        
        if($_SESSION['cargo'] == "Administrador"){
            header("Location: tela_inicial/tela_inicial.php");
        }
    } else {
?>
        <script language='javascript'>
            swal.fire({
                icon: "error",
                text: "Ops! Usuário não encontrado.",
                type: "success"
            }).then(okay => {

            });
        </script>
<?php
    }
}


function logout()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    session_destroy();

    header('Location: ../index.php');
}



function baixoEstoque(){
    include "config.php";
    
    $i=0;
    $produtos= array();

    $sql= "SELECT codigo_produto, nome_produto, quantidade FROM cad_produto WHERE quantidade <=10 ORDER BY quantidade ASC";
    $query = $mysqli->query($sql);
    $result= $query->fetch_array();

    while ($result=$query->fetch_array()){
        $produtos[$i]= array('nome'=>['nome_produto'], 'codigo'=> $result['codigo_produto'],'quantidade'=>$result['quantidade'] );
    
        $i++;
    }

    return json_encode($produtos);  
}


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



function top10ProdutosMes(){
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


function top10ProdutosDia(){
    include '../_scripts/config.php';

    $i=0;
    $b=array();

    $sql= "SELECT SUM(qtde_comprada) as soma, nome_produto as nome FROM consulta_venda WHERE DATE(data_venda) = CURRENT_DATE() GROUP BY cod_produto ORDER BY SUM(qtde_comprada) DESC LIMIT 10";
    $query = $mysqli->query($sql);
    while ($result=$query->fetch_array()){
        $b[$i]= array('country'=> $result['nome'], 'value' =>intval($result['soma']));
    
        $i++;
    }

    return json_encode($b);  

}


function cargo($id){
    include '../_scripts/config.php';

    $sql= "SELECT tipo FROM dados_user WHERE id='$id'";
    $query = $mysqli->query($sql);
    $result = $query->fetch_array();
    $cargo = $result[0];
    return $cargo;  

}


function nome($id){
    include '../_scripts/config.php';

    $sql= "SELECT nome FROM dados_user WHERE id='$id'";
    $query = $mysqli->query($sql);
    $result = $query->fetch_array();
    $result = $result[0];
    $nome = explode(" ", $result);
    $nome = $nome[0];
    return  $nome;

}


function sobrenome($id){
    include '../_scripts/config.php';

    $sql= "SELECT nome FROM dados_user WHERE id='$id'";
    $query = $mysqli->query($sql);
    $result = $query->fetch_array();
    $result = $result[0];
    $nome = explode(" ", $result);
    $sobrenome = end($nome);
    return  $sobrenome;

}

?>


