<template>
    <p>{{ displayedText }} <button @click="showFullText = !showFullText">Read {{ readMoreText }}</button></p>
</template>

<script>
    export default {
        computed: {
            displayedText() {
                if (!this.showFullText) {
                    return this.text.slice(0, 200)+'...'
                } else {
                    return this.text
                }
            },
            readMoreText() {
                return this.showFullText ? 'less' : 'more'
            }
        },
        props: {
            text: {
                type: String,
                default: '',
            },
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
        },
        data() {
            return {
                showFullText: false,
            }
        },
    }
</script>
