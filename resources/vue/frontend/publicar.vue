<template>
    <div>
        <b-form-file
                v-model="file"
                :state="Boolean(file)"
                placeholder="Bucar Imagenes"
                drop-placeholder="Drop file here..."
                :multiple="multi"
        />
    </div>
</template>

<script>
    export default {
        name: "publicar",
        data:()=>({
            file:[],
            multi:true
        })
    }
</script>

<style scoped>

</style>