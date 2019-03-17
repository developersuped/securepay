<template>
    <div class="app">
        <b-navbar type="info"  variant="light">
            <b-navbar-brand  href="#">
                <img class="navbar-brand-full" src="../../img/brand/logo.svg" width="89" height="25" alt="CoreUI Logo">
                <img class="navbar-brand-minimized" src="../../img/brand/sygnet.svg" width="30" height="30"
            </b-navbar-brand>
            <b-navbar-nav>
                <b-nav-item href="#" class="text-body">Home</b-nav-item>
                <b-nav-item href="#" class="text-body">Tienda</b-nav-item>
                <b-nav-item href="#">Categoria</b-nav-item>
                <b-nav-item href="#">Sobre Nosotros</b-nav-item>
            </b-navbar-nav>

            <b-navbar-nav class="ml-auto">
                <b-nav-item><i class="fa fa-cart-plus fa-lg " @click="prueba"></i></b-nav-item>
                <b-nav-item-dropdown text="Lang" right>
                    <b-dropdown-item href="#">Perfil</b-dropdown-item>
                    <b-dropdown-item href="#">Salir</b-dropdown-item>
                </b-nav-item-dropdown>
            </b-navbar-nav>
        </b-navbar>
        <div class="app-body">
            <main class="main">
                <b-container class="bv-example-row">
                    <div style="margin-top:15px;">
                        <router-view ref="rutas"></router-view>
                    </div>
                </b-container>
            </main>
        </div>
    </div>
</template>

<script>
    export default {
        name: "pagina"
    }
</script>

<style scoped>

</style>