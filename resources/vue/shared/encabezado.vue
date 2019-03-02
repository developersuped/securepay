<template>
    <div class="app">
        <AppHeader fixed>
            <SidebarToggler class="d-lg-none" display="md" mobile/>
            <b-link class="navbar-brand" to="#">
                <img class="navbar-brand-full" src="../../img/brand/logo.svg" width="89" height="25" alt="CoreUI Logo">
                <img class="navbar-brand-minimized" src="../../img/brand/sygnet.svg" width="30" height="30"
                     alt="CoreUI Logo">
            </b-link>
            <SidebarToggler class="d-md-down-none" display="lg"/>
            <b-navbar-nav class="ml-auto">

            </b-navbar-nav>
            <!--<span v-text="user.name"></span>-->
        </AppHeader>
        <div class="app-body">
            <AppSidebar fixed>
                <SidebarHeader/>
                <SidebarForm/>
                <SidebarNav :navItems="nav"></SidebarNav>
                <SidebarFooter/>
                <SidebarMinimizer/>
            </AppSidebar>
            <main class="main">
                <div class="container-fluid">
                    <div style="margin-top:15px;">
                        <!--<router-view ref="rutas"></router-view>-->
                        <h1>HOla mundo somos los reyes</h1>
                    </div>
                </div>
            </main>
        </div>
        <TheFooter>
            <div>
                <a href="https://coreui.io">IBW</a>
                <span class="ml-1">&copy;2018</span>
            </div>
            <div class="ml-auto">
                <span class="mr-1">Powered by</span>
                <a href="https://coreui.io">CoreUI for Vue</a>
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
            nav: {}
        },
        data() {
            //return {user}
        },
        computed: {
            /*name() {
                return this.$route.name
            }*/
        }
    }
</script>
