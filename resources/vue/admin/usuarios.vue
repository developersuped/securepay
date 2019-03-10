<template>
   <div>
       <b-card>
           <b-card-header>
               <b-button size="sm" variant="primary" v-b-modal.user>Nuevo</b-button>
           </b-card-header>
           <b-card-body>
               <b-table striped hover :items="users" :fields="fields">
                   <template slot="opc" slot-scope="row">
                       <b-button-group size="sm">
                           <b-button variant="warning">Editar</b-button>
                           <b-button variant="dark">Desactivar</b-button>
                       </b-button-group>
                   </template>
               </b-table>
           </b-card-body>
       </b-card>

       <b-modal id="user" title="BootstrapVue">
           <b-form-group
            label="Nombre">
               <b-form-input type="text"></b-form-input>
           </b-form-group>
           <b-form-group
            label="Apellido">
               <b-form-input type="text"></b-form-input>
           </b-form-group>
           <b-form-group
            label="email">
               <b-form-input type="email"></b-form-input>
           </b-form-group>
           <b-form-group
            label="Direccion">
               <b-form-input type="text"></b-form-input>
           </b-form-group>
           <b-form-group
            label="Edad">
               <b-form-input type="text"></b-form-input>
           </b-form-group>
           <b-form-group
            label="Dui">
               <b-form-input type="text"></b-form-input>
           </b-form-group>
           <b-form-group
            label="Rol">
               <b-form-input type="text"></b-form-input>
           </b-form-group>
       </b-modal>
   </div>
</template>

<script>
    export default {
        name: "usuarios",
        data:()=>({
            fields:['codigo', 'name', 'lastname', 'email', 'direccion', 'edad', 'dui', 'rol', 'opc'],
            users:[]
        }),
        methods:{
            getUsers(){
                callHttp('/admin/getuser/',{}).then(response=>{
                    this.users=response.data;
                })
            }
        },
        mounted() {
            this.getUsers();
        }
    }
</script>

<style scoped>

</style>