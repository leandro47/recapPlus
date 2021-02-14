<div>
    <div class="row">
        <div class="col-sm-12 text-center">
            <h3>Bem vindo <?= $userName ?></h3>
        </div>
    </div>

    <div class="row justify-content-md-center mb-3">
        <?php if (isset($message)) : ?>
            <div class="col-sm-12 col-md-6 col-lg-12 mt-4">
                <div class="alert alert-<?= $status ?> alert-dismissible fade show text-center" role="alert">
                    <?= $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php endif; ?>

        <div class="col-12 mb-3">
            <hr>
            <h4>Acesso rápido</h4>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
            <a href="<?= base_url('orderservice') ?>" class="btn btn-2 btn-block mb-1" role="button" aria-pressed="true">Nova OS</a>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
            <a href="#" class="btn btn-2 btn-block mb-1" role="button" aria-pressed="true">OS em aberto</a>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
            <a href="#" class="btn btn-2 btn-block mb-1" role="button" aria-pressed="true">Aprovação de pedidos</a>

        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-sm-12 text-center mt-5">
            <img src="<?= base_url('assets/images/pages/home.svg') ?>" class="img-fluid text-center" style="max-height: 350px;" alt="Responsive image">
        </div>
    </div>
</div>