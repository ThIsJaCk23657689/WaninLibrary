<template>
<div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" id="announcement_edit_form" action="#" @submit.prevent="announcementEditForm">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="title">標題</label>
                            <input id="title" name="title" type="text" class="form-control" v-model="announcement.title" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="is_top">是否置頂</label>
                            <select name="is_top" id="is_top" class="form-control" v-bind:value = "announcement.is_top">
                                <option value="1">置頂</option>
                                <option value="0">不置頂</option>
                            </select>
                        </div>
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
                        <a :href="AnnouncementsIndexURL" class="btn btn-block btn-danger">
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
    props:['announcement', 'content'],
    data(){
        return {
            AnnouncementsIndexURL: $('#AnnouncementsIndexURL').html(),
            AnnouncementsUpdateURL: $('#AnnouncementsUpdateURL').html(),
        }
    },
    methods: {
        announcementEditForm(e) {
            let url = this.AnnouncementsUpdateURL;
            let formData = new FormData($(e.target)[0]);
            var content = CKEDITOR.instances.content.getData();
            console.log($(e.target)[0]);
            formData.append('_method', 'patch');
            formData.append('content', content);

            this.$refs.loadingModal.initalModal();
            axios.post(url, formData).then(response => {
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
        // CKEDITOR.replace('content');

    }
}
</script>

<style>

</style>
