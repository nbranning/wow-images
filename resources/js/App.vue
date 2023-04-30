<template>
    <div id="app" class="container mx-auto flex">
        <div class="w-full"><ImageViewer /></div>
        <!-- <div class="w-1/3">ranking</div> -->
        
    </div>
</template>

<script>
    import ImageViewer from './components/ImageViewer.vue'
    export default {
        name: 'app',
        components: {
            ImageViewer
        },
    }
</script>