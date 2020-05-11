<template>
<div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" id="agency_create_form" action="" @submit.prevent="agencyCreateForm">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="content">
                                消息內容
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
            CKEditorUploadURL: $('#CKEditorUploadURL').text()
        }
    },
    methods: {

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