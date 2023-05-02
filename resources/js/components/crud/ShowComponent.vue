<template>

</template>

<script>
import axios from "axios";

export default {
    name: "ShowComponent",
    data(){
        return {
            'id': null,
            'title': null
        }
    },
    methods: {
        getShow(){
            axios.get('/api/vue-js-axios/show')
        }
    },
    mounted() {
    }
}
</script>

<style scoped>

</style>
