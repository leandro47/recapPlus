<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?= $titlePage ?></title>

    <!-- Icon  -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>" type="image/x-icon">

    <!-- Fontfaces CSS-->
    <link href="<?= base_url('assets') ?>/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets') ?>/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets') ?>/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets') ?>/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url('assets') ?>/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= base_url('assets') ?>/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets') ?>/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets') ?>/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets') ?>/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets') ?>/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets') ?>/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets') ?>/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- DataTables  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css">

    <!-- Main CSS-->
    <link href="<?= base_url('assets') ?>/css/theme.css" rel="stylesheet" media="all">

    <!-- Custom css  -->
    <link href="<?= base_url('assets') ?>/custom/css/style.css" rel="stylesheet" media="all">

    <script>
        const BASE_URL = "<?= base_url('') ?>"
    </script>

</head>

<body class="animsition">
    <div class="">
        <div id="printers_romaneio" class="bg-white">
            <div class="row">
                <div class="col-12 text-center noprint mt-3 mb-3">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="<?= base_url('main') ?>" class="btn btn-lg btn-secondary" style="width: 150px;">Voltar</a>
                        <a href="javascript:window.print()" class="btn btn-2 btn-lg" style="width: 150px;">Imprimir</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="title-romaneio">OS <?= $orderService->idOs ?></p>
                    <hr>
                </div>
                <div class="col-12 text-center">
                    <p class="title-romaneio">Mallon Conc. de Veic. Comerciais LTDA</p>
                    <br>
                    <p class="subtitle-romaneio">R. Agricultora Frieda Grossl Nº2500 </p>
                    <p class="subtitle-romaneio">Bairro Faxinal - MAFRA SC </p>
                    <p class="subtitle-romaneio">CNPJ: 81.648.115/0005-12 </p>
                    <p class="subtitle-romaneio">I.E: 255.892.098</p>
                    <p class="subtitle-romaneio">Fone: (47)3641-1020</p>
                    <br>
                    <hr>
                </div>
                <div class="col-12">
                    <p class="subtitle-romaneio"><b>Vendedor :</b> <?= $orderService->saller ?> </p>
                    <p class="subtitle-romaneio"><b>Cliente :</b> <?= $orderService->clientName ?> </p>
                    <p class="subtitle-romaneio"><b>CPF / CNPJ :</b> <?= $orderService->cpfCnpj ?> </p>
                    <hr>
                    <p class="subtitle-romaneio"><b>Data abertura :</b> <?= $orderService->openDate ?> </p>
                    <br>
                </div>
                <div class="col-12">
                    <table class="table table-striped table-romaneio">
                        <thead>
                            <tr>
                                <th scope="col">Marca</th>
                                <th scope="col">Banda</th>
                                <th scope="col">Dimensão</th>
                                <th scope="col">Dot</th>
                                <th scope="col">Nº Pneu</th>
                                <th scope="col">Fogo</th>
                                <th scope="col">Garantia</th>
                                <th scope="col">Preço</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sum = 0; ?>
                            <?php foreach ($itensOs as $iten) : ?>
                                <?php $sum = $sum + $iten->tirePrice ?>
                                <tr>
                                    <td><?= $iten->tireBrand ?></td>
                                    <td><?= $iten->tireBand ?></td>
                                    <td><?= $iten->tireSize ?></td>
                                    <td><?= $iten->tireDot ?></td>
                                    <td><?= $iten->tireNumber ?></td>
                                    <td><?= $iten->fire ?></td>
                                    <td><?= $iten->warranty == 'yes' ? 'sim' : 'não' ?></td>
                                    <td><?= forReal($iten->tirePrice) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                <td colspan="8" class="text-right"><b style="font-size: 2.2rem">Total R$
                                        <?= forReal($sum) ?></b></td>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                    <hr>
                </div>
                <div class="col-12 mb-2">
                    <p class="subtitle-romaneio"><b>Data prevista entrega :</b> <?= $orderService->deliveryDate ?> </p>
                    <p class="subtitle-romaneio"><b>Condição pagamento :</b> <?= $orderService->formPay ?> </p>
                    <p class="subtitle-romaneio"><b>Observação :</b> <?= $orderService->observation ?> </p>
                    <hr>
                    <p class="subtitle-romaneio text-center">
                        <b>ATENÇÃO</b>
                    </p>
                    <p class="subtitle-romaneio text-center">
                        Além dos serviços acima autorizo a Mallon Concessionaria de veículos Comerciais LTDA a
                        efetuar eventuais reparos que forem necessários após o exame de carcaças, e que
                        concordo que as carcaças poderão ser recusadas após o processo de escarearão.
                    </p>
                    <br>
                    <p class="subtitle-romaneio text-center">
                        Garantimos todos os nossos serviços e produtos pelo prazo de 90 dias.
                    </p>
                </div>
                <div class="col-12 text-center mt-5">
                    <b>________________________________________________________________</b>
                    <p class="subtitle-romaneio"><?= $orderService->clientName ?> </p>
                </div>
            </div>
        </div>
    </div>