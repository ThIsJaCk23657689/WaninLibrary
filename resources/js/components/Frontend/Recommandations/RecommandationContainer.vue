<template>
<div class="row">
    <recommandation-card v-for="recommandation in recommandations" :recommandation="recommandation" :key="recommandation.id"></recommandation-card>
</div>
</template>

<script>
export default {
    props: ['recommandations'],
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
