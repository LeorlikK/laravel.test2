<template>
    <IndexComponent ref="index" :obj="obj" ></IndexComponent>
    <CreateComponent ref="create"></CreateComponent>
</template>

<script>
import IndexComponent from "@/components/crud/IndexComponent.vue";
// import IndexComponent from "./IndexComponent.vue"
import CreateComponent from "@/components/crud/CreateComponent.vue";
// import ShowComponent from "@/components/crud/ShowComponent.vue";
export default {
    name: "CrudComponent",

    data(){
        return {
            name: 'Karl',
            inName: 'One',
            obj: {
                color: 'black',
                number: 228
            }
        }
    },
    components: {
        IndexComponent,
        CreateComponent,
        // ShowComponent
    },
    methods: {
      componentName(){
          console.log('CRUD component')
      },

    },
    mounted() {
        this.$refs.index.componentName()
    },
    computed: {

    }
}
</script>

<style scoped>

</style>
