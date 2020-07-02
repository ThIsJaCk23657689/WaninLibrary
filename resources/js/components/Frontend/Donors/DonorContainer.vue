<template>
<div class="row donor-container">
    <div class="col-md-12">
        <span class="not-found-message" v-if="donors.length == 0">
            很抱歉，無法找到您所查詢的資料，請重新查詢謝謝。
        </span>
        <div class="donor-table" v-else>
            <div class="donor-row">
                <div class="donor-col w-10 th">序號</div>
                <div class="donor-col w-20 th">日期</div>
                <div class="donor-col w-30 th">姓名</div>
                <div class="donor-col w-18 th">捐贈書籍數量</div>
                <div class="donor-col w-adj th">書籍清單</div>
            </div>
            <donor-row v-for="donor in donors" :donor="donor" :key="donor.id"></donor-row>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['donors'],
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