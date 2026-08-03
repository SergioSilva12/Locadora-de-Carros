<template>
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" v-for="titulo in titulos" :key="titulo">{{ titulo }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="m in dados" :key="m.id">
                    <th scope="row">{{m.id}}</th>
                    <td>{{m.nome}}</td>
                    <td>
                        <img v-if="m.imagem" :src="`/storage/${m.imagem}`" alt="Imagem da marca" class="img-fluid" style="max-width: 80px;">
                        <span v-else>Sem imagem</span>
                    </td>
                </tr>
            </tbody>
        </table>
       {{ dados }}
    </div>
</template>

<script>
export default {
    props:['dados','titulos'],
}
</script>
