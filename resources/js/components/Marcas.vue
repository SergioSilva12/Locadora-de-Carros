<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <cards-component titulo="Busca de marcas">
                    <template v-slot:conteudo>
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
                    </template>

                    <template v-slot:rodape>
                        <button type="submit" class="btn btn-primary btn-sm float-end">Pesquisar</button>
                    </template>
                </cards-component>


                <!-- INICIO DO CARD DE LISTAGEM DE MARCAS-->
                <cards-component titulo="Relações de marcas">
                    <template v-slot:conteudo>
                        <table-component></table-component>
                    </template>
                    <template v-slot:rodape>
                        <button type="submit" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Adicionar</button>
                    </template>
                </cards-component>

            </div>
            <!-- MODAL -->
            <modal-component></modal-component>
        </div>
    </div>
</template>

<script>

</script>
