<template>
    <b-card>
        <b-card-header class="text-center">
           <b-row>
               <b-col>
                   <b-img center :src="avatar" alt="Center image" style="width:125px;" rounded="circle"/>
               </b-col>
               <b-col>
                   <b-form-group
                           label="Imagen: "
                           label-for="image">
                       <b-form-file
                               v-model="image"
                               placeholder="Seleccione Imagen..."/>
                   </b-form-group>
                   <b-button variant="primary" @click="subirFoto()">Guardar Imagen</b-button>
               </b-col>
           </b-row>
        </b-card-header>
        <b-card-body>
            <b-form >
                <b-row>
                    <b-col>
                        <b-form-group
                                label="Nombre: "
                                label-for="name">
                            <b-form-input
                                    id="name"
                                    type="text"
                                    v-model="name" :disabled="!edit"/>
                        </b-form-group>
                    </b-col>
                    <b-col>
                        <b-form-group
                                label="Apellido: "
                                label-for="apellido">
                            <b-form-input
                                    id="apellido"
                                    type="text"
                                    v-model="lastname" :disabled="!edit"/>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col>
                        <b-form-group
                                label="Correo: "
                                label-for="email">
                            <b-form-input
                                    id="email"
                                    type="email"
                                    v-model="email" :disabled="!edit"/>
                        </b-form-group>
                    </b-col>
                    <b-col>
                        <b-form-group
                                label="direccion: "
                                label-for="direccion">
                            <b-form-input
                                    id="direccion"
                                    type="text"
                                    v-model="direccion" :disabled="!edit"/>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col>
                        <b-form-group
                                label="Edad: "
                                label-for="edad">
                            <b-form-input
                                    id="edad"
                                    type="number"
                                    v-model="edad" :disabled="!edit"/>
                        </b-form-group>
                    </b-col>
                    <b-col>
                        <b-form-group
                                label="Dui: "
                                label-for="dui">
                            <b-form-input
                                    id="dui"
                                    type="text"
                                    v-model="dui" :disabled="!edit"/>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col>
                        <b-form-group
                                label="Telefono: "
                                label-for="telefono">
                            <b-form-input
                                    id="telefono"
                                    type="number"
                                    v-model="telefono" :disabled="!edit"/>
                        </b-form-group>
                    </b-col>
                    <b-col>

                    </b-col>
                </b-row>
            </b-form>
        </b-card-body>
        <b-card-footer>
            <span v-if="edit==false">
                <b-button variant="dark" @click="editar()">Editar</b-button>
            </span>
            <span v-else>
                <b-button variant="primary">Guardar</b-button>
            </span>
        </b-card-footer>
    </b-card>
</template>

<script>
    export default {
        name: "perfil",
        data:()=>({
            edit:false,
            name:null,
            lastname:null,
            email:null,
            image: null,
            direccion:null,
            edad: null,
            dui: null,
            telefono: null,
            mainProps: { blank: true, blankColor: '#777', width: 75, height: 75, class: 'm1' },
            avatar:null,
        }),
        methods:{
            getData(){
                this.avatar='/admin/user/avatar/get/';
              callHttp('/perfil',{}).then(response=>{
                  this.name=response.data.name;
                  this.lastname=response.data.lastname;
                  this.email=response.data.email;
                  this.avatar+=response.data.image;
                  this.direccion=response.data.direccion;
                  this.edad=response.data.edad;
                  this.dui=response.data.dui;
                  this.telefono=response.data.telefono;
              });
            },
            editar(){
                this.edit=true;
            },
            subirFoto(){
               if(this.image!==null){
                   var formData = new FormData();
                   //var imagefile = document.querySelector('#file');
                   formData.append("avatar", this.image);
                   axios.post('/admin/user/avatar', formData, {
                       headers: {
                           'Content-Type': 'multipart/form-data'
                       }
                   }).then(response=>{
                       this.getData();
                   });
               }
            }
        },
        mounted() {
            this.getData();
        }
    }
</script>

<style scoped>

</style>