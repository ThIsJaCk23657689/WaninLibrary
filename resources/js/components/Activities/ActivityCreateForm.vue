<template>
<div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" id="activity_create_form" action="" @submit.prevent="activityCreateForm">

                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="title">
                                <span class="text-danger mr-2">*</span>活動標題
                            </label>
                            <input id="title" name="title" type="text" class="form-control mb-2" value="" required autocomplete="off" autofocus>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="is_top">是否置頂</label>
                            <select name="is_top" id="is_top" class="form-control">
                                <option value="1">置頂</option>
                                <option value="0">不置頂</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <upload-images ref="uploadCoverImages" :title="'上傳封面圖片'" :aspect-ratio="1/1" :prefix="'activity'"></upload-images>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="content">
                                活動內容
                            </label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>

                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-block btn-primary">
                            確認新增
                        </button>
                        <a href="#" class="btn btn-block btn-danger">
                            返回列表
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <loading-modal ref="loadingModal"></loading-modal>
</div>
</template>

<script>
export default {
    data(){
        return {
            CKEditorUploadURL: $('#CKEditorUploadURL').text(),
            ActivitiesIndexURL: $('#ActivitiesIndexURL').html(),
            ActivitiesStoreURL: $('#ActivitiesStoreURL').html(),
        }
    },
    methods: {
        activityCreateForm(e) {
            let url = this.ActivitiesStoreURL;
            let formData = new FormData($(e.target)[0]);
            var content = CKEDITOR.instances.content.getData();

            formData.append('content', content);
            this.$refs.loadingModal.initalModal();
            axios.post(url, formData).then(response => {
                this.$refs.loadingModal.successfulResponse('新增成功', response.data.url);
            }).catch((error) => {
                console.error('新增活動時發生錯誤，錯誤訊息：' + error);
                this.$refs.loadingModal.failureResponse(error);
            });
        }
    },
    created() {

    },
    mounted() {
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: this.CKEditorUploadURL,
            filebrowserUploadMethod: 'form'
        });
    }
}
</script>

<style>

</style>
