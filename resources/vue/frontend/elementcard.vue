<template>
    <b-row align-v="center">
        <b-col cols="2">
            <b-img style="width: 100px;" thumbnail fluid :src="item.img" alt="Image 1" />
        </b-col>
        <b-col cols="6">
            <h6>{{item.info.nombre}}</h6>
            <p class="text-muted">{{item.info.descripcion}}</p>
        </b-col>
        <b-col cols="2">
            <b-link href="#">{{item.opc.eliminar}}</b-link>
            <br>
            <b-link href="#">{{item.opc.guardar}}</b-link>
        </b-col>
        <b-col cols="2">
            ${{item.precio}}
        </b-col>
    </b-row>
</template>

<script>
    export default {
        name: "elementcard",
        props:{
            item:{}
        }
    }
</script>

<style scoped>

</style>