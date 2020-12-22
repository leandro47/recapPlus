<div class="page-content--bge5">
    <div class="container">
        <div class="login-wrap">
            <div class="login-content">
                <div class="login-logo">
                    <img src="<?= base_url('assets') ?>/images/icon/logo.png" alt="CoolAdmin">
                </div>
                <div class="login-form">
                    <form method="POST" action="<?= base_url('login') ?>">
                        <div class="form-group">
                            <label>Usuário</label>
                            <input class="au-input au-input--full" type="login" name="email" placeholder="Email">
                        </div>
                        <div class="form-group mb-4">
                            <label>Senha</label>
                            <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                        </div>
                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Entrar</button>
                    </form>
                    <hr>
                    <div class="text-muted text-center"> &copy; RecapPlus <?php echo date('yy') ?> | Mallon</div>
                </div>
            </div>
        </div>
    </div>
</div>