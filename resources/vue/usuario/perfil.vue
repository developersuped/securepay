<template>
    <b-card>
        <b-card-header class="text-center">
            <b-img center src="https://picsum.photos/125/125/?image=58" alt="Center image" rounded="circle"/>
        </b-card-header>
        <b-card-body>
            <b-form >
                <b-form-group
                        label="Nombre: "
                        label-for="name">
                    <b-form-input
                            id="name"
                            type="text"
                            v-model="name" :disabled="!edit"/>
                </b-form-group>
                <b-form-group
                        label="Correo: "
                        label-for="email">
                    <b-form-input
                            id="email"
                            type="email"
                            v-model="email" :disabled="!edit"/>
                </b-form-group>
                <b-form-group
                        label="Imagen: "
                        label-for="image">
                    <b-form-file
                            v-model="image"
                            :disabled="!edit"
                            placeholder="Seleccione Imagen..."/>
                </b-form-group>
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
            email:null,
            image: null,
            mainProps: { blank: true, blankColor: '#777', width: 75, height: 75, class: 'm1' }
        }),
        methods:{
            getData(){
              callHttp('/perfil',{}).then(response=>{
                  this.name=response.data.name;
                  this.email=response.data.email;
                  this.image=response.data.image;
              });
            },
            editar(){
                this.edit=true;
            }
        },
        mounted() {
            this.getData();
        }
    }
</script>

<style scoped>

</style>