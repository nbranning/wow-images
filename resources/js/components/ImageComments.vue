<template>
    <div class="relative">
        <form @submit.prevent="addComment">
            <input class="pt-2 pb-2 pl-3 w-full h-11 bg-slate-600 rounded-lg placeholder:text-slate-300 font-medium pr-20" type="text" placeholder="Write a comment"  v-model="new_comment.comment" />
            <input type="hidden" v-model="new_comment.wow_image_id" >
            <span class="flex absolute right-3 top-2/4 -mt-3 items-center">
                <button type="submit">Add</button>
            </span>
        </form>
    </div>
    <div class="pt-6">
        <div class="media flex pb-4">
            <div class="media-body">
                <p v-for="(comment, index) in comments" :key="index">
                    {{ comment.comment }}<span class="text-slate-300" > - <timeago :datetime="comment.created_at"/></span>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['img_id'],
        methods: {
            addComment() {
                this.axios
                    .post('/api/comment/save', this.new_comment)
                    .then(response => (
                        this.new_comment = {},
                        this.getComments()
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            },
            getComments(){
                this.axios
                .get(`/api/comments/${this.img_id}`)
                .then(response => (
                    this.comments = response.data
                ))
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
            }
        },
        mounted() {
            this.new_comment.wow_image_id = this.img_id,
            this.getComments()
        },
        data() {
            return {
                new_comment: {},
                comments:{}
            }
        },
    }
</script>
