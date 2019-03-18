<template>
    <div>
        <span v-for="row in publicaciones">
            <publicacion :publicaciones="row"></publicacion>
        </span>
    </div>
</template>

<script>
    export default {
        name: "tienda",
        data: () => ({
            publicaciones: [
                {
                    usuario: 'Roberto',
                    producto: 'Tomates',
                    cantidad: 25,
                    precio: 100,
                    descipcion: 'Tomates de los grandes'
                },
                {
                    usuario: 'Roberto',
                    producto: 'Tomates',
                    cantidad: 25,
                    precio: 100,
                    descipcion: 'Tomates de los grandes'
                },
                {
                    usuario: 'Roberto',
                    producto: 'Tomates',
                    cantidad: 25,
                    precio: 100,
                    descipcion: 'Tomates de los grandes'
                },
                {
                    usuario: 'Roberto',
                    producto: 'Tomates',
                    cantidad: 25,
                    precio: 100,
                    descipcion: 'Tomates de los grandes'
                },
                {
                    usuario: 'Roberto',
                    producto: 'Tomates',
                    cantidad: 25,
                    precio: 100,
                    descipcion: 'Tomates de los grandes'
                }
            ],

        })
    }
</script>

<style scoped>

</style>