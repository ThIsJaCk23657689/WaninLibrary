<template>
<div class="row">
    <activity-card v-for="activity in activities" :activity="activity" :key="activity.id"></activity-card>
</div>
</template>

<script>
export default {
    props: ['activities'],
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
