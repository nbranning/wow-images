<template>
    <div class="wrapper pt-10">
        <div class="box-border mx-4 sm:columns-1 md:columns-2 lg:columns-3 xl:columns-3">
            <article v-for="(image, index) in nasaImages" :key="index" class="mb-4 break-inside-avoid p-6 rounded-xl bg-slate-500 flex flex-col bg-clip-border">
                <h2 class="text-3xl font-bold">{{ image.title }}</h2>
                <h3 class="text-xl font-semibold">{{ formatDate(image.date) }}</h3>
                <div class="py-4">
                    <a class="flex" href="#">
                        <img class="max-w-full rounded-lg" :src="image.url" />
                    </a>
                </div>
                <ReadMore :key="image.date" :text="image.explanation" />
                <Wow :image="image"/>
            </article>
        </div>
    </div>
    <div v-if="!isLoading" class="flex py-6"><button class="mx-auto py-2 px-6 border border-slate-800 rounded hover:text-white hover:bg-slate-600" @click="loadMore">Load more</button></div>
</template>

<script>
    import { mapState } from 'vuex';
    import ReadMore from './ReadMore.vue'
    import Wow from './ImageWow.vue'

    export default {
        components: {
            ReadMore,
            Wow
        },
        computed: {
            ...mapState({
                nasaImages: state => state.nasaImages
            })
        },
        methods: {
            showMore(id) {
                const img_date = {
                    id: true,
                };
                this.readMore.push(img_date);
            },
            showLess(id) {
                const img_date = {
                    id: false,
                };
                this.readMore.push(img_date);
            },
            formatDate(dateString) {
                const date = new Date(dateString);
                return new Intl.DateTimeFormat('default', {dateStyle: 'long'}).format(date);
            },
            loadMore(){
                this.isLoading = true;
                this.$store.commit('setPage');
                this.$store.dispatch('fetchNasaImages');
                this.isLoading = false;
            }
        },
        mounted() {
            this.$store.dispatch('fetchNasaImages');
        },
        data() {
            return {
                readMore: {},
                isLoading: false
            }
        },
    }
</script>
