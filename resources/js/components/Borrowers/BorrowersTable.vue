<template>
<div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>借閱人列表
        </div>
        <div class="card-body">

            <div class="row justify-content-center">
                <div class="col-md-12 justify-content-center" id="">
                    <form method="GET" id="search-by-keywords-form"  @submit.prevent="changeKeywordsType">
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-3">
                                <select name="status" id="status" class="form-control" @change="changeStatus">
                                    <option value="2">全部</option>
                                    <option value="0">一般民眾</option>
                                    <option value="1">符合社福資格</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="activated" id="activated" class="form-control" @change="changeActivated">
                                    <option value="2">全部</option>
                                    <option value="0">停權</option>
                                    <option value="1">未停權</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <!-- // 0. default 1.'agency_id', 2.'name', 3. 'email', 4. 'tel' -->
                                <select name="type" id="type" class="form-control">
                                    <option value="0">依欄位進行搜尋</option>
                                    <option value="0">不分類</option>
                                    <option value="1">隸屬單位名稱</option>
                                    <option value="2">姓名</option>
                                    <option value="3">信箱</option>
                                    <option value="4">電話</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input id="keywords" name="keywords" type="text" class="form-control mb-2" value="" autocomplete="off" placeholder="關鍵字搜尋...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-block btn-primary">
                                    確認
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table id="BorrowersDataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>名稱</th>
                            <th>電話</th>
                            <th>隸屬單位</th>
                            <th>總借閱數量</th>
                            <th>逾期數量</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <paginate-custom @updatePage="getBorrowerList" :pageNum="pageNum" :totalPage="totalPage"></paginate-custom>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['borrowers', 'rowsPerPage', 'pageNum' ,'totalPage'],
    data(){
        return {

        }
    },
    methods: {
        getBorrowerList (pageNum){
            this.$emit('update-borrowers', pageNum);
        },
        changeStatus(e){
            let status = e.target.value;
            this.$emit('change-status', status);
        },
        changeKeywordsType(e){
            let data = $(e.target).serializeObject();
            let keywords = data.keywords;
            let type = data.type;
            let activated = data.activated;
            let status = data.status;
            this.$emit('change-keywords-type', keywords, type, status, activated);
        },
        changeActivated: function(e){
            let activated = e.target.value;
            this.$emit('change-activated', activated);

        },
    },
    created() {

    },
    mounted() {

    }
}
</script>

<style>

</style>
