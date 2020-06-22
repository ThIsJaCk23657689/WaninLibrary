<template>
<div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" id="activity_edit_form" enctype="multipart/form-data" action="#" @submit.prevent="activityEditForm">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="title">標題</label>
                            <input id="title" name="title" type="text" class="form-control" v-model="activity.title" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="type">類型</label>
                            <select name="type" id="type" class="form-control" v-bind:value = "activity.type">
                                <option value="1">近期活動</option>
                                <option value="2">主題書單</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="is_top">是否置頂</label>
                            <select name="is_top" id="is_top" class="form-control" v-bind:value = "activity.is_top">
                                <option value="1">置頂</option>
                                <option value="0">不置頂</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <upload-images ref="uploadCoverImages" :uploadimg="ActivitiesCoverImageURL" :title="'上傳封面圖片'" :aspect-ratio="1.5/1" :prefix="'activity'"></upload-images>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="content">內容</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="5" v-model="content"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-block btn-success">
                            確認編輯
                        </button>
                        <a :href="ActivitiesIndexURL" class="btn btn-block btn-danger">
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
    props:['activity', 'content'],
    data(){
        return {
            CKEditorUploadURL: $('#CKEditorUploadURL').text(),
            ActivitiesIndexURL: $('#ActivitiesIndexURL').html(),
            ActivitiesUpdateURL: $('#ActivitiesUpdateURL').html(),
            ActivitiesCoverImageURL: $('#ActivitiesCoverImageURL').html(),
        }
    },
    methods: {
        activityEditForm(e) {
            let url = this.ActivitiesUpdateURL;
            let formData = new FormData($(e.target)[0]);
            var content = CKEDITOR.instances.content.getData();
            // console.log($(e.target)[0]);
            formData.append('_method', 'patch');
            formData.append('content', content);

            this.$refs.loadingModal.initalModal();
            axios.post(url, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(response => {
                this.$refs.loadingModal.successfulResponse('編輯成功', response.data.url);
            }).catch((error) => {
                console.error('編輯單位時發生錯誤，錯誤訊息：' + error);
                this.$refs.loadingModal.failureResponse(error);
            });
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
