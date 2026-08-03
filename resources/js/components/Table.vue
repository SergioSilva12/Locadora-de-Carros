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
                    <td><img :src="`http://localhost:8000/storage/${m.imagem}`"></td>
                </tr>
            </tbody>
        </table>
       
    </div>
</template>

<script>
export default {
    props:['dados','titulos'],
}
</script>
