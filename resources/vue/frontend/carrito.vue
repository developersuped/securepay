<template>
    <b-row align-self="center" class="h-100">
        <b-col cols="10">
            <b-list-group>
                <b-list-group-item v-for="item in data" :key="item.codigo" class="mb-1">
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
            data:[]
        }),
        methods:{
            getData(){
                callHttp('/car/get/',{}).then(response=>{
                    this.data=response.data;
                });
            }
        },
        mounted() {
            this.getData();
        }
    }
</script>

<style scoped>

</style>