<template>
<div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table mr-2"></i>借還書紀錄
        </div>

        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12 justify-content-center" id="">
                    <form method="GET" id="time-range-form"  @submit.prevent="changeRange">
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-2">
                                <select name="status" id="status" class="form-control" @change="changeStatus">
                                    <option value="5">全部書籍</option>
                                    <option value="1">出借</option>
                                    <option value="2">已歸還</option>
                                    <option value="3">逾期過久</option>
                                    <option value="4">逾期</option>
                                </select>
                            </div>
                            <div class="col-md-0 text-center py-1">
                                <label for="" class="">從</label>
                            </div>
                            <div class="col-md-3">
                                <input id="start_date" name="start_date" type="text" class="form-control mb-2" value="" autocomplete="off" required placeholder="例：2020-01-01">
                            </div>
                            <div class="col-md-0 text-center py-1">
                                <label for="" class="">到</label>
                            </div>
                            <div class="col-md-3">
                                <input id="end_date" name="end_date" type="text" class="form-control mb-2" value="" autocomplete="off" required placeholder="例：2020-02-01">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-block btn-primary">
                                    確認
                                </button>
                            </div>

                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="keywords" name="keywords" type="text" class="form-control mb-2" value="" autocomplete="off" placeholder="關鍵字搜尋..." @change="changeKeywords">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table id="BorrowLogsDataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>借閱人姓名</th>
                            <th>書名</th>
                            <th>圖書類別</th>
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
        },
        changeStatus(e){
            let status = e.target.value;
            this.$emit('change-status', status);
        },
        changeKeywords(e){
            let keywords = e.target.value;
            this.$emit('change-keywords', keywords);
        },
        changeRange: function(e){
            let data = $(e.target).serializeObject();
            let start_date = data.start_date;
            let end_date = data.end_date;
            this.$emit('change-range', start_date, end_date);

        },
    },
    created() {

    },
    mounted() {

        $("#start_date").datepicker({
            dateFormat: 'yy-mm-dd',
            changeYear: true,
            changeMonth: true,
            yearRange: "-80:+0",
        });
        $("#end_date").datepicker({
            dateFormat: 'yy-mm-dd',
            changeYear: true,
            changeMonth: true,
            yearRange: "-80:+0",
        });
    }
}
</script>

<style>

</style>
