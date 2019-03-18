<template>
    <b-row align-self="center" class="h-100">
        <b-col cols="10">
            <b-list-group>
                <b-list-group-item v-for="item in data" :key="item.id" class="mb-1">
                    <elementcard :item="item"></elementcard>
                </b-list-group-item>
            </b-list-group>
        </b-col>
        <b-col cols="2" class="pt-lg-5">
            <h3>Total</h3>
            <h1>$100</h1>
            <b-button block variant="primary">Pagar</b-button>
        </b-col>
    </b-row>
</template>

<script>
    import Elementcard from "./elementcard";
    export default {
        name: "carrito",
        components: {Elementcard},
        data:()=>({
            data:[
                {di:1,
                    img: 'http://www.astursantina.es/files/img/productos/tomates.jpg', info: {
                    nombre: 'tomate', descripcion:'un alimento'
                    }, opc:{
                    eliminar: 'eliminar', guardar: 'guardar'
                    },precio: 100},
                {id:2,
                    img: 'http://www.astursantina.es/files/img/productos/tomates.jpg', info: {
                    nombre: 'tomate', descripcion:'un alimento'
                    }, opc:{
                    eliminar: 'eliminar', guardar: 'guardar'
                    },precio: 100},
            ]
        }),

    }
</script>

<style scoped>

</style>