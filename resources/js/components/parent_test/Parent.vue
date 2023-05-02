<template>
    <h1>Parent</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            <template v-for="post in posts">
                <tr>
                    <td>{{ post.id}}</td>
                    <td>{{ post.title}}</td>
                </tr>
            </template>
        </tbody>
    </table>
    <Refs @name="takeObj"
        :aaa="nameOne"
        :bbb="familyOne"
        :ccc="ageOne"
    ></Refs>
    <h3>INFO: {{info}}</h3>
    <input
        v-model="nameOne"
        v-on:input="inputFunc">
</template>

<script>
import Refs from "@/components/parent_test/Refs.vue";
import axios from "axios";
export default {
    name: "Parent",
    components: {
        Refs
    },
    data(){
        return {
            nameOne:'Kirill',
            familyOne: 'Orlov',
            ageOne: 25,
            posts: null,
            info: null
        }
    },
    beforeCreate() {console.log('beforeCreate')},
    created() {console.log('created')},
    beforeMount() {console.log('beforeMount')},
    mounted() {console.log('mounted')},
    beforeUpdate() {console.log('beforeUpdate')},
    updated() {console.log('updated')},
    beforeUnmount() {console.log('beforeUnmount')},
    unmounted() {console.log('unmounted')},
    methods: {
        getPosts(){
            axios.get('/api/vue-js-axios').then(res => {
                this.posts = res.data
            })
        },
        takeObj(obj){
            this.info = obj
        },
        inputFunc(value){
            console.log(value);
        }
    },
}
</script>

<style scoped>

</style>
