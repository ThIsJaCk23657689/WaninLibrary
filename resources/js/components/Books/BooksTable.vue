<template>
<div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table mr-2"></i>書籍列表
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12 justify-content-center" id="">
                    <form method="GET" id="search-by-keywords-form"  @submit.prevent="changeKeywordsType">
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-3">
                                <select name="status" id="status" class="form-control" @change="changeStatus">
                                    <option value="0">書籍狀態</option>
                                    <option value="1">可借閱</option>
                                    <option value="2">借閱中</option>
                                    <option value="3">逾期中</option>
                                    <option value="4">庫藏待上架</option>
                                    <option value="5">已淘汰</option>
                                    <option value="6">已轉贈</option>
                                    <option value="7">可供免費索取</option>
                                    <option value="8">已被索取</option>
                                    <option value="9">無外借</option>
                                    <option value="10">無歸還</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="category" id="category" class="form-control" @change="changeCategory">
                                    <option value="14">書籍類別</option>
                                    <option value="0">000 總類</option>
                                    <option value="1">100 哲學類</option>
                                    <option value="2">200 宗教類</option>
                                    <option value="3">300 科學類</option>
                                    <option value="4">400 應用科學類</option>
                                    <option value="5">500 社會科學類</option>
                                    <option value="6">600 史地類</option>
                                    <option value="7">610 中國史地類</option>
                                    <option value="8">710 世界史地類</option>
                                    <option value="9">800 語文文學類</option>
                                    <option value="10">900 藝術類</option>
                                    <option value="11">論文</option>
                                    <option value="12">期刊雜誌</option>
                                    <option value="13">非中文圖書</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <!-- //type:(default) 0.全部 1.書名 2.作者 3.ISBN 4.出版商 -->
                                <select name="type" id="type" class="form-control">
                                    <option value="0">依欄位進行搜尋</option>
                                    <option value="0">不分類</option>
                                    <option value="1">書名</option>
                                    <option value="2">作者</option>
                                    <option value="3">ISBN</option>
                                    <option value="4">出版商</option>
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
                <table id="BooksDataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>書名(主標題)</th>
                            <th>借閱次數</th>
                            <th>狀態</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <paginate-custom @updatePage="getBookList" :pageNum="pageNum" :totalPage="totalPage"></paginate-custom>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['books', 'rowsPerPage', 'pageNum' ,'totalPage'],
    data(){
        return {

        }
    },
    methods: {
        getBookList (pageNum){
            this.$emit('update-book', pageNum);
        },
        changeStatus(e){
            let status = e.target.value;
            this.$emit('change-status', status);
        },
        changeKeywordsType(e){
            let data = $(e.target).serializeObject();
            let keywords = data.keywords;
            let type = data.type;
            let category = data.category;
            let status = data.status;
            this.$emit('change-keywords-type', keywords, type, status, category);
        },
        changeCategory: function(e){
            let category = e.target.value;
            this.$emit('change-category', category);

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
