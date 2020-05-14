<template>
<div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" id="announcement_create_form" action="" @submit.prevent="announcementCreateForm">
                <div class="row">

                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="title">
                                <span class="text-danger mr-2">*</span>標題
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <span class="text-danger mr-2">*</span><label for="content">內容</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="5" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-block btn-primary">
                            確認新增
                        </button>
                        <a :href="AgenciesIndexURL" class="btn btn-block btn-danger">
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
            AnnouncementsIndexURL: $('#AnnouncementsIndexURL').html(),
            AnnouncementsStoreURL: $('#AnnouncementsStoreURL').html(),
        }
    },
    methods: {
        announcementCreateForm(e) {
            let url = this.AnnouncementsStoreURL;
            let formData = new FormData($(e.target)[0]);
            var content = CKEDITOR.instances.content.getData();

            formData.append('content', content);
            this.$refs.loadingModal.initalModal();
            axios.post(url, formData).then(response => {
                this.$refs.loadingModal.successfulResponse('新增成功', response.data.url);
            }).catch((error) => {
                console.error('新增最新消息時發生錯誤，錯誤訊息：' + error);
                this.$refs.loadingModal.failureResponse(error);
            });
        }
    },
    mounted(){
        CKEDITOR.replace('content');
    }
}
</script>

<style>

</style>
