<template>
<div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" id="user_update_form" action="#" enctype="multipart/form-data" @submit.prevent="informationUpdateForm">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email"><span class="text-danger mr-2">*</span>信箱</label>
                            <input id="email" name="email" type="email" class="form-control" v-model="information.email" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tel"><span class="text-danger mr-2">*</span>電話</label>
                            <input id="tel" name="tel" type="text" class="form-control mb-2" v-model="information.tel">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fax"><span class="text-danger mr-2">*</span>傳真</label>
                            <input id="fax" name="fax" type="text" class="form-control mb-2" v-model="information.fax">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address"><span class="text-danger mr-2">*</span>地址</label>
                            <input id="address" name="address" type="text" class="form-control" v-model="information.address" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="open_at"><span class="text-danger mr-2">*</span>開館時間</label>
                            <input id="open_at" name="open_at" type="text" class="form-control" v-model="information.open_at" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="close_at"><span class="text-danger mr-2">*</span>閉館時間</label>
                            <input id="close_at" name="close_at" type="text" class="form-control" v-model="information.close_at" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <upload-images ref="uploadCoverImages" :uploadimg="InformationCoverImageURL" :title="'上傳封面圖片'" :aspect-ratio="4/2"></upload-images>
                    </div>
                </div>


                <div class="form-group row justify-content-center">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-block btn-success">
                            確認修改
                        </button>
                        <a :href="InformationIndexURL" class="btn btn-block btn-danger">
                            取消編輯
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
    props: ['information'],
    data(){
        return {
            InformationUpdateURL: $('#InformationUpdateURL').html(),
            InformationIndexURL: $('#InformationIndexURL').html(),
            InformationCoverImageURL: $('#InformationCoverImageURL').html(),
        }
    },
    methods: {
        informationUpdateForm(e) {
            let url = this.InformationUpdateURL;
            // let data = $(e.target).serializeObject();
            let formData = new FormData($(e.target)[0]);
            formData.append('_method', 'patch');

            $.showLoadingModal();
            axios.post(url, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(response => {
                $.showSuccessModal('修改成功', response.data.url, '檢視');
            }).catch((error) => {
                console.error('修改時發生錯誤，錯誤訊息：' + error);
                $.showErrorModal(error);
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
