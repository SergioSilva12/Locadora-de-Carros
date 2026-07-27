<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Busca de Marcas</div>

                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col form-group">
                                <label for="inputId">ID</label>
                                <input type="number" class="form-control" id="inputId" aria-describedby="emailHelp"
                                    placeholder="ID">
                                <small id="emailHelp" class="form-text text-muted">Opcional, informe o ID da
                                    marca.</small>
                            </div>
                            <div class="col form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" id="nome" placeholder="Nome da marca"
                                    aria-describedby="nomeHelp">
                                <small id="nomeHelp" class="form-text text-muted">Opcional, o nome da marca.</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm float-end">Pesquisar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

</script>
