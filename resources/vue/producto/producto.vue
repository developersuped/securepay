<template>
    <div>
        <b-card>
            <b-card-header>
                <b-button variant="primary" size="sm" v-b-modal.new>Nuevo</b-button>
            </b-card-header>
            <b-card-body>
                <b-table :items="productos" :fields="fields" :small="sm">
                    <template slot="opciones" slot-scope="row">
                        <b-button-group>
                            <b-button size="sm" variant="warning">Editar</b-button>
                            <b-button size="sm" variant="danger">Desactivar</b-button>
                        </b-button-group>
                    </template>
                </b-table>
            </b-card-body>
        </b-card>
        <b-modal id="new" title="Registrar Producto" @ok="guardar">
            <b-row>

                <b-col>
                    <b-form-group
                            label="Correlativo"
                            label-for="correlativo">
                        <b-form-input id="correlativo" type="text"></b-form-input>
                    </b-form-group>
                </b-col>
                <b-col>
                    <b-form-group
                            label="Nombre"
                            label-for="nombre">
                        <b-form-input id="nombre" type="text"></b-form-input>
                    </b-form-group>
                </b-col>
            </b-row>
            <b-row>
                <b-col>
                    <b-form-group
                            label="Descripcion"
                            label-for="descricion">
                        <b-form-input id="descricion" type="text"></b-form-input>
                    </b-form-group>
                </b-col>
                <b-col>
                    <b-form-group
                            label="Categoria"
                            label-for="categoria">
                        <b-form-select id="categoria" v-model="categoria" :options="categorias"/>
                    </b-form-group>
                </b-col>
            </b-row>
            <b-row>
                <b-col>
                    <b-form-group
                            label="Precio Minimo"
                            label-for="precio">
                        <b-form-input id="precio" type="number"></b-form-input>
                    </b-form-group>
                </b-col>
                <b-col>
                    <b-form-group
                            label="Proveedor"
                            label-for="proveedor">
                        <b-form-select id="proveedor" v-model="proveedor" :options="proveedores"/>
                    </b-form-group>
                </b-col>
            </b-row>


        </b-modal>

    </div>
</template>

<script>
    export default {
        name: "producto",
        data: () => ({
            sm: true,
            productos: [],
            fields: ['codigo', 'correlativo', 'producto', 'descripcion', 'categoria', 'precio_min', 'existencia', 'proveedor', 'opciones'],
            proveedores: [],
            categorias: [],
            /*****************/
            codigo:null,
            correlativo: null,
            producto: null,
            descripcion: null,
            categoria: null,
            precio:null,
            proveedor:null,
        }),
        methods: {
            getProductos() {
                callHttp('/producto/get/', {}).then(response => {
                    this.productos = response.data;
                });
            },
            getData() {
                callHttp('/producto/getData/', {}).then(response => {
                    this.proveedores=response.proveedores;
                    this.categorias=response.categorias;
                });
            },
            guardar(){
                callHttp('/producto/guadar/',{

                }).then(response=>{
                    this.getData();
                    console.log(response);
                });
            }
        },
        mounted() {
            this.getProductos();
            this.getData();
        }
    }
</script>

<style scoped>

</style>