<template>
    <div :class="estilo" role="alert">
        Marca adicionada com sucesso
    </div>

</template>

<script>
export default {
    props:['tipo'],
    computed:{
        estilo(){
            return 'alert alert-'+this.tipo;
        }
    }
}
</script>