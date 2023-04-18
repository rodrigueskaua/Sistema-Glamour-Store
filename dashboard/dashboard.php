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
							<p class="text-uppercase mb-1 text-muted">Vendas</p>
							<h2><i class="fa fa-dollar"></i> 1,254</h2>
							<div>
								<span class="text-success font-weight-bold mr-1"><i class="fa fa-arrow-up"></i> +5%</span> 
								<span class="text-muted">últimos 30 dias</span>
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
							<p class="text-uppercase mb-1 text-muted">Usuários</p>
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
							<p class="text-uppercase mb-1 text-muted">Vendas</p>
							<h2><i class="fa fa-dollar"></i> 1,254</h2>
							<div>
								<span class="text-success font-weight-bold mr-1"><i class="fa fa-arrow-up"></i> +5%</span> 
								<span class="text-muted">últimos 30 dias</span>
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
							<p class="text-uppercase mb-1 text-muted">Usuários</p>
							<h2>21,254</h2>
							<div>
								<span class="text-danger font-weight-bold mr-1"><i class="fa fa-arrow-down"></i> -5%</span> 
								<span class="text-muted">últimos 30 dias</span>
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

    <!--SESSÃO GRAFICOS-->

    <section class="mb-8" id="graficos">

        <div class="container-fluid">
        <div class="cards-intro">
            <div class="row titulo mb-4">
                <h1>Gráficos</h1>
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


        <!--Container Main end-->
        <?php include "../componentes/js.php" ?>

</body>

</html>