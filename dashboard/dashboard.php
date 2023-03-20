<?php
include '../login/protect.php';
include "../_scripts/functions.php";

?>
<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../_images/bx-package.svg">
    <link rel="stylesheet" href="../_css/telagerente.css">
    <link rel="stylesheet" href="../_css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">


    <title>Painel do Gerente</title>

</head>

<body id="body-pd">
    <?php include "../menu/menuGerente.php";?>
        
    <!--SESSÃO Dashboard-->

    <section id="dashboard" class="main-content mb-8" >
		<div class="container-fluid">
            <div class="row titulo mb-4">
                    <h1>Dashboard</h1>
            </div>
			<div class="row d-flex">
				<div class="col-sm-6">
					<div class="stat-card">
						<div class="stat-card__content">
							<p class="text-uppercase mb-1 text-muted">Revenue</p>
							<h2><i class="fa fa-dollar"></i> 1,254</h2>
							<div>
								<span class="text-success font-weight-bold mr-1"><i class="fa fa-arrow-up"></i> +5%</span> 
								<span class="text-muted">vs last 28 days</span>
							</div>
						</div>
						<div class="stat-card__icon stat-card__icon--success">
							<div class="stat-card__icon-circle">
								<i class="bx bx-purchase-tag-alt"></i>
							</div>
						</div>
					</div>
				</div>
                
				<div class="col-sm-6">
					<div class="stat-card">
						<div class="stat-card__content">
							<p class="text-uppercase mb-1 text-muted">Users</p>
							<h2>21,254</h2>
							<div>
								<span class="text-danger font-weight-bold mr-1"><i class="fa fa-arrow-down"></i> -5%</span> 
								<span class="text-muted">vs last 28 days</span>
							</div>
						</div>
						<div class="stat-card__icon stat-card__icon--primary">
							<div class="stat-card__icon-circle">
								<i class="fa fa-users"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

            <div class="row">
				<div class="col-sm-6">
					<div class="stat-card">
						<div class="stat-card__content">
							<p class="text-uppercase mb-1 text-muted">Revenue</p>
							<h2><i class="fa fa-dollar"></i> 1,254</h2>
							<div>
								<span class="text-success font-weight-bold mr-1"><i class="fa fa-arrow-up"></i> +5%</span> 
								<span class="text-muted">vs last 28 days</span>
							</div>
						</div>
						<div class="stat-card__icon stat-card__icon--success">
							<div class="stat-card__icon-circle">
								<i class="bx bx-purchase-tag-alt"></i>
							</div>
						</div>
					</div>
				</div>
                
				<div class="col-sm-6">
					<div class="stat-card">
						<div class="stat-card__content">
							<p class="text-uppercase mb-1 text-muted">Users</p>
							<h2>21,254</h2>
							<div>
								<span class="text-danger font-weight-bold mr-1"><i class="fa fa-arrow-down"></i> -5%</span> 
								<span class="text-muted">vs last 28 days</span>
							</div>
						</div>
						<div class="stat-card__icon stat-card__icon--primary">
							<div class="stat-card__icon-circle">
								<i class="fa fa-users"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
            
		</div>
	</section>

    <!--SESSÃO AVISOS-->

    <section class="mb-8" id="avisos">

        <div class="container-fluid">
        <div class="cards-intro">
            <div class="row titulo mb-4">
                <h1>Avisos</h1>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <div class="alert alert-warning alert-dismissible alert-light fade show" role="alert">
                    <strong>
                        <h3>ATENÇÃO!</h3>
                    </strong>
                    Alguns produtos estão quase acabando. <a href="../produtos/estoque_baixo.php" class="alert-link">Confira</a>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <div class="alert alert-warning alert-dismissible alert-light fade show" role="alert">
                    <strong>
                        <h3> ATENÇÃO!</h3>
                    </strong>
                    Alguns produtos estão quase vencendo. <a href="../produtos/estoque_baixo.php" class="alert-link">Confira</a>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>

    </section>

       

    <section class="mb-8" id="vendas">

        <!--SESSÃO VENDAS-->
        <div class="container-fluid">
            <div class="cards-intro">
                <div class="row titulo mb-4">
                    <h1>Vendas</h1>
                </div>
                <div class="row ">

                    <div class="col-md-3 container">
                        <button onclick="window.location.href = '../vendas/venda.php'" type="submit" class="btn btn-confirmar mb-1 card-body">
                            <p class="card-text">Nova Venda</p>
                            <i class="fa-solid fa-cart-shopping fa-3x card-icon"></i>
                        </button>
                    </div>

                    <div class="col-md-3 container">
                        <button onclick="window.location.href = '../vendas/listar_vendas.php'" type="submit" class="btn btn-confirmar mb-1 card-body">
                            <p class="card-text">Pesquisar</p>
                            <i class="fa-solid fa-magnifying-glass fa-3x card-icon"></i>
                        </button>
                    </div>

                    <div class="col-md-3 container">
                        <button onclick="window.location.href = '../vendas/cancelar_venda.php'" type="submit" class="btn btn-confirmar mb-1 card-body">
                            <p class="card-text">cancelar venda</p>
                            <i class="fa-solid fa-ban fa-3x card-icon"></i>
                        </button>
                    </div>

                    <div class="col-md-3 container">

                    </div>

                </div>
            </div>
        </div>

    </section>

    <!--SESSÃO PRODUTOS-->
    <section class="mb-8" id="produtos">
        <div class="container-fluid">
            <div class="cards-intro">
                <div class="row titulo mb-4">
                    <h1>Produtos</h1>
                </div>
                <div class="row ">

                    <div class="col-md-3 container">
                        <button onclick="window.location.href = '../produtos/cadastro_produtos.php'" type="submit" class="btn btn-confirmar mb-1 card-body">
                            <p class="card-text">Novo</p>
                            <i class="fa-solid fa-plus fa-4x card-icon"></i>
                        </button>
                    </div>

                    <div class="col-md-3 container">
                        <button onclick="window.location.href = '../produtos/listar_produtos_Sessao.php'" type="submit" class="btn btn-confirmar mb-1 card-body">
                            <p class="card-text">Pesquisar</p>
                            <i class="fa-solid fa-magnifying-glass fa-3x card-icon"></i>
                        </button>
                    </div>

                    <div class="col-md-3 container">
                        <button onclick="window.location.href = '../produtos/listar_produtos.php'" type="submit" class="btn btn-confirmar mb-1 card-body">
                            <p class="card-text">editar</p>
                            <i class="fa-solid fa-pen-to-square card-icon"></i>
                        </button>
                    </div>

                    <div class="col-md-3 container">
                        <!-- <button type="submit" class="btn btn-confirmar mb-1 card-body">
                                <p class="card-text">excluir</p>
                                <i class="fa-solid fa-trash-can fa-3x card-icon"></i>
                            </button> -->
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--SESSÃO ESTOQUE-->
    <section class="mb-8" id="estoque">
        <div class="container-fluid">


            <div class="cards-intro">
                <div class="row titulo mb-4">
                    <h1>Estoque</h1>
                </div>

                <!--ALERTA-->


                <!--BOTÕES-->
                <div class="row">



                    <div class="col-md-3 container">
                        <button type="submit" onclick="window.location.href = '../produtos/estoque_baixo.php'" class="btn btn-confirmar mb-1 card-body">
                            <p class="card-text">sugestão de compras</p>
                            <i class="fa-solid fa-list-check fa-3x card-icon"></i>
                        </button>
                    </div>

                    <div class="col-md-3 container">
                        <!--  -->
                    </div>

                    <div class="col-md-3 container">
                        <!-- <button type="submit" class="btn btn-confirmar mb-1 card-body">
                            <p class="card-text">comprar mais</p>
                            <i class="fa-solid fa-cart-arrow-down fa-3x card-icon"></i>
                        </button> -->
                    </div>

                    <div class="col-md-3 container">
                        <!-- <button type="submit" class="btn btn-confirmar mb-1 card-body">
                            <p class="card-text">Pesquisar</p>
                            <i class="fa-solid fa-magnifying-glass fa-3x card-icon"></i>
                        </button> -->
                    </div>

                </div>
            </div>
        </div>

    </section>

    <section class="mb-8" id="usuarios">
        <div class="container-fluid">
            <div class="cards-intro">
                <div class="row titulo mb-4">
                    <h1>Usuários</h1>
                </div>
                <div class="row ">

                    <div class="col-md-3 container">
                        <button onclick="window.location.href = '../usuarios/cadastro_usuario.php'" type="submit" class="btn btn-confirmar mb-1 card-body">
                            <p class="card-text">Novo</p>
                            <i class="fa-solid fa-plus fa-4x card-icon"></i>
                        </button>
                    </div>



                    <div class="col-md-3 container">
                        <button onclick="window.location.href = '../usuarios/listar_usuarios.php'" type="submit" class="btn btn-confirmar mb-1 card-body">
                            <p class="card-text">editar</p>
                            <i class="fa-solid fa-pen-to-square card-icon"></i>
                        </button>
                    </div>

                    <div class="col-md-3 container">
                        <!-- <button type="submit" class="btn btn-confirmar mb-1 card-body">
                                <p class="card-text">excluir</p>
                                <i class="fa-solid fa-trash-can fa-3x card-icon"></i>
                            </button> -->
                    </div>

                    <div class="col-md-3 container">
                        <!-- <button type="submit" class="btn btn-confirmar mb-1 card-body">
                                <p class="card-text">excluir</p>
                                <i class="fa-solid fa-trash-can fa-3x card-icon"></i>
                            </button> -->
                    </div>

                </div>
            </div>
        </div>
    </section>


        <!--Container Main end-->
        <?php include "../componentes/js.php" ?>

</body>

</html>