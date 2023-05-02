<template>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">{{ obj.color }}</th>
            <th scope="col">{{ obj.number }}</th>
            <th scope="col">Created Date</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>

        <template v-for="post in posts">
            <tr :class="isEdit(post.id) ? 'd-none' : ''">
                <th scope="row">{{ post.id}}</th>
<!--                <td>{{ post.title}}</td>-->
                <td><a href="{{ }}">{{ post.title}}</a></td>
                <td>{{ post.text}}</td>
                <td>{{ post.created_at}}</td>
                <td><a href="#" @click.prevent="getEdit(post.id, post.title, post.text)" class="btn btn-success"></a>Edit</td>
                <td><a href="#" @click.prevent="deletePost(post.id)" class="btn btn-danger"></a>Delete</td>
            </tr>
            <tr :class="isEdit(post.id) ? '' : 'd-none'">
                <th scope="row">{{ post.id}}</th>
                <td><input class="form-control" v-model="title"></td>
                <td><input class="form-control" v-model="text"></td>
                <td><a href="#" @click.prevent="patchUpdate(post.id)" class="btn btn-success"></a>Update</td>
            </tr>
        </template>

        </tbody>
    </table>
</template>

<script>
import axios from "axios";

export default {
    name: "IndexComponent",
    data(){
        return {
            posts: null,
            editId: null,
            title: null,
            text: null,
            test: 'Kirill'
        }
    },
    props: [
        'obj'
    ],
    methods: {
        changeName(){
            console.log(this.test)
            this.$parent.inName = this.test
            this.$parent.indexName()
        },
        componentName(){
            console.log('INDEX component')
        },
        getIndex(){
            axios.get('/api/vue-js-axios').then(res => {
                this.posts = res.data;
            })

        },
        getEdit(id, title, text){
            this.title = title;
            this.text = text;
            this.editId = id;
        },
        isEdit(id){
            return this.editId === id;
        },
        patchUpdate(id){
            this.editId = null;
            axios.patch(`/api/vue-js-axios/${id}`, {title: this.title, text: this.text}).then(res => {
                console.log(res);
                this.getIndex();
            })
        },
        deletePost(id){
            axios.delete(`/api/vue-js-axios/${id}`).then(res => {
                console.log(res.data)
            })
        }
    },
    mounted() {
        this.getIndex()
        console.log(this.$parent.$refs.create.componentName());

    }
}
</script>

<style scoped>

</style>
