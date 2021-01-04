<!--  Modal insert tire FormPay -->
<div class="modal fade" id="modalNewClient" tabindex="-1" aria-labelledby="modalNewClientLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-barcode"></i> &nbsp; Cadastrar Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Inicio do formulario  -->
                <form action="" id="saveClient" method="POST" class="form" role="form">
                    <div class="row">

                        <!-- Cliente  -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="cnpjCnpj" class="control-label">CPF / CNPJ <span> <strong>*</strong></span></label>
                                <input type="text" class="form-control" id="cpfCnpj" name="cpfCnpj" placeholder="Digite aqui" required>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="razaoSocial" class="control-label">Razão Social <span> <strong>*</strong></span></label>
                                <input type="text" class="form-control" id="razaoSocial" name="razaoSocial" placeholder="Digite aqui" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="tipo" class="control-label">Tipo<span> <strong>*</strong></span></label>
                                <select class="custom-select" name="tipo" id="tipo">
                                    <option value="fis">Fisica</option>
                                    <option value="jur">Juridica</option>
                                </select>
                            </div>
                        </div>

                        <!-- Endereço  -->
                        <div class="col-sm-12 mt-3">
                            <p class="font-weight-bold">Endereço</p>
                            <hr>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="cep" class="control-label">CEP <span> <strong>*</strong></span></label>
                                <input type="number" class="form-control" onchange="requestCep()" id="cep" name="cep" placeholder="" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="uf" class="control-label">UF <span> <strong>*</strong></span></label>
                                <select class="custom-select" onchange="RequestCitybyUf()" name="uf" id="uf">
                                    <option value="" selected></option>
                                    <?php foreach ($ufs as $uf) : ?>
                                        <option value="<?= $uf->initials ?>"><?= $uf->name_uf ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="cidade" class="control-label">Cidade <span> <strong>*</strong></span></label>
                                <select class="custom-select" name="cidade" id="cidade"></select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="bairro" class="control-label">Bairro <span> <strong>*</strong></span></label>
                                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite aqui" required>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="logradouro" class="control-label">Logradouro <span> <strong>*</strong></span></label>
                                <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Digite aqui" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="numero" class="control-label">Numero</label>
                                <input type="text" class="form-control" id="numero" name="numero" placeholder="Digite aqui">
                            </div>
                        </div>

                        <!-- Contato  -->
                        <div class="col-sm-12 mt-3">
                            <p class="font-weight-bold">Contato</p>
                            <hr>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="telefone1" class="control-label">Telefone 1 <span> <strong>*</strong></span></label>
                                <input type="text" class="form-control" id="telefone1" name="telefone1" placeholder="Digite aqui" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="telefone2" class="control-label">Telefone 2 <span> <strong></strong></span></label>
                                <input type="text" class="form-control" id="telefone2" name="telefone2" placeholder="Digite aqui">
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <button type="submit" id="btnSave" class="btn btn-2"> <i class="fa fa-save"></i> Gravar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </form>
                <!-- final formulario  -->
            </div>
        </div>
    </div>
</div>

<!-- Modal View Client  -->
<div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-eye"></i></i> &nbsp; <b id="name"></b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">

                    </div>
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-2" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal update Client  -->
<div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="modalUpdateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-barcode"></i> &nbsp; Atualizar forma de pagamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Inicio do formulario  -->
                <form action="" id="updateFormPay" method="POST" class="form" role="form">
                    <div class="row">
                        <input type="hidden" class="form-control" id="idUpdate" name="idUpdate" value="">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="description" class="control-label"> forma de pagamento <span> <strong>*</strong></span></label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Digite aqui" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="statusFormPay" class="control-label"> Status <span> <strong>*</strong></span></label>
                                <select class="custom-select" name="statusFormPay" id="statusFormPay">
                                    <option value="yes">Ativo</option>
                                    <option value="no">Inativo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" id="btnUpdate" class="btn btn-2"> <i class="fa fa-save"></i> Gravar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </form>
                <!-- final formulario  -->
            </div>
        </div>
    </div>
</div>
<!-- End modal update Client  -->

<!-- Modal delete Client  -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalUpdateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-question"></i></i> &nbsp; Deletar forma de pagamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Inicio do formulario  -->
                <form action="" id="deleteFormPay" method="POST" class="form" role="form">
                    <div class="row">
                        <input type="hidden" class="form-control" id="idDelete" name="idDelete" value="">
                        <div class="col-sm-12">
                            <div class="form-group">
                                Deseja realmente excluir <b id="descriptionDelete"></b> ?
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" id="btnDelete" class="btn btn-2"> <i class="fas fa-check"></i> Sim</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                        </div>
                    </div>
                </form>
                <!-- final formulario  -->
            </div>
        </div>
    </div>
</div>
<!-- End modal delete Client  -->