<template>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <table id="FilterTable" class="table">
                    <thead>
                        <tr>
                            <th>姓名</th>
                            <th>電話</th>
                            <th>生日</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="borrower in borrowers" :key="borrower.id" :class="borrower.activated?'':'table-danger'">
                            <td>{{ borrower.name }}</td>
                            <td>{{ borrower.tel }}</td>
                            <td>{{ borrower.birthday ? borrower.birthday : '無' }}</td>
                            <td>
                                <button type="button" class="btn btn-dark" @click="selectBorrow">選擇</button>
                                <span class="d-none">{{ borrower.getOneUrl }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <paginate-custom @updatePage="getBorrowerList" :pageNum="pageNum" :totalPage="totalPage"></paginate-custom>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['borrowers', 'pageNum', 'totalPage'],
    data(){
        return {

        }
    },
    methods: {
        getBorrowerList(pageNum) {
            this.$emit('update-page-num', pageNum);
        },

        selectBorrow(e) {
            let url = $(e.target).next().text();
            this.$emit('update-current-borrower', url);
        }
    },
    created(){

    },
    mounted(){

    }
}
</script>

<style>
</style>