<!--  Modal insert tire Size -->
<div class="modal fade" id="modalNewSize" tabindex="-1" aria-labelledby="modalNewSizeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-barcode"></i> &nbsp; Cadastrar Medida</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Inicio do formulario  -->
                <form action="" id="saveTireSize" method="POST" class="form" role="form">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="tireSize" class="control-label"> Medida <span> <strong>*</strong></span></label>
                                <input type="text" class="form-control" id="tireSize" name="tireSize" placeholder="Digite aqui" required>
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

<!-- Modal update tire Size  -->
<div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="modalUpdateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-barcode"></i> &nbsp; Atualizar Medida</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Inicio do formulario  -->
                <form action="" id="updateTireSize" method="POST" class="form" role="form">
                    <div class="row">
                        <input type="hidden" class="form-control" id="idUpdate" name="idUpdate" value="">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="description" class="control-label"> Medida <span> <strong>*</strong></span></label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Digite aqui" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="statusTireSize" class="control-label"> Status <span> <strong>*</strong></span></label>
                                <select class="custom-select" name="statusTireSize" id="statusTireSize">
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
<!-- End modal update tire Size  -->

<!-- Modal delete tire Size  -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalUpdateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-question"></i></i> &nbsp; Deletar Medida</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Inicio do formulario  -->
                <form action="" id="deleteTireSize" method="POST" class="form" role="form">
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
<!-- End modal delete tire Size  -->