<?php
include '../login/protect.php';

?>
<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../_css/cadastro_usuario.css">  
    <link rel="stylesheet" href="../_css/menu.css">
    <link rel="icon" href="../_images/bx-package.svg">
     
    <title>Cadastro Usuario</title>
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
                <div class="col-lg-8 col-xl-10 ">
                    <div class="card shadow border-0">
                        <div class="card-body  p-md-5">
                            <h1 class="mb-4 pb-2 pb-md-0 mb-md-4 px-md-2 text-center">Cadastrar Usuário</h1>

                            <form class="px-md-8" action="" method="POST">
                            <div class="row labelSpace">
                                    <div class="form-floating col-md-8 mb-4">
                                        <input autofocus type="text" id="nome" name="nome" class="form-control" placeholder="Digite seu nome" required>
                                        <label for="nome">Nome Completo</label>
                                    </div>

                                    <div class="col-md-4 mb-4 form-floating">
                                            <input type="text" id="inputCPF" name="cpf" class="form-control" placeholder="Digite seu CPF" onblur="validarCPF(this)" required>
                                            <label for="cpf">CPF</label>
                                    </div>

                                </div>

                                <div class="row labelSpace">
                                  
                                    <div class="col-md-6 mb-4 form-floating">
                                        <input type="text" id="inputUsuario" name="inUsuario" class="form-control" placeholder="Digite seu usuário" required>
                                        <label for="usuario">Criar usuário</label>
                                    </div>

                                    <div class="col-md-6 mb-4 form-floating">
                                        <input type="password" id="inputSenha" name="inSenha" class="form-control" placeholder="Digite sua senha" required>
                                        <label for="senha">Criar senha</label>
                                    </div>


                                </div>

                                   

                                <div class="mb-4">
                                    <label for="select">Função</label>
                                    <select name="tipo" class='form-select form-select-lg' placeholder="Função">
                                        <option disabled></option>
                                        <option value="Vendedor">Vendedor</option>
                                        <option  value="Admin" >Administrador</option>
                                    </select>
                                </div>


                                <div class="row">

                                    <div class="col-md-12  d-flex justify-content-center">
                                        <button type="submit" class="botao btn-confirmar  mb-1">Confirmar</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    </div>

    <?php include '../componentes/js.php'; ?>
        
</body>

</html>

<?php
if (!empty($_POST['nome']) || !empty($_POST['cpf'])) {


    if (cadastrarUsuario($_POST)) { ?>        

        <script language='javascript'>
            swal.fire({ 
                icon:"success",
                text: "Feito com Sucesso!",
                type: "success"}).then(okay => {
                    // if (okay) {
                    //     window.location.href = "painel.php?r=";
                    // }
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