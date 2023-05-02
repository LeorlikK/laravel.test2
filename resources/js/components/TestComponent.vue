<template>
    <h1>Hello Vue</h1>
    <p>Name: {{ string }}</p>
    <p>Name: {{ nameJob }}</p>
    <div>
        <div v-for="person in personsOld">
            <div v-if="person.age > 24">
                <p>{{ person.name }}</p>
                <p>{{ person.age }}</p>
                <p>{{ person.job }}</p>
            </div>

        </div>
    </div>
    <button @click="sayMeHello">SayMyHello!</button>
    <button @click="sayMeWorld">SayMyWorld!</button>
    <TestOneComponent></TestOneComponent>
</template>

<script>
import TestOneComponent from "@/components/TestOneComponent.vue";
import axios from "axios";
export default {
    name: "TestComponent",

    data: function () {
      return {
          num: 1,
          string: 'Kirill',
          boolean: true,
          someNull: null,
          arr: [1, 2, 3, 4, 5],
          someObj: {

          },
          persons: [
              {
                  name: 'Kirill',
                  age: 25,
                  job: null
              },
              {
                  name: 'Masha',
                  age: 26,
                  job: 'stream'
              },
              {
                  name: 'Igor',
                  age: 23,
                  job: 'police'
              }
          ]
      }
    },

    methods: {
        sayMeHello: function () {
            alert('Hello')
        },
        sayMeWorld() {
            alert('World')
        },
        getAxiosPost(){
            axios.get('/vue-js-axios').then(function (data) {
                console.log(data.data);
            })
        }
    },

    mounted() {
      this.getAxiosPost()
    },

    computed: {
        nameJob() {
            return this.string + 'work in bank'
        },
        personsOld() {
            return this.persons.filter(function (person) {
                return person.age > 24
            })
        }

    },

    components: {
        TestOneComponent
    }
}
</script>

<style scoped>

</style>
