<template>

    <b-row align-self="center" class="h-100">
        <b-col cols="10">
            <b-list-group>
                <b-list-group-item>
                    <b-row align-v="center">
                        <b-col cols="2">
                            <b-img style="width: 100px;" thumbnail fluid :src="img[0].img" alt="Image 1" />
                        </b-col>
                        <b-col cols="6">
                            <h6>{{img[0].info.nombre}}</h6>
                            <p class="text-muted">{{img[0].info.descripcion}}</p>
                        </b-col>
                        <b-col cols="2">
                            <b-link href="#">{{img[0].opc.eliminar}}</b-link>
                            <br>
                            <b-link href="#">{{img[0].opc.guardar}}</b-link>
                        </b-col>
                        <b-col cols="2">
                            ${{img[0].precio}}
                        </b-col>
                    </b-row>
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
    export default {
        name: "carrito",
        data:()=>({
            img:[
                {img: 'http://www.astursantina.es/files/img/productos/tomates.jpg', info: {
                    nombre: 'tomate', descripcion:'un alimento'
                    }, opc:{
                    eliminar: 'eliminar', guardar: 'guardar'
                    },precio: 100}
                ]
        })
    }
</script>

<style scoped>

</style>