<template>
    <div class="app">
        <AppHeader fixed>
            <SidebarToggler class="d-lg-none" display="md" mobile/>
                <b-link class="navbar-brand" to="#">
                    <img class="navbar-brand-full" src="../../img/brand/agroweb.jpeg" width="100" height="35" alt="CoreUI Logo">
                    <img class="navbar-brand-minimized" src="/resources/img/brand/agroweb.jpeg" width="30" height="30"
                         alt="CoreUI Logo">
                </b-link>

                <SidebarToggler v-if="rol!==3 && rol!==4" class="d-md-down-none" display="lg"/>

                <b-navbar-nav class="d-md-down-none" v-if="rol===3 || rol===4">
                    <b-nav-item class="px-3" to="/">Inicio</b-nav-item>
                    <b-nav-item class="px-3" to="/tienda" exact>Tienda</b-nav-item>
                    <b-nav-item class="px-3" to="/categorias" exact>Categorias</b-nav-item>
                    <b-nav-item class="px-3" to="/publicar" exact v-if="rol===4">Publicar</b-nav-item>
                    <b-nav-item class="px-3" to="/nosotros" exact>Quienes Somos</b-nav-item>
                </b-navbar-nav>

            <b-navbar-nav class="ml-auto">
                <b-row align-v="center" class="mr-3">
                    <b-col cols="5">
                        <b-nav-item @click="carrito()" class="mr-2">Carrito<i class="fa fa-cart-plus fa-lg " ></i></b-nav-item>
                    </b-col>
                    <b-col cols="6" class="pl-0 pr-0">
                        <b-nav-item-dropdown right>
                            <template slot="button-content">
                        <span class="ml-2 mr-2">
                            <b-img center src="/admin/user/avatar/get/1552964808it.jpg" style="width: 35px; float: left;"
                                   alt="Center image" rounded="circle"/>
                        </span>
                                <em>{{user}}   </em>
                            </template>
                            <b-dropdown-item @click="verperfil()">Perfil</b-dropdown-item>
                            <b-dropdown-item @click="porveer()" v-if="rol===4">Proveer</b-dropdown-item>
                            <b-dropdown-item @click="salir">Salir</b-dropdown-item>
                        </b-nav-item-dropdown>
                    </b-col>
                </b-row>
            </b-navbar-nav>
        </AppHeader>
        <div class="app-body">
             <span v-if="rol===2 || rol===1">
                <AppSidebar fixed>
                    <SidebarHeader/>
                    <SidebarForm/>
                    <SidebarNav :navItems="nav"></SidebarNav>
                    <SidebarFooter/>
                    <SidebarMinimizer/>
                </AppSidebar>
             </span>
            <main class="main">
                <b-container :fluid="fuild" style="height: calc(100% - 55px);">
                    <div style="margin-top:15px;" class="h-100">
                        <router-view ref="rutas"></router-view>
                    </div>
                </b-container>
            </main>
        </div>
        <TheFooter>
            <div>
                <a href="https://coreui.io">Uped</a>
                <span class="ml-1">&copy;2019</span>
            </div>
            <div class="ml-auto">
                <span class="mr-1">Developers Uped</span>
                <a href="https://coreui.io">Uped</a>
            </div>
        </TheFooter>
    </div>
</template>

<script>
    import {
        Header as AppHeader,
        SidebarToggler,
        Sidebar as AppSidebar,
        SidebarFooter,
        SidebarForm,
        SidebarHeader,
        SidebarMinimizer,
        SidebarNav,
        Aside as AppAside,
        AsideToggler,
        Footer as TheFooter,
    } from '@coreui/vue'
    import DefaultAside from './DefaultAside'

    export default {
        name: 'encabezado',
        components: {
            DefaultAside,
            AsideToggler,
            AppHeader,
            AppSidebar,
            AppAside,
            TheFooter,
            SidebarForm,
            SidebarFooter,
            SidebarToggler,
            SidebarHeader,
            SidebarNav,
            SidebarMinimizer
        },
        props: {
            nav: {},
            user: '',
            rol:null,
            avatar:null
        },
        data: () => ({
            fuild:true,
            imagen:null
        }),
        methods: {
            salir() {
                callHttp('/logout', {}).then(response=>{
                });
                window.location.replace("/");
            },
            verperfil() {
                this.$router.push('perfil');
            },
            carrito(){
                this.$router.push("carrito");
            },
            porveer(){
                this.$router.push("proveer");
            },
            getAvatar(){
                axios.get('/admin/user/avatar/get/1552964808it.jpg').then(response=>{
                    this.imagen=response.data;
                    //console.log(this.imagen);
                });
            }
        },
        mounted() {
            console.log(this.rol);
            if(this.rol===3 || this.rol===4){
                this.fuild=false;
            }

            this.getAvatar();
        }
    }
</script>
