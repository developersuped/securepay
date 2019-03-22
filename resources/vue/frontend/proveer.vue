<template>
    <b-row>
        <b-col>
            <b-card>
                <b-form-group
                        id="producto"
                        label="Producto"
                        label-for="producto"
                >
                    <b-form-select v-model="producto" :options="options" />
                </b-form-group>

                <b-button variant="success" @click="guardar()">Guardar</b-button>
            </b-card>
        </b-col>
        <b-col>
           <b-card>
               <b-table :items="items" :fields="fields">
               </b-table>
           </b-card>
        </b-col>
    </b-row>
</template>

<script>
    export default {
        name: "proveer",
        data:()=>({
            items:[],
            producto:null,
            options:[],
            fields:['correlativo', 'producto', 'descripcion', 'categoria']
        }),
        methods:{
            getData(){
                callHttp('/proveer/get', {}).then(response=>{
                    this.items=response.data;
                    this.options=response.productos;
                });
            },
            guardar(){
                callHttp('proveer/guardar', {
                    producto: this.producto
                }).then(response=>{
                    this.getData();
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