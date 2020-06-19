<template>
<div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table mr-2"></i>目前已借出和逾期列表
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12 justify-content-center">

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-3">
                            <select id="status" name="status" class="form-control" v-model="filter.status" @change="changeStatus">
                                <option value="0">所有狀態</option>
                                <option value="1">未逾期</option>
                                <option value="2">逾期中</option>
                                <option value="3">逾期過久無法討回</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select id="noticed" name="noticed" class="form-control" v-model="filter.noticed" @change="changeNoticed">
                                <option value="0">所有通知狀態</option>
                                <option value="1">郵件電話皆已通知</option>
                                <option value="2">郵件已通知、電話未通知</option>
                                <option value="3">郵件未通知、電話已通知</option>
                                <option value="4">郵件電話皆未通知</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-2">
                            <select id="keyword_column" name="keyword_column" class="form-control" v-model="keyword.column" @change="changeColumn">
                                <option value="0">所有欄位</option>
                                <option value="1">借閱人姓名</option>
                                <option value="2">書籍名稱</option>
                                <option value="4">借閱日期</option>
                                <option value="5">逾期日期</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <input id="keywords_content" name="keywords_content" type="text" class="form-control" v-model="keyword.content" autocomplete="off" placeholder="關鍵字搜尋...">
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-block btn-primary" @click="searchByKeyword">
                                搜尋
                            </button>
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-3">
                            <select id="status" name="status" class="form-control" v-model="order.column" @change="changeOrderColumn">
                                <option value="0">序號</option>
                                <option value="1">借閱日期</option>
                                <option value="2">逾期日期</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select id="noticed" name="noticed" class="form-control" v-model="order.dir" @change="changeOrderDir">
                                <option value="asc">升序</option>
                                <option value="desc">降序</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>

            <div class="table-responsive">
                <table id="UnreturnsDataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>序號</th>
                            <th>借閱人姓名</th>
                            <th>書籍名稱</th>
                            <th>目前狀態</th>
                            <th>借閱日期</th>
                            <th>逾期日期</th>
                            <th>通知狀態</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <paginate-custom @updatePage="getUnreturnsList" :pageNum="pageNum" :totalPage="totalPage"></paginate-custom>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['unreturns', 'rowsPerPage', 'pageNum' ,'totalPage'],
    data(){
        return {
            filter: {
                status: 0,
                noticed: 0,
            },
            keyword: {
                column: 0,
                content: '',
            },
            order: {
                column: 0,
                dir: 'asc',
            }
        }
    },
    methods: {
        changeStatus(){
            this.$emit('update-unreturns', this.pageNum, this.filter, this.keyword, this.order, true);
        },
        changeNoticed(){
            this.$emit('update-unreturns', this.pageNum, this.filter, this.keyword, this.order, true);
        },
        changeColumn(){
            this.$emit('update-unreturns', this.pageNum, this.filter, this.keyword, this.order, true);
        },
        searchByKeyword(){
            this.$emit('update-unreturns', this.pageNum, this.filter, this.keyword, this.order, true);
        },
        changeOrderColumn(){
            this.$emit('update-unreturns', this.pageNum, this.filter, this.keyword, this.order, true);
        },
        changeOrderDir(){
            this.$emit('update-unreturns', this.pageNum, this.filter, this.keyword, this.order, true);
        },
        getUnreturnsList(pageNum) {
            this.$emit('update-unreturns', pageNum, this.filter, this.keyword, this.order, false);
        },
    },
    created(){

    },
    mounted(){

    }
}
</script>

<style>
</style>
