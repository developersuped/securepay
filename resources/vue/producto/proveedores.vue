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
                            <b-button variant="warning" @click="editar(row.item)">Editar</b-button>
                            <b-button variant="dark" @click="eliminar(row.item)">Eliminar</b-button>
                        </b-button-group>
                    </template>
                </b-table>
            </b-card-body>
        </b-card>

        <b-modal id="addPorveedor" ref="addPorveedor" title="Registrar Proveedor" @ok="guardar()">
            <b-form-group
                    label="Nombre"
                    label-for="nombre">
                <b-form-input id="nombre" type="text" v-model="nombre"></b-form-input>
            </b-form-group>

            <b-form-group
                    label="Nit"
                    label-for="nit">
                <b-form-input id="nit" type="text" v-model="nit"></b-form-input>
            </b-form-group>
            <b-form-group
                    label="Direccion"
                    label-for="direccion">
                <b-form-input id="direccion" type="text" v-model="direccion"></b-form-input>
            </b-form-group>
            <b-form-group
                    label="Telefono"
                    label-for="telefono">
                <b-form-input id="telefono" type="text" v-model="telefono"></b-form-input>
            </b-form-group>
            <b-form-group
                    label="Representate"
                    label-for="representante">
                <b-form-input id="representante" type="text" v-model="representante"></b-form-input>
            </b-form-group>
        </b-modal>
    </div>

</template>

<script>
    export default {
        name: "proveedores",
        data: () => ({
            items: [],
            fields: ['nombre', 'nit', 'direccion', 'telefono', 'representante', 'opciones'],
            codigo:null,
            nombre: null,
            nit: null,
            direccion: null,
            telefono: null,
            representante: null
        }),
        methods: {
            getData() {
                callHttp('/proveedor/get/', {}).then(response => {
                    this.items = response.data;
                });
            },
            guardar() {
                callHttp('/proveedor/guardar/', {
                    codigo:this.codigo,
                    nombre: this.nombre,
                    nit: this.nit,
                    direccion: this.direccion,
                    telefono: this.telefono,
                    representante: this.representante
                }).then(response => {
                    this.getData();
                    this.codigo=null;
                    this.nombre = null;
                    this.nit = null;
                    this.direccion = null;
                    this.telefono = null;
                    this.representante = null;
                })
            },
            editar(row) {
                this.codigo=row.codigo;
                this.nombre=row.nombre;
                this.nit=row.nit;
                this.direccion=row.direccion;
                this.telefono=row.telefono;
                this.representante=row.representante;
                this.$refs.addPorveedor.show();
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