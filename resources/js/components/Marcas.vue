<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">Busca de Marcas</div>

                    <!-- IINICIO DO CARD DE BUSCA -->
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col form-group">
                                <input-container-component titulo="ID" id="inputId" id-help="idHelp"
                                    texto-ajuda="Opcional, informe o id da marca">

                                    <input type="number" class="form-control" id="inputId" aria-describedby="idHelp"
                                        placeholder="ID">

                                </input-container-component>

                            </div>
                            <div class="col form-group">
                                <input-container-component titulo="Nome da Marca" id="nome" id-help="idHelp"
                                    texto-ajuda="Opcional, informe o nome da marca">

                                    <input type="text" class="form-control" id="nome" placeholder="Nome da marca"
                                        aria-describedby="nomeHelp">

                                </input-container-component>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm float-end">Pesquisar</button>
                    </div>
                    <!-- FIM DO CARD DE BUSCA -->
                </div>
                <!-- INICIO DO CARD DE LISTAGEM DE MARCAS-->
                <div class="card mb-3">
                    <div class="card-header">Relações de marcas</div>

                    <!-- IINICIO DO CARD DE BUSCA -->
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm float-end">Adicionar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

</script>
