<template>
    <div>
        <b-carousel
                id="carousel1"
                controls
                img-width="50"
                img-he
                indicators
                background="#ababab"
                :interval="4000"
                v-model="slide"
                @sliding-start="onSlideStart"
                @sliding-end="onSlideEnd"
        >
            <!-- Text slides with image -->
            <b-carousel-slide img-src="https://www.tec.ac.cr/sites/default/files/media/img/main/fotonota99_0.jpg">
                <h1>Haciendo La diferencia</h1>
            </b-carousel-slide>

            <!-- Slides with custom text -->
            <b-carousel-slide img-src="http://www.lamolina.edu.pe/agronomia/pae/images/pic15.jpg">
                <h1>Nosotros Somos AgroWeb</h1>
            </b-carousel-slide>

            <!-- Slides with image only -->
            <b-carousel-slide img-src="http://www.ceres.ufv.br/bundles/revista/images/7.jpg" />
            <b-carousel-slide img-src="https://docplayer.es/docs-images/64/50756722/images/18-1.jpg"/>

            <h1></h1>
            <!-- Slides with img slot -->
            <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->

        </b-carousel>
        <b-row>
            <b-col>
                <b-card no-body class="overflow-hidden mt-lg-5" style="max-width: 540px;">
                    <b-row no-gutters>
                        <b-col md="6">
                            <b-card-img src="https://picsum.photos/400/400/?image=20" class="rounded-0" />
                        </b-col>
                        <b-col md="6">
                            <b-card-body title="Horizontal Card">
                                <b-card-text>
                                    This is a wider card with supporting text as a natural lead-in to additional content.
                                    This content is a little bit longer.
                                </b-card-text>
                            </b-card-body>
                        </b-col>
                    </b-row>
                </b-card>
            </b-col>
            <b-col>
                <b-card no-body class="overflow-hidden mt-lg-5" style="max-width: 540px;">
                    <b-row no-gutters>
                        <b-col md="6">
                            <b-card-img src="https://picsum.photos/400/400/?image=20" class="rounded-0" />
                        </b-col>
                        <b-col md="6">
                            <b-card-body title="Horizontal Card">
                                <b-card-text>
                                    This is a wider card with supporting text as a natural lead-in to additional content.
                                    This content is a little bit longer.
                                </b-card-text>
                            </b-card-body>
                        </b-col>
                    </b-row>
                </b-card>
            </b-col>
        </b-row>


    </div>
</template>

<script>
    export default {
        name: "index",
        data:()=>({
            slide:null,
        }),
        methods:{
            onSlideStart(slide) {
                this.sliding = true
            },
            onSlideEnd(slide) {
                this.sliding = false
            }
        }
    }
</script>

<style scoped>

</style>