<template>
<div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table mr-2"></i>借還書紀錄
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="BorrowLogsDataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>借閱人編號</th>
                            <th>借閱人姓名</th>
                            <th>書籍編號</th>
                            <th>書名</th>
                            <th>索書號</th>
                            <th>狀態</th>
                            <th>日期</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <paginate-custom @updatePage="getBorrowLogList" :pageNum="pageNum" :totalPage="totalPage"></paginate-custom>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['borrowLogs', 'rowsPerPage', 'pageNum' ,'totalPage'],
    data(){
        return {

        }
    },
    methods: {
        getBorrowLogList (pageNum){
            this.$emit('update-borrow-log', pageNum);
        }
    },
    created() {

    },
    mounted() {

    }
}
</script>

<style>

</style>
