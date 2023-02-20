<body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_cargo"><a href="#" class="nav_cargo"><span class="nav_logo-cargo"><?php echo $_SESSION['cargo']  ?></span></a>
            </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <?php include_once "../_scripts/functions.php"; ?>
                    <a href="#" class="nav_logo mb-0"><i class='bx bxs-id-card nav_logo-icon'></i> <span class="nav_logo-name"><?php echo $_SESSION['nome']; ?></span></a>
                     <hr>

                        <div class="nav_list">
                            <a href="../tela_inicial/tela_inicial.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Painel</span> </a>
                            <a href="../tela_inicial/tela_inicial.php#avisos" class="nav_link"> <i class='bx bx-bell nav_icon'></i> <span class="nav_name">Avisos</span></a>
                            <a href="../tela_inicial/tela_inicial.php#vendas" class="nav_link"> <i class='bx bx-cart nav_icon'></i> <span class="nav_name">Vendas</span></a>
                            <a href="../tela_inicial/tela_inicial.php#produtos" class="nav_link"> <i class='bx bx-package nav_icon'></i> <span class="nav_name">Produtos</span> </a>
                            <a href="../tela_inicial/tela_inicial.php#estoque" class="nav_link"> <i class='bx bx-purchase-tag-alt nav_icon'></i> <span class="nav_name">Estoque</span> </a>
                            <a href="../tela_inicial/tela_inicial.php#usuarios" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Usuários</span> </a>

                        </div>
                </div>

                <a href="../login/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span> </a>
            </nav>
        </div>
        <!--Container Main start-->

        <div class="height-100 ">