<template>
    <b-row align-v="center" class="w-100">
        <b-col cols="2">
            {{item.name}}
        </b-col>
        <b-col cols="6">
            <h6>{{item.titulo}}</h6>
            <p class="text-muted">{{item.detalle}}</p>
        </b-col>
        <b-col cols="2">
            <b-link href="#">Eliminar</b-link>

        </b-col>
        <b-col cols="2">
            ${{item.precio_venta}}
        </b-col>
    </b-row>
</template>

<script>
    export default {
        name: "elementcard",
        props:{
            item:{}
        },
        mounted() {
            console.log(this.item);
        }
    }
</script>

<style scoped>

</style>