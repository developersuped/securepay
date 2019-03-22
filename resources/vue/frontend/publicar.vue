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
                        placeholder="Titulo"/>
            </b-form-group>
            <b-form-group label="Descripcion:" label-for="descipcion">
                <b-form-input
                        id="descipcion"
                        type="text"
                        v-model="form.detalle"
                        required
                        placeholder="Descripcion"/>
            </b-form-group>
            <b-form-group label="Producto:" label-for="producto">
                <b-form-select id="producto" v-model="form.producto" :options="productos"/>
            </b-form-group>
            <b-form-group label="Cantidad:" label-for="cantidad">
                <b-form-input
                        id="cantidad"
                        type="number"
                        v-model="form.cantidad"
                        required
                        placeholder="Cantidad"/>
            </b-form-group>
            <b-form-group label="Precio:" label-for="precio">
                <b-form-input
                        id="precio"
                        type="number"
                        v-model="form.precio"
                        required
                        placeholder="Precio"/>
            </b-form-group>

            <b-button variant="primary" @click="registrar">Guardar</b-button>
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

                    <!--<b-img v-if="url" :src="url"></b-img>-->
                    <b-carousel
                            id="carousel1"
                            style="text-shadow: 1px 1px 2px #333;"
                            controls
                            indicators
                            img-width="100"
                            img-height="100"
                            background="#ababab"
                            :interval="4000"
                    >
                        <b-carousel-slide v-if="url1" :img-src="url1"
                        >
                        </b-carousel-slide>
                        <b-carousel-slide v-if="url2" :img-src="url2">
                        </b-carousel-slide>
                        <b-carousel-slide v-if="url3" :img-src="url3">
                        </b-carousel-slide>
                        <b-carousel-slide v-if="url4" :img-src="url4">
                        </b-carousel-slide>
                    </b-carousel>
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
        data: () => ({
            file: [],
            productos:[],
            multi: true,
            data: [],
            form: {
                titulo: null,
                detalle: null,
                precio: null,
                producto: null,
                cantidad: null
            },
            url1: null,
            url2: null,
            url3: null,
            url4: null,
        }),
        methods: {
            img() {
                if (this.file[0]) {
                    let reader = new FileReader();
                    reader.readAsDataURL(this.file[0]);
                    reader.onload=element=>{
                        this.url1=element.target.result;
                    }
                }
                if (this.file[0]) {
                    let reader = new FileReader();
                    reader.readAsDataURL(this.file[1]);
                    reader.onload=element=>{
                        this.url2=element.target.result;
                    }
                }
                if (this.file[0]) {
                    let reader = new FileReader();
                    reader.readAsDataURL(this.file[2]);
                    reader.onload=element=>{
                        this.url3=element.target.result;
                    }
                }
                if (this.file[0]) {
                    let reader = new FileReader();
                    reader.readAsDataURL(this.file[3]);
                    reader.onload=element=>{
                        this.url4=element.target.result;
                    }
                }
            },
            getData(){
                callHttp('proveer/producto/', {}).then(response=>{
                    this.productos=response.productos;
                });
            },
            registrar(){
                callHttp('/publicacion/crear/',this.form).then(response=>{
                    console.log(response);
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