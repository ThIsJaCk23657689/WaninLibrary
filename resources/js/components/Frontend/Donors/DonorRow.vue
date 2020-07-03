<template>
<div class="donor-row">
    <div class="donor-col w-10 td">{{ donor.index }}</div>
    <div class="donor-col w-20 td">{{ donor.updated_at }}</div>
    <div class="donor-col w-30 td">{{ donor.showName }}</div>
    <div class="donor-col w-18 td donor-col-amount">{{ donor.donateAmount }}</div>
    <div class="donor-col w-adj td">
        <a :href="donor.donatedBookURL" class="donor-link">
            <i class="fas fa-play"></i>
        </a>
     </div>
</div>
</template>

<script>
export default {
    props: ['donor'],
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
