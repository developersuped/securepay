<template>
    <div>
        <b-row>
            <b-col>
                <b-card>
                    <b-card-header>
                        <b-button variant="primary" v-b-modal.addCategoria>Nuevo</b-button>
                    </b-card-header>
                    <b-card-body>
                        <b-table :items="items" striped hover :small="sm" :fields="fields">
                            <template slot="opciones" slot-scope="row">
                                <b-button-group size="sm">
                                    <b-button variant="warning" @click="editar(row.item)">Editar</b-button>
                                    <b-button variant="dark" @click="eliminar(row.item)">Eliminar</b-button>
                                </b-button-group>
                            </template>
                        </b-table>
                    </b-card-body>
                </b-card>
            </b-col>
            <b-col>
                <b-card>
                    <b-card-header>
                        <b-button variant="primary" v-b-modal.addCategoria>Nuevo</b-button>
                    </b-card-header>
                    <b-card-body>
                        <b-table :items="items" striped hover :small="sm" :fields="fields">
                            <template slot="opciones" slot-scope="row">
                                <b-button-group size="sm">
                                    <b-button variant="warning" @click="editar(row.item)">Editar</b-button>
                                    <b-button variant="dark" @click="eliminar(row.item)">Eliminar</b-button>
                                </b-button-group>
                            </template>
                        </b-table>
                    </b-card-body>
                </b-card>
            </b-col>
        </b-row>


        <b-modal id="addCategoria" ref="addCategoria" title="Registrar Proveedor" @ok="guardar()">
            <b-form-group
                    label="Nombre"
                    label-for="nombre">
                <b-form-input id="nombre" type="text" v-model="nombre"></b-form-input>
            </b-form-group>
            <b-form-group
                    label="Direccion"
                    label-for="direccion">
                <b-form-input id="direccion" type="text" v-model="descripcion"></b-form-input>
            </b-form-group>
        </b-modal>
    </div>
</template>

<script>
    export default {
        name: "categorias",
        data: () => ({
            sm: true,
            items: [],
            fields: ['nombre', 'descripcion', 'opciones'],
            codigo: null,
            nombre: null,
            descripcion: null
        }),
        methods: {
            getData() {
                callHttp('/categoria/get/', {}).then(response => {
                    this.items = response.data;
                });
            },
            guardar() {
                callHttp('/categoria/guardar/', {
                    codigo:this.codigo,
                    nombre: this.nombre,
                    descripcion: this.descripcion
                }).then(response => {
                    console.log(response);
                    this.getData();
                })
            },
            editar(row) {
                this.codigo = row.codigo;
                this.nombre = row.nombre;
                this.descripcion = row.descripcion;
                this.$refs.addCategoria.show()
            },
            eliminar(row) {
                callHttp('/categoria/eliminar/', {
                    codigo: row.codigo
                }).then(response => {
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