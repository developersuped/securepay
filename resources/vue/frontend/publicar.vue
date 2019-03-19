<template>
    <b-row>
        <b-col>
            <b-form-group label="Imagenes:">
            <b-form-file
                    v-model="file"
                    :state="Boolean(file)"
                    placeholder="Bucar Imagenes"
                    drop-placeholder="Drop file here..."
                    :multiple="multi"
                    accept="image/*"
                    :change="img()"
            />
            </b-form-group>

            <b-form-group label="Titulo:" label-for="titulo">
                <b-form-input
                        id="titulo"
                        type="text"
                        v-model="form.titulo"
                        required
                        placeholder="Titulo" />
            </b-form-group>
            <b-form-group  label="Descripcion:" label-for="descipcion">
                <b-form-input
                        id="descipcion"
                        type="text"
                        v-model="form.descripcion"
                        required
                        placeholder="Descripcion" />
            </b-form-group>
            <b-form-group  label="Producto:" label-for="producto">
                <b-form-select id="producto" v-model="form.producto" :options="productos" />
            </b-form-group>
            <b-form-group  label="Cantidad:" label-for="cantidad">
                <b-form-input
                        id="cantidad"
                        type="number"
                        v-model="form.cantidad"
                        required
                        placeholder="Cantidad" />
            </b-form-group>
            <b-form-group  label="Precio:" label-for="precio">
                <b-form-input
                        id="precio"
                        type="number"
                        v-model="form.precio"
                        required
                        placeholder="Precio" />
            </b-form-group>
        </b-col>
        <b-col>
            <b-card class="p-1 ml-2 mb-2"
                    border-variant="primary">
                <b-card-header class="pl-1">
                    <b-row>
                        <b-col cols="6">
                            <span>Roberto Reyes</span>
                        </b-col>
                        <b-col cols="6" class="pr-0">
                            <!--<span>Agregar <i class="fa fa-cart-plus fa-lg "></i></span>-->
                        </b-col>
                    </b-row>
                </b-card-header>
                <b-card-body>
                        <carousel :data="data"></carousel>
                </b-card-body>
                <b-card-footer footer-bg-variant="success">
                    <h3> {{form.titulo}}</h3>
                    <b-row>
                        <b-col>
                            {{form.descripcion}}
                        </b-col>
                        <b-col class="text-rigth mt-2">
                            Cantidad: {{form.cantidad}}<br>
                            Precio: $ {{form.precio}}
                        </b-col>
                    </b-row>

                </b-card-footer>
            </b-card>
        </b-col>
    </b-row>
</template>

<script>
    export default {
        name: "publicar",
        data:()=>({
            file:[],
            productos:[{value: 1, text: 'tomates'}],
            multi:true,
            data:[],
            form:{
                titulo:null,
                descripcion:null,
                precio: null,
                producto:null,
                cantidad:null
            }
        }),
        methods:{
            img(){
                this.file.forEach(elemento=>{
                    this.data.push( '<div class="example-slide">Slide 1</div>');
                });
            }
        },
    }
</script>

<style scoped>

</style>