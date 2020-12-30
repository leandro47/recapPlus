<div id="formPay_index">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('main') ?>">Inicio</a></li>
                <li class="breadcrumb-item active">Cadastro</li>
                <li class="breadcrumb-item active" aria-current="page">Forma de pagamento</li>
            </ol>
        </nav>
    </div>
    <hr>
    <div class="row">
        <div class="form-group col-lg-12">
            <button type="button" id="btnNew" class="btn btn-2" data-toggle="modal" data-target="#modalNewFormPay"> <i class="fa fa-plus"></i> Novo</button>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive table table-bordered">
                <table class="table table-hover table-condensed table-bordered table-striped table-sm" id="tableFormPay" width="100%">
                    <thead>
                        <tr>
                            <th> ID</th>
                            <th> Descrição</th>
                            <th> Status</th>
                            <th> # </th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
