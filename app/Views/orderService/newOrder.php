<div id="orderService_newOrder">

    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('main') ?>">Inicio</a></li>
                <li class="breadcrumb-item active">Ordem de Serviço</li>
                <li class="breadcrumb-item active" aria-current="page"><?= $titlePage ?></li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 text-center">
            <div class="card border-light mb-3" style="max-width: 100rem;">
                <div class="card-header">Cliente</div>
                <div class="card-body">
                    <h5 class="card-title"><?= $client->name ?></h5>
                    <p class="card-text"><?= $client->cnpjCpf ?></p>
                </div>
            </div>
        </div>

        <div class="col-12 ">
            <form action="<?= base_url('OrderService/insert') ?>" id="formNewOs" method="POST" class="form" role="form">
                <input type="hidden" class="form-control" id="client<?= $client->id ?>" name="client<?= $client->id ?>" value="">

                <div class="card border-light mb-3" style="max-width: 100rem;">
                    <div class="card-header text-center">Itens OS</div>
                    <div class="card-body formContent">

                        <div class="row mb-3">
                            <div class="col-sm-12 text-center">
                                <a href="javascript:void(0)" class="btn btn-info btn-sm" id="btnAdd" role="button" aria-pressed="true"><i class="fas fa-plus-circle"></i> Adicionar</a>
                            </div>
                        </div>

                        <!-- Start Form  -->
                        <div class="tireForm">
                            <div class="card border-secondary mb-1" style="max-width: 100rem;">
                                <div class="card-body text-secondary">
                                    <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <a href="#!" class="btn btn-danger btn-sm remove_field" role="button" aria-pressed="true"><i class="fas fa-trash-alt"></i> Remover</a>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="tireBrand[]" class="control-label"> Marca <span> <strong>*</strong></span></label>
                                                <select class="custom-select" name="tireBrand[]" id="tireBrand[]">
                                                    <?php foreach ($brand as $item) : ?>
                                                        <option value="<?= $item->id ?>"><?= $item->description ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="tireBand[]" class="control-label"> Banda <span> <strong>*</strong></span></label>
                                                <select class="custom-select" name="tireBand[]" id="tireBand[]">
                                                    <?php foreach ($band as $item) : ?>
                                                        <option value="<?= $item->id ?>"><?= $item->description ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="tireSize[]" class="control-label"> Medida <span> <strong>*</strong></span></label>
                                                <select class="custom-select" name="tireSize[]" id="tireSize[]">
                                                    <?php foreach ($size as $item) : ?>
                                                        <option value="<?= $item->id ?>"><?= $item->description ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="tireNumber[]" class="control-label"> Número <span> <strong>*</strong></span></label>
                                                <input type="text" class="form-control" id="tireNumber[]" name="tireNumber[]" placeholder="Número pneu" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="tireDot[]" class="control-label"> Dot <span> <strong>*</strong></span></label>
                                                <input type="text" class="form-control" id="tireDot[]" name="tireDot[]" placeholder="Número dot" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="fire[]" class="control-label"> Fogo <span> <strong>*</strong></span></label>
                                                <input type="text" class="form-control" id="fire[]" name="fire[]" placeholder="Número fogo" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="tirePrice[]" class="control-label"> Preço <span> <strong>*</strong></span></label>
                                                <input type="text" class="form-control" id="tirePrice[]" name="tirePrice[]" placeholder="Preço" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="warranty[]" class="control-label"> Garantia <span> <strong>?</strong></span></label>
                                                <select class="custom-select" name="warranty[]" id="warranty[]">
                                                    <option value="yes">Sim</option>
                                                    <option value="no">Não</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 ">
                                    <hr>
                                </div>
                            </div>
                        </div> <!-- end form -->

                    </div>
                </div>
                <div class="card border-light mb-3" style="max-width: 100rem;">
                    <div class="card-header text-center">Forma de pagamento</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="formPay" class="control-label"> Forma de pagamento <span> <strong>*</strong></span></label>
                                    <select class="custom-select" name="formPay" id="formPay">
                                        <?php foreach ($formPay as $item) : ?>
                                            <option value="<?= $item->id ?>"><?= $item->description ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="customFormPay" class="control-label"> Especial</label>
                                    <input type="text" class="form-control" id="customFormPay" name="customFormPay" placeholder="Customizado">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-light mb-3" style="max-width: 100rem;">
                    <div class="card-header text-center">Outras informações</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="deliveryDate" class="control-label">Entrega <span> <strong>*</strong></span></label>
                                    <input type="date" class="form-control" id="deliveryDate" name="deliveryDate" required placeholder="Customizado">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="sellerObservation" class="control-label">Observação</label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="sellerObservation" id="sellerObservation"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 text-right">
                                <hr>
                                <button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i> Criar OS</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



</div>