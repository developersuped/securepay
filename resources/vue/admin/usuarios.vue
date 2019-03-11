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

       <b-modal id="user" size="lg" title="Registrar Usuario" @ok="guardar">
           <b-row>
               <b-col>
                   <b-form-group
                           label="Nombre">
                       <b-form-input  type="text" v-model="usuario.nombre"></b-form-input>
                   </b-form-group>
               </b-col>
               <b-col>
                   <b-form-group
                           label="Apellido">
                       <b-form-input type="text" v-model="usuario.apellido"></b-form-input>
                   </b-form-group>
               </b-col>
           </b-row>
            <b-row>
                <b-col>
                    <b-form-group
                            label="email">
                        <b-form-input  type="email" v-model="usuario.email"></b-form-input>
                    </b-form-group>
                </b-col>
                <b-col>
                    <b-form-group
                            label="Direccion">
                        <b-form-input  type="text" v-model="usuario.direccion"></b-form-input>
                    </b-form-group>
                </b-col>
            </b-row>
           <b-row>
               <b-col>
                   <b-form-group
                           label="Edad">
                       <b-form-input type="number" v-model="usuario.edad"></b-form-input>
                   </b-form-group>
               </b-col>
               <b-col>
                   <b-form-group
                           label="Dui">
                       <b-form-input  type="text" v-model="usuario.dui"></b-form-input>
                   </b-form-group>
               </b-col>
           </b-row>
           <b-row>
               <b-col>
                   <b-form-group
                           label="Rol">
                       <b-form-select v-model="usuario.rol" :options="roles" />
                   </b-form-group>
               </b-col>
               <b-col>
                   <b-form-group
                           label="Contraseña">
                       <b-form-input type="password" v-model="usuario.password"></b-form-input>
                   </b-form-group>
               </b-col>
           </b-row>

       </b-modal>
   </div>
</template>

<script>
    export default {
        name: "usuarios",
        data:()=>({
            fields:['codigo', 'name', 'lastname', 'email', 'direccion', 'edad', 'dui', 'rol', 'opc'],
            users:[],
            roles:[],
            usuario:{
                codigo:null,
                nombre:null,
                apellido:null,
                email:null,
                direccion:null,
                edad:null,
                dui:null,
                rol:null,
                password:null
            }
        }),
        methods:{
            getUsers(){
                callHttp('/admin/getuser/',{}).then(response=>{
                    this.users=response.data;
                })
            },
            getData(){
                callHttp('/admin/data/user',{}).then(response=>{
                    this.roles=response.roles;
                });
            },
            guardar(){
                callHttp('/register/',{
                    name:this.usuario.nombre,
                    lastname:this.usuario.apellido,
                    email:this.usuario.email,
                    direccion:this.usuario.direccion,
                    edad:this.usuario.edad,
                    dui:this.usuario.edad,
                    rol:this.usuario.rol,
                    password: this.usuario.password
                }).then(response=>{
                    console.log(response);
                });
            }
        },
        mounted() {
            this.getUsers();
            this.getData();
        }
    }
</script>

<style scoped>

</style>