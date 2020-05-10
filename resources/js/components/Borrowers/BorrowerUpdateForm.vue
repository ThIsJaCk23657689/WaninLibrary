<template>
<div>

    <loading-modal ref="loadingModal"></loading-modal>
</div>
</template>

<script>
export default {
    props: [],
    data(){
        return {
            agency: [],
            AgenciesIndexURL: $('#AgenciesIndexURL').html(),
            AgenciesUpdateURL: $('#AgenciesUpdateURL').html(),
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