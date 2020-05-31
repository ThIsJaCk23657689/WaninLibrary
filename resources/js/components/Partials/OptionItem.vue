<template>
    <option :value="data.id">{{ data.name }}</option>
</template>

<script>
export default {
    props: ['data'],
    mounted() {
        console.log('OptionItem.vue mounted.')
    },
    data(){
        return {
            
        }
    },
}
</script>

<style>

</style>