<template>
    <div class="py-4">
        <button @click="WOW" class="inline-flex items-center">
            <span class="mr-2">
                <svg :class="{ 'fill-rose-600': isWowed}" style="width: 24px; height: 24px;" viewBox="0 0 24 24">
                    <path
                    d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                    </path>
                </svg>
            </span>
        </button>
    </div>
    <Comments v-if="isWowed" :img_id="wow_img_id"/>
</template>

<script>
    import Comments from './ImageComments.vue'
    export default {
        components: {
            Comments
        },
        props: ['image'],
        methods: {
            WOW(){
                if(!this.isWowed){
                    this.axios
                        .post('/api/image/save', this.image)
                        .then(response => (
                            this.isWowed = true,
                            this.wow_img_id = response.data
                        ))
                        .catch(err => console.log(err))
                        .finally(() => this.loading = false)
                }else{
                    this.axios
                    .delete(`/api/image/${this.wow_img_id}`)
                        .then(response => (
                            this.isWowed = false,
                            this.wow_img_id = ''
                        ))
                        .catch(err => console.log(err))
                        .finally(() => this.loading = false)
                }
            }
        },
        mounted() {
            this.axios
                .post('/api/image/wowed', {'date':this.image.date})
                .then(response => (
                    this.isWowed = (response.data == '0') ? false : true,
                    this.wow_img_id = (response.data == '0') ? '' : response.data
                ))
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        },
        data() {
            return {
                isWowed: false,
                wow_img_id: ''
            }
        },
    }
</script>
