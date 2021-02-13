<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a href="index.html" style="max-width: 80%;">
                    <img src="<?= base_url('assets') ?>/images/icon/logoString.png" width="30%" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">

                <!-- Inicio  -->
                <li>
                    <a href="<?= base_url('main') ?>"><i class="fas fa-home"></i>Inicio</a>
                </li>

                <!-- DashBoard  -->
                <li>
                    <a href="#!"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>

                <!-- CPK  -->
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-car"></i>CPK</a>
                    <ul class="list-unstyled navbar-mobile-sub__list js-sub-list">
                        <li>
                            <a href="#!">Nova consulta</a>
                        </li>
                        <li>
                            <a href="#!">Histórico</a>
                        </li>
                    </ul>
                </li>

                <!-- Ordem de serviço  -->
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-clipboard-list"></i>Ordem Serviço</a>
                    <ul class="list-unstyled navbar-mobile-sub__list js-sub-list">
                        <li>
                            <a href="<?= base_url('newOrderService') ?>">Novo</a>
                        </li>
                        <li>
                            <a href="index2.html">Abertas</a>
                        </li>
                        <li>
                            <a href="index2.html">Encerradas</a>
                        </li>
                    </ul>
                </li>

                <!-- Financeiro  -->
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="far fa-money-bill-alt"></i>Financeiro</a>
                    <ul class="list-unstyled navbar-mobile-sub__list js-sub-list">
                        <li>
                            <a href="index.html">Aprovação de pedidos</a>
                        </li>
                    </ul>
                </li>

                <!-- Cadastro  -->
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-plus-circle"></i>Cadastro</a>
                    <ul class="list-unstyled navbar-mobile-sub__list js-sub-list">
                        <li>
                            <a href="<?= base_url('client') ?>">Cliente</a>
                        </li>
                        <li>
                            <a href="<?= base_url('formPay') ?>">Forma de pagamento</a>
                        </li>
                        <li>
                            <a href="<?= base_url('tireSize') ?>">Medida</a>
                        </li>
                        <li>
                            <a href="<?= base_url('tireBand') ?>">Banda</a>
                        </li>
                        <li>
                            <a href="<?= base_url('tireBrand') ?>">Marca</a>
                        </li>
                        <li>
                            <a href="index2.html">Metas Vendedor</a>
                        </li>
                    </ul>
                </li>

                <!-- Relatórios  -->
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-clipboard-list"></i>Relatórios</a>
                    <ul class="list-unstyled navbar-mobile-sub__list js-sub-list">
                        <li>
                            <a href="index.html">Clientes</a>
                        </li>
                        <li>
                            <a href="index2.html">Visita</a>
                        </li>
                        <li>
                            <a href="index2.html">Acompanhamento KM</a>
                        </li>
                    </ul>
                </li>

                <!-- Configurações  -->
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-wrench"></i>Configurações</a>
                    <ul class="list-unstyled navbar-mobile-sub__list js-sub-list">
                        <li>
                            <a href="index.html">Usuários</a>
                        </li>
                    </ul>
                </li>

                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="<?= base_url('assets') ?>/images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <!-- Inicio  -->
                <li>
                    <a href="<?= base_url('main') ?>"><i class="fas fa-home"></i>Inicio</a>
                </li>

                <!-- DashBoard  -->
                <li>
                    <a href="chart.html"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>

                <!-- CPK  -->
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-car"></i>CPK</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.html">Nova consulta</a>
                        </li>
                        <li>
                            <a href="index2.html">Histórico</a>
                        </li>
                    </ul>
                </li>

                <!-- Ordem de serviço  -->
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-clipboard-list"></i>Ordem Serviço</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?= base_url('newOrderService') ?>">Novo</a>
                        </li>
                        <li>
                            <a href="index2.html">Abertas</a>
                        </li>
                        <li>
                            <a href="index2.html">Encerradas</a>
                        </li>
                    </ul>
                </li>

                <!-- Financeiro  -->
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="far fa-money-bill-alt"></i>Financeiro</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.html">Aprovação de pedidos</a>
                        </li>
                    </ul>
                </li>

                <!-- Cadastro  -->
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-plus-circle"></i>Cadastro</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?= base_url('client') ?>">Cliente</a>
                        </li>
                        <li>
                            <a href="<?= base_url('formPay') ?>">Forma de pagamento</a>
                        </li>
                        <li>
                            <a href="<?= base_url('tireSize') ?>">Medida</a>
                        </li>
                        <li>
                            <a href="<?= base_url('tireBand') ?>">Banda</a>
                        </li>
                        <li>
                            <a href="<?= base_url('tireBrand') ?>">Marca</a>
                        </li>
                        <li>
                            <a href="index2.html">Metas Vendedor</a>
                        </li>
                    </ul>
                </li>

                <!-- Relatórios  -->
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-clipboard-list"></i>Relatórios</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.html">Clientes</a>
                        </li>
                        <li>
                            <a href="index2.html">Visita</a>
                        </li>
                        <li>
                            <a href="index2.html">Acompanhamento KM</a>
                        </li>
                    </ul>
                </li>

                <!-- Configurações  -->
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-wrench"></i>Configurações</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.html">Usuários</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->

<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <div class="header-button">
                        <div class="row justify-content-between">
                            <div class="col-4 text-left">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <!-- <span class="quantity">1</span> -->
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>Não há nenhuma mensagem</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <!-- <span class="quantity">1</span> -->
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>Nenhum e-mail</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <!-- <span class="quantity">3</span> -->
                                        <div class="notifi-dropdown js-dropdown">

                                            <div class="notifi__title">
                                                <p>Nenhuma notificação</p>
                                            </div>

                                            <!-- <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div> -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 ml-3">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?= base_url('assets') ?>/images/icon/avatar-01.jpg" alt="<?= $userName ?>" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?= $userName ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?= base_url('assets') ?>/images/icon/avatar-01.jpg" alt="<?= $userName ?>" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?= $userName ?></a>
                                                    </h5>
                                                    <span class="email"><?= $login ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?= base_url('logout') ?>">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">