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
            publicaciones: [],

        }),
        methods:{
            getData(){
                callHttp('/tienda/get/',{}).then(response=>{
                    this.publicaciones=response.data;
                });
            }
        },
        mounted() {
            this.getData();
        }
    }
</script>

<style scoped>

</style>