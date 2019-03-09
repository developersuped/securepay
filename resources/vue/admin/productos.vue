<template>
   <div>
       <b-card>
           <b-card-header>
               <b-button variant="primary" striped hover size="sm" v-b-modal.new>Nuevo</b-button>
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
       <b-modal id="new" title="Registrar Producto">
           <b-form-group
                   label="Correlativo"
                   label-for="correlativo">
               <b-form-input id="correlativo" type="text"></b-form-input>
           </b-form-group>

           <b-form-group
            label="Nombre"
           label-for="nombre">
               <b-form-input id="nombre" type="text"></b-form-input>
           </b-form-group>
       </b-modal>

   </div>
</template>

<script>
    export default {
        name: "productos",
        data: () => ({
            sm:true,
            productos:[],
            fields:['codigo', 'correlativo', 'producto', 'descripcion', 'categoria', 'precio_min', 'existencia', 'proveedor', 'opciones']
        }),
        methods: {
            getProductos(){
                callHttp('/admin/productos', {}).then(response=>{
                    this.productos=response.data;
                });
            }
        },
        mounted() {
            this.getProductos();
        }
    }
</script>

<style scoped>

</style>