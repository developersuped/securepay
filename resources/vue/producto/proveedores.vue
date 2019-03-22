<template>
    <div>
        <b-card>
            <b-card-header>
                <b-button variant="primary" v-b-modal.addPorveedor>Nuevo</b-button>
            </b-card-header>
            <b-card-body>
                <b-table :items="items" striped hover small="true" :fields="fields">
                    <template slot="opciones" slot-scope="row">
                        <b-button-group size="sm">
                            <b-button variant="dark" @click="eliminar(row.item)">Eliminar</b-button>
                        </b-button-group>
                    </template>
                </b-table>
            </b-card-body>
        </b-card>
    </div>

</template>

<script>
    export default {
        name: "proveedores",
        data: () => ({
            items: [],
            fields: ['codigo', 'name', 'email', 'direccion', 'telefono', 'dui', 'opciones'],
            codigo:null,
            nombre: null,
            nit: null,
            direccion: null,
            telefono: null,
        }),
        methods: {
            getData() {
                callHttp('/proveedor/get/', {}).then(response => {
                    this.items = response.data;
                });
            },
            eliminar(row){
                callHttp('/proveedor/eliminar/',{
                    codigo:row.codigo
                }).then(response=>{
                    console.log(response);
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