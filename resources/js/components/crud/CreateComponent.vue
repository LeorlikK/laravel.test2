<template>
    <div class="w-25">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" v-model="password">
        </div>

        <button class="btn btn-primary" @click.prevent="sendForm">Submit</button>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "CrudComponent",
    data(){
        return {
            'email': null,
            'password': null
        }
    },
    methods: {
        sendForm(){
            axios.post('/api/vue-js-axios', {email: this.email, password: this.password})
                .then(res => {
                    this.email = null
                    this.password = null
                    console.log(res);
                })
        },
        componentName(){
            return 'CREATE component'
        }
    }
}
</script>

<style scoped>

</style>
