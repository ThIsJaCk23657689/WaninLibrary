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
                            <div class="col-md-2">
                                <select name="exposure" id="exposure" class="form-control" @change="changeExposure">
                                    <option value="0">曝光程度</option>
                                    <option value="1">完全公開</option>
                                    <option value="2">姓名保護</option>
                                    <option value="3">對外匿名</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <!-- // 0.(default)全部 2.依姓名 3.依照電話 4.手機 5. 信箱  -->
                                <select name="type" id="type" class="form-control">
                                    <option value="0">依欄位進行搜尋</option>
                                    <option value="0">不分類</option>
                                    <option value="1">姓名</option>
                                    <option value="2">電話</option>
                                    <option value="3">手機</option>
                                    <option value="4">信箱</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input id="keywords" name="keywords" type="text" class="form-control mb-2" value="" autocomplete="off" placeholder="關鍵字搜尋...">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-block btn-primary">
                                    確認
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table id="DonorsDataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>編號</th>
							<th>名稱</th>
							<th>聯絡方式</th>
							<th>曝光程度</th>
							<th>捐贈數量</th>
							<th>操作</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <paginate-custom @updatePage="getDonorList" :pageNum="pageNum" :totalPage="totalPage"></paginate-custom>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['donors', 'rowsPerPage', 'pageNum' ,'totalPage'],
    data(){
        return {

        }
    },
    methods: {
        getDonorList (pageNum){
            this.$emit('update-donors', pageNum);
        },
        changeExposure(e){
            let exposure = e.target.value;
            this.$emit('change-exposure', exposure);
        },
        changeKeywordsType(e){
            let data = $(e.target).serializeObject();
            let keywords = data.keywords;
            let type = data.type;
            let exposure = data.exposure;
            this.$emit('change-keywords-type', keywords, type, exposure);
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
