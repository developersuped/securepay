<template>
    <div class="app">
        <AppHeader fixed>
            <SidebarToggler class="d-lg-none" display="md" mobile/>
                <b-link class="navbar-brand" to="#">
                    <img class="navbar-brand-full" src="../../img/brand/logo.svg" width="89" height="25" alt="CoreUI Logo">
                    <img class="navbar-brand-minimized" src="../../img/brand/sygnet.svg" width="30" height="30"
                     alt="CoreUI Logo">
                </b-link>

                <SidebarToggler v-if="rol!==3" class="d-md-down-none" display="lg"/>

                <b-navbar-nav class="d-md-down-none" v-if="rol==3">
                    <b-nav-item class="px-3" to="/">Inicio</b-nav-item>
                    <b-nav-item class="px-3" to="/tienda" exact>Tienda</b-nav-item>
                    <b-nav-item class="px-3" to="/categorias">Categorias</b-nav-item>
                </b-navbar-nav>

            <b-navbar-nav class="ml-auto">
                <b-nav-item @click="prueba" class="mr-2">Carrito<i class="fa fa-cart-plus fa-lg " ></i></b-nav-item>
                <b-nav-item-dropdown right>
                    <template slot="button-content">
                        <span class="ml-2">
                            <b-img center src="https://picsum.photos/125/125/?image=58" style="width: 35px; float: left;"
                                   alt="Center image" rounded="circle"/>
                        </span>
                        <em>{{user}}</em>
                    </template>
                    <b-dropdown-item href="#">Perfil</b-dropdown-item>
                    <b-dropdown-item @click="salir">Salir</b-dropdown-item>
                </b-nav-item-dropdown>
            </b-navbar-nav>
        </AppHeader>
        <div class="app-body">
             <span v-if="rol!==3">
                <AppSidebar fixed>
                    <SidebarHeader/>
                    <SidebarForm/>
                    <SidebarNav :navItems="nav"></SidebarNav>
                    <SidebarFooter/>
                    <SidebarMinimizer/>
                </AppSidebar>
             </span>
            <main class="main">
                <b-container :fluid="fuild">
                    <div style="margin-top:15px;">
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
            rol:null
        },
        data: () => ({
            fuild:true
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
            prueba(){
              alert("listo");
            }
        },
        mounted() {
            console.log(this.rol);
            if(this.rol==3){
                this.fuild=false;
            }
        }
    }
</script>
