<div class="page-content--bge5">
    <div class="container">
        <div class="login-wrap">
            <div class="login-content">
                <div class="login-logo">
                    <img src="<?= base_url('assets') ?>/images/icon/logo.png" alt="CoolAdmin">
                </div>

                <?php if (isset($validation)) : ?>

                <div class="alert alert-<?= $validation['data']['status'] ?> alert-dismissible fade show" role="alert">
                    <strong>Algo deu errado!</strong> <?= $validation['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php endif; ?>

                <div class="login-form">
                    <form method="POST" action="<?= base_url('/login') ?>">
                        <div class="form-group">
                            <label>Usuário</label>
                            <input class="au-input au-input--full" type="text" name="login" placeholder="Email" required>
                        </div>
                        <div class="form-group mb-4">
                            <label>Senha</label>
                            <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                        </div>
                        <button class="au-btn au-btn--block btn-1 m-b-20" type="submit">Entrar</button>
                    </form>
                    <hr>
                    <div class="text-muted text-center"> &copy; RecapPlus <?php echo date('Y') ?> | Mallon</div>
                </div>
            </div>
        </div>
    </div>
</div>