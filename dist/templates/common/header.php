    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <header class="site-header">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="btn-orders">Comenzi</a>
                        </div>
                        <div class="col">
                            <ul class="list-unstyled user-nav">
                                <li class="searchformcontainer">
                                    <a href="#"><i class="fas fa-fw fa-search"></i></a>
                                    <?php include_once("searchform.php"); ?>
                                </li>
                                <?php if (loggedIn()) { ?>
                                <li data-toggle="tooltip" data-placement="bottom" title="Retete Favorite"><a href="#" class="favorite"><i class="far fa-fw fa-heart"></i></a></li>
                                <li data-toggle="tooltip" data-placement="bottom" title="Contul Meu"><a href="<?php echo ROOT_PATH; ?>account"><i class="fas fa-fw fa-user"></i></a></li>
                                <li data-toggle="tooltip" data-placement="bottom" title="Iesire"><a href="inc/scripts/user/logout?session=end" class="logout"><i class="fas fa-fw fa-sign-out-alt"></i></i></a></li>
                                <?php } else { ?>
                                <li data-toggle="tooltip" data-placement="bottom" title="Autentificare"><a data-toggle="modal" data-target="#loginModal" href="#" class="login"><i class="far fa-fw fa-user"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div><!--/.row-->
                </div><!--/.container-->
            </div><!--/.top-bar-->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-auto col-lg-2 col-xl-1">
                        <a class="logo" href="<?php echo ROOT_PATH; ?>">
                            <span>ANAID</span>
                            <small>DELICIA</small>
                        </a>
                    </div>
                    <div class="col-auto ml-auto d-lg-none">
                        <button class="mobile-menu-trigger">
                            <span></span>
                        </button>
                    </div>
                    <div class="col-12 col-lg-10 col-xl-11">
                        <nav class="main-nav">
                            <ul class="list-unstyled nav-list">
                                <li><a href="<?php echo ROOT_PATH . "category"; ?>">Retete</a></li>
                                <li><a href="<?php echo ROOT_PATH . "tip"; ?>">Sfaturi Culinare</a></li>
                                <li><a href="#">Generare Meniu</a></li>
                                <li><a href="#">Topuri</a></li>
                                <li><a href="#">Contactati-ne</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div><!--/.container-->
        </header>
