<template>
    <h1>Refs</h1>
    <button @click="postInfo">Send</button>
    <p>{{ nameTwo }}</p>
    <button @click="thisAAA">AAA</button>
<!--    <input class="form-control" :value="aaa">-->
</template>

<script>
export default {
    name: "Refs",
    data(){
        return {
            nameTwo:'Masha',
            familyTwo: 'Kets',
            ageTwo: 26,
            obj: {
                id: 1,
                a: 'A',
                b: 'B',
                c: 'C',
            }
        }
    },
    watch:{
        nameTwo(newQuestion, oldQuestion){
            console.log(`Old=${newQuestion}, New=${oldQuestion}/// ${this.nameTwo}`)
        }
    },
    props: ['aaa', 'bbb', 'ccc'],
    methods: {
        postInfo(){
            this.$emit('name', this.obj)
        },
        thisAAA(){
            this.nameTwo = '1111';
        }
    },
     computed: {

     }
}
</script>

<style scoped>

</style>
