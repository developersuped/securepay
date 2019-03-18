<template>
    <div>
        <b-card>
            <b-card-header>
                <b-button variant="primary" size="sm" v-b-modal.new>Nuevo</b-button>
            </b-card-header>
            <b-card-body>
                <b-table :items="productos" :fields="fields" :small="sm" responsive>
                    <template slot="opciones" slot-scope="row">
                        <b-button-group>
                            <b-button size="sm" variant="warning" @click="editar(row.item)">Editar</b-button>
                            <b-button size="sm" variant="danger" @click="eliminar(row.item)">Eliminar</b-button>
                        </b-button-group>
                    </template>
                </b-table>
            </b-card-body>
        </b-card>
        <b-modal id="new" title="Registrar Producto" ref="editProducto" @ok="guardar">
            <b-row>

                <b-col>
                    <b-form-group
                            label="Correlativo"
                            label-for="correlativo">
                        <b-form-input id="correlativo" v-model="correlativo" type="text"></b-form-input>
                    </b-form-group>
                </b-col>
                <b-col>
                    <b-form-group
                            label="Nombre"
                            label-for="nombre">
                        <b-form-input id="nombre" v-model="nombre" type="text"></b-form-input>
                    </b-form-group>
                </b-col>
            </b-row>
            <b-row>
                <b-col>
                    <b-form-group
                            label="Descripcion"
                            label-for="descricion">
                        <b-form-input id="descricion" v-model="descricion" type="text"></b-form-input>
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
        </b-modal>

    </div>
</template>

<script>
    export default {
        name: "producto",
        data: () => ({
            sm: true,
            productos: [],
            fields: ['codigo', 'correlativo', 'nombre', 'descripcion', 'categoria',  'opciones'],
            proveedores: [],
            categorias: [],
            /*****************/
            codigo:null,
            correlativo: null,
            descricion:null,
            nombre: null,
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
                callHttp('/producto/guadar/', {
                    codigo:this.codigo,
                    correlativo:this.correlativo,
                    nombre: this.nombre,
                    descricion:this.descricion,
                    categoria: this.categoria,
                }).then(response=>{
                    this.getData();
                    console.log(response);
                });
            },
            editar(row){
                this.codigo=row.codigo;
                this.correlativo=row.correlativo;
                this.nombre=row.nombre;
                this.descricion=row.descripcion;
                this.categoria=row.categoria_ref;
                this.$refs.editProducto.show()
            },
            eliminar(row){
                callHttp('/producto/eliminar/', {
                  codigo: row.codigo
                }).then(()=>{
                    this.getProductos();
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