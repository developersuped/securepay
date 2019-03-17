<template>
    <b-carousel
            id="carousel1"
            style="text-shadow: 1px 1px 2px #333;"
            controls
            indicators
            background="#ababab"
            :interval="4000"
            img-width="1024"
            img-height="300"
            v-model="slide"
            @sliding-start="onSlideStart"
            @sliding-end="onSlideEnd"
    >
        <!-- Text slides with image -->
        <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=52">
            <h1>Haciendo La diferencia</h1>
        </b-carousel-slide>

        <!-- Slides with custom text -->
        <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=54">
            <h1>Nosotros Somos AgroWeb</h1>
        </b-carousel-slide>

        <!-- Slides with image only -->
        <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=58" />

        <!-- Slides with img slot -->
        <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
        <b-carousel-slide>
            <img
                    slot="img"
                    class="d-block img-fluid w-100"
                    width="1024"
                    height="300"
                    src="https://picsum.photos/1024/480/?image=55"
                    alt="image slot"
            />
        </b-carousel-slide>

    </b-carousel>
</template>

<script>
    export default {
        name: "index",
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