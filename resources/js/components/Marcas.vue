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
                            data-bs-target="#modalMarca">Adicionar</button>
                    </template>
                </cards-component>

            </div>
            <!-- MODAL -->
            <modal-component id="modalMarca" titulo="Adicionar marca">
                <template v-slot:alertas>
                    <alert-component tipo="success" v-if="transacaoStatus=='Adicionado'" :detalhes="transacaoDetalhes" titulo="Marca cadastrada com sucesso"></alert-component>
                    <alert-component tipo="danger" v-if="transacaoStatus == 'Erro'" :detalhes="transacaoDetalhes" titulo="Erro ao tentar cadastrar a marca"></alert-component>
                </template>
                <template v-slot:conteudo>
                    <div class="form-group mb-2">
                        <input-container-component titulo="Nome da Marca" id="novoNome" id-help="novoNomeHelp"
                            texto-ajuda="Informe o nome da marca">

                            <input type="text" class="form-control" id="nome" placeholder="Nome da marca"
                                aria-describedby="nomeHelp" v-model="nomeMarca">
                        </input-container-component>
                    </div>

                    <div class="form-group">
                        <input-container-component titulo="Imagem" id="novoImagem" id-help="novoImagemHelp"
                            texto-ajuda="Selecione uma imagem no formato PNG">

                            <input type="file" class="form-control-file" id="nome" placeholder="Selecione uma imagem"
                                aria-describedby="nomeHelp" @change="carregarImagem($event)">
                            {{ arquivoImagem }}
                        </input-container-component>
                    </div>
                </template>
                <template v-slot:rodape>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" @click="salvar">Salvar</button>
                </template>
            </modal-component>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            urlBase: 'http://127.0.0.1:8000/api/v1/marca',
            nomeMarca: '',
            arquivoImagem: [],
            transacaoStatus:'',
            transacaoDetalhes:'',
        }
    },
    methods: {
        carregarImagem(event) {
            this.arquivoImagem = event.target.files;
        },
        salvar() {
            // Criando o formulário
            let formData = new FormData();
            formData.append('nome', this.nomeMarca);
            formData.append('imagem', this.arquivoImagem[0]);

            let config = {
                headers: {
                    'Content-Type':'multipart/form-data',
                    'Accept':'application/json'
                }
            };

            axios.post(this.urlBase,formData,config)
            .then(response=>{
                this.transacaoStatus = 'Adicionado';
                this.transacaoDetalhes = response;
                console.log(response);
            })
            .catch(errors =>{
                this.transacaoStatus = 'Erro';
                this.transacaoDetalhes = errors.response;
                console.log(errors);
            });
        }
    }
}
</script>
