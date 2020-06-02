<template>
<button :class="classes" title="    " @click="click(data)">
    <span>
        <i class="fa fa-eye mr-2" aria-hidden="true"></i>
        {{ name }}
    </span>
</button>
</template>

<script>
export default {
    props: {
        data: {},
        name: {},
        click: {},
        classes: {},
    },
    data(){
        return {
            
        }
    },
    methods: {

    },
    created(){

    },
    mounted(){

    }
}
</script>

<style>
</style>