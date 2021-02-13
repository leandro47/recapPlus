<div id="orderService_searchClient">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('main') ?>">Inicio</a></li>
                <li class="breadcrumb-item active">Ordem de Serviço</li>
                <li class="breadcrumb-item active" aria-current="page"><?= $titlePage ?></li>
            </ol>
        </nav>
    </div>

    <!-- Select Client  -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-muted">Pesquisar Cliente</p>
                            <hr>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" id="searchClient" placeholder="Pesquise por um cliente através do cpf, cnpj, nome ou razão social" name="searchClient" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12" id="tableClient">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-hover" id="tableClients">
                                <thead>
                                    <tr>
                                        <th scope="col">CPF / CNPJ</th>
                                        <th scope="col">Nome / Razão Social</th>
                                        <th scope="col" class="text-center">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>