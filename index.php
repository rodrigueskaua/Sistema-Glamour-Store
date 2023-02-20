<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--styles -->
    <link rel="icon" href="login/_img/Logo_Gusteau_Branca.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="login/_css/login.css" type="text/css">
</head>
<body style="height: 100% !important;">
    <div class="form-wrapper">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="logo d-flex justify-content-center mb-3">
                        <img src="login/_img/Jeane_logo-removebg-preview.png" alt="logo">
                    </div>
                    <div class="text-center my-1">
                        <p class="text-muted opacity-50">Faça login para continuar</p>
                    </div>
                    <form action="" method="POST">
                        <div class="form-group mb-3">
                            <div class="form-floating">
                                <input required type="text" class="form-control" name="usuario" id="usuario" placeholder="Enter fullname" autofocus>
                                <label for="usuario">Usuário</label>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="form-floating">
                                <div class="position-relative">
                                    <label for="" class="input-icon">
                                        <button onclick="mostrarSenha(event)"><i id="icon" class="fa-regular fa-eye"></i></button>
                                    </label>
                                </div>
                                <input required type="password" name="senha"  class="form-control" id="password" placeholder="Enter password">
                                <label for="password">Senha</label>
                                
                                </div>
                        </div>
                        <div class="form-group mt-5">
                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    <script src="_js/functions.js"></script>

</body>
</html>

<?php

// Executa o código quando os campos de úsuario e senha não estiverem vazios
if (isset($_POST['usuario']) || isset($_POST['senha'])) {
  include '_scripts/functions.php';

  login($_POST);
}

?>