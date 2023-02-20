<?php
include '../login/protect.php';

?>

<?php
if (!empty($_GET['id'])) {
    include "../_scripts/config.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM dados_user WHERE id=$id";

    $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);
    if ($query->num_rows > 0) {

        while ($dados = mysqli_fetch_assoc($query)) {
            $nome = $dados['nome'];
            $cpf = $dados['cpf'];
            $usuario = $dados['usuario'];
            $senha = $dados['senha'];
            $funcao = $dados['tipo'];
        }
    } else {
        header('Location: listar_usuarios.php');
    }
}
?>



<!doctype html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <link href="../_css/cadastro_usuario.css" rel="stylesheet" type="text/css">   
    <link rel="stylesheet" href="../_css/menu.css">
 
    <link rel="icon" href="../_images/bx-package.svg">

    <title>Editar usuario</title>
</head>

    <?php
        if($_SESSION['cargo'] == "Administrador" ){
            include "../menu/menuGerente.php";
        }else{
            include "../menu/menuVendedor.php";
        } 
         ?>   
    <section class="h-100 h-custom">
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-10">
                    <div class="card shadow border-0">
                        <div class="card-body p-md-5">
                            <h1 class="mb-4 pb-2 pb-md-0 mt-md-5 mb-md-4 px-md-2 text-center">Editar  Usuário</h1>

                            <form class="px-md-2" action="" method="POST">

                                <div class="row labelSpace">
                                    <div class="form-floating col-md-8 mb-4">
                                        <input type="text"  value="<?php echo $nome ?>" id="nome" name="nome" class="form-control" placeholder="Digite seu nome" required>
                                        <label for="nome">Nome Completo</label>
                                    </div>

                                    <div class="col-md-4 mb-4 form-floating">
                                            <input type="text"  value="<?php echo $cpf ?>" id="inputCPF" name="cpf" class="form-control" placeholder="Digite seu CPF" required>
                                            <label for="cpf">CPF</label>
                                    </div>

                                </div>

                                <div class="row labelSpace">
                                  
                                    <div class="col-md-6 mb-4 form-floating">
                                        <input type="text" value="<?php echo $usuario ?>" id="inputUsuario" name="inUsuario" class="form-control" placeholder="Digite seu usuário" required>
                                        <label for="usuario">Novo usuário</label>
                                    </div>

                                    <div class="col-md-6 mb-4 form-floating">
                                        <input type="text"  value="<?php echo $senha ?>" id="inputSenha" name="inSenha" class="form-control" placeholder="Digite sua senha" required>
                                        <label for="senha">Nova senha</label>
                                    </div>
                                </div>

                                <div class="row labelSpace">
                                   

                                <div class="mb-4">
                                    <label for="select">Função</label>
                                    <select name="tipo" class='form-select' placeholder="Função">
                                        <option>Administrador</option>
                                        <option>Vendedor</option>
                                    </select>
                                </div>


                                <div class="row">
                                    <div class="col-md-6  d-flex justify-content-center">
                                        <button onclick='voltarTabelaUser(event)' type="submit" class="botao btn-cancelar  mb-1">Cancelar</button>

                                    </div>

                                    <div class="col-md-6 d-flex justify-content-center">
                                        <input type="hidden" name="id" value="<?php echo $id?>">
                                        <button type="submit" id="update" name="update" class="botao btn-confirmar  mb-1">Confirmar</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include '../componentes/js.php'; ?>
</body>

</html>

<?php
if (isset($_POST['update'])){


    
    if (editarUsuario($_POST)) { ?>        
        <script language='javascript'>
            swal.fire({ 
                icon:"success",
                text: "Salvo com Sucesso!",
                type: "success"}).then(okay => {
                    if (okay) {
                        window.location.href = "listar_usuarios.php";
                    }
                });
            </script>
            <?php }else { ?>
        <script language='javascript'>
            swal.fire({ 
                icon:"error",
                text: "Ops! Ouve um erro.",
                type: "success"}).then(okay => {
                    // if (okay) {
                    //     window.location.href = "painel.php?r=";
                    // }
                });
            </script>
            <?php }


}
?>