<template>
    <h1>Hello Vue I am TEST TWO</h1>
    <div v-for="person in persons">
        <p>{{ person.id }}</p>
        <p>{{ person.category_id }}</p>
        <p>{{ person.title }}</p>
        <p>{{ person.text }}</p>
    </div>
    <p>{{ persons}}</p>
</template>

<script>
import axios from "axios";

export default {
    name: "TestTwoComponent",

    data() {
        return {
            persons: null
        }
    },

    computed: {

    },

    methods: {
        getAxiosPost() {
            axios.get('/vue-js-axios').then(function (data) {
                console.log(this.persons);
            })
            axios.get('/vue-js-axios').then(data => {
                console.log(data);
                this.persons = data.data;
            })
        }
    },

    mounted() {
        this.getAxiosPost()
    }
}
</script>

<style scoped>

</style>
