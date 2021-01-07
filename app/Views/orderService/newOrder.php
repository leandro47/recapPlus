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
                    <div class="card-body">

                        <!-- Start Form  -->
                        <div class="tireForm1">
                            <div class="card border-secondary mb-1" style="max-width: 100rem;">
                                <div class="card-body text-secondary">
                                    <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <a href="#!" class="btn btn-danger btn-sm disabled remove_field" role="button" aria-pressed="true"><i class="fas fa-trash-alt"></i> Remover</a>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="tireBrand" class="control-label"> Marca <span> <strong>*</strong></span></label>
                                                <select class="custom-select" name="tireBrand1" id="tireBrand1">
                                                    <option value="yes">Ativo</option>
                                                    <option value="no">Inativo</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="tireBand1" class="control-label"> Banda <span> <strong>*</strong></span></label>
                                                <select class="custom-select" name="tireBand1" id="tireBand1">
                                                    <option value="yes">Ativo</option>
                                                    <option value="no">Inativo</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="tireSize1" class="control-label"> Medida <span> <strong>*</strong></span></label>
                                                <select class="custom-select" name="tireSize1" id="tireSize1">
                                                    <option value="yes">Ativo</option>
                                                    <option value="no">Inativo</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="tireNumber1" class="control-label"> Número <span> <strong>*</strong></span></label>
                                                <input type="text" class="form-control" id="tireNumber1" name="tireNumber1" placeholder="Número pneu" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="tireDot1" class="control-label"> Dot <span> <strong>*</strong></span></label>
                                                <input type="text" class="form-control" id="tireDot1" name="tireDot1" placeholder="Número dot" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="fire1" class="control-label"> Fogo <span> <strong>*</strong></span></label>
                                                <input type="text" class="form-control" id="fire1" name="fire1" placeholder="Número fogo" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="tirePrice1" class="control-label"> Preço <span> <strong>*</strong></span></label>
                                                <input type="text" class="form-control" id="tirePrice1" name="tirePrice1" placeholder="Preço" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label for="warranty1" class="control-label"> Garantia <span> <strong>?</strong></span></label>
                                                <select class="custom-select" name="warranty1" id="warranty1">
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

                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <a href="javascript:void(0)" class="btn btn-info btn-sm" id="buttonAdc" role="button" aria-pressed="true"><i class="fas fa-plus-circle"></i> Adicionar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-light mb-3" style="max-width: 100rem;">
                    <div class="card-header text-center">Forma de pagamento</div>
                    <div class="card-body">
                        <div class="row">
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