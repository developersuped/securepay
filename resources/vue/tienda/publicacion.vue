<template>
    <b-card class="p-1 ml-2 mb-2"
            border-variant="primary"
            style="max-width: 16rem; float:left;">
        <b-card-header class="pl-1">
            <b-row>
                <b-col cols="6">
                    <span>{{publicaciones.usuario}}</span>
                </b-col>
                <b-col cols="6" class="pr-0">
                    <span @click="agregar(publicaciones.publicacion)">Agregar <i class="fa fa-cart-plus fa-lg "></i></span>
                </b-col>
            </b-row>
        </b-card-header>
        <b-card-body class='p-1'>
            <carousel :data="data" :controls="true"></carousel>
        </b-card-body>
        <b-card-footer footer-bg-variant="success">
            <h3> {{publicaciones.titulo}}</h3>
            {{publicaciones.detalle}}
            Cantidad{{publicaciones.cantidad}}
            ${{publicaciones.precio_venta}}
        </b-card-footer>
    </b-card>
</template>

<script>
    export default {
        name: "publicacion",
        props:{
            publicaciones:{}
        },
        data:()=>({
            data: [
                '<div class="example-slide"><b-img src="http://www.astursantina.es/files/img/productos/tomates.jpg"></b-img></div>',
                '<div class="example-slide"><b-img src="https://2.bp.blogspot.com/-UciomiSJjh8/XAVcNrnTvUI/AAAAAAAAARo/hlAP2q75B5U_w6AExeWNjYu29zB7cohtACLcBGAs/s200/7-%2Botros%2Bfrutos%2B%252811%2529.jpg"></b-img></div>',
                '<div class="example-slide"><b-img src="https://www.ppfam.com/files/445-28484-imagen/tomates%20cherry.png"></b-img></div>',
            ],
        }),
        methods:{
            agregar(row){
                callHttp('/car/add/', {
                    publicacion: row
                });
            }
        }
    }
</script>

<style scoped>

</style>