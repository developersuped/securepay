<template>
    <div>
        <b-card>
            <b-card-body>
                <b-table striped hover :items="users" :fields="fields">
                    <template slot="opc" slot-scope="row">
                        <b-button-group size="sm">
                            <b-button variant="warning" @click="editar(row.item)">Editar</b-button>
                            <b-button variant="danger" @click="desactivar(row.item)" v-if="row.item.estado===1">Desactivar</b-button>
                            <b-button variant="primary" @click="desactivar(row.item)" v-else>Activar</b-button>
                        </b-button-group>
                    </template>
                </b-table>
            </b-card-body>
        </b-card>

        <b-modal id="user" size="lg" ref="usuarioedit" title="Registrar Usuario" @ok="guardar">
            <b-row>
                <b-col>
                    <b-form-group
                            label="Nombre">
                        <b-form-input type="text" v-model="usuario.nombre"></b-form-input>
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
                        <b-form-input type="email" v-model="usuario.email"></b-form-input>
                    </b-form-group>
                </b-col>
                <b-col>
                    <b-form-group
                            label="Direccion">
                        <b-form-input type="text" v-model="usuario.direccion"></b-form-input>
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
                        <b-form-input type="text" v-model="usuario.dui"></b-form-input>
                    </b-form-group>
                </b-col>
            </b-row>
            <b-row>
                <b-col cols="6">
                    <b-form-group
                            label="Rol">
                        <b-form-select v-model="usuario.rol" :options="roles"/>
                    </b-form-group>
                </b-col>
                <b-col cols="6">
                </b-col>
            </b-row>

        </b-modal>
    </div>
</template>

<script>
    export default {
        name: "usuarios",
        data: () => ({
            fields: ['codigo', 'name', 'lastname', 'email', 'direccion', 'edad', 'dui', 'rol', 'opc'],
            users: [],
            roles: [],
            usuario: {
                codigo: null,
                nombre: null,
                apellido: null,
                email: null,
                direccion: null,
                edad: null,
                dui: null,
                rol: null,
                password: null
            }
        }),
        methods: {
            getUsers() {
                callHttp('/admin/getuser/', {}).then(response => {
                    this.users = response.data;
                })
            },
            getData() {
                callHttp('/admin/data/user', {}).then(response => {
                    this.roles = response.roles;
                });
            },
            editar(elemento) {
                this.usuario.codigo     = elemento.codigo;
                this.usuario.nombre     = elemento.name;
                this.usuario.apellido   = elemento.lastname;
                this.usuario.email      = elemento.email;
                this.usuario.direccion  = elemento.direccion;
                this.usuario.edad       = elemento.edad;
                this.usuario.dui       = elemento.dui;
                this.usuario.rol        = elemento.rol_ref;
                this.$refs.usuarioedit.show()
            },
            guardar() {
                callHttp('/admin/user/edit/', {
                    codigo:this.usuario.codigo,
                    name: this.usuario.nombre,
                    lastname: this.usuario.apellido,
                    email: this.usuario.email,
                    direccion: this.usuario.direccion,
                    edad: this.usuario.edad,
                    dui: this.usuario.edad,
                    rol: this.usuario.rol,
                    password: this.usuario.password
                }).then(response => {
                    console.log(response);
                    this.getUsers();
                });
            },
            desactivar(elemento){
                callHttp('/admin/user/desactivar/', {
                    codigo:elemento.codigo
                }).then(response=>{
                    console.log(response);
                    this.getUsers();
                });
                console.log(elemento);
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