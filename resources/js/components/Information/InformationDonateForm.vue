<template>
<div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" id="information_update_form" action="#" enctype="multipart/form-data" @submit.prevent="informationUpdateForm">

                <div class="row">
                    <div class="col-md-12 text-center">
                        <upload-images ref="uploadCoverImages" :uploadimg="InformationDonateImageURL" :title="'上傳好書捐贈圖片'" :prefix="'info'"></upload-images>
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
</div>
</template>

<script>
export default {
    props: ['information'],
    data(){
        return {
            InformationUpdateURL: $('#InformationUpdateURL').html(),
            InformationIndexURL: $('#InformationIndexURL').html(),
            InformationDonateImageURL: $('#InformationDonateImageURL').html(),
        }
    },
    methods: {
        informationUpdateForm(e) {
            let url = this.InformationUpdateURL;
            // let data = $(e.target).serializeObject();
            let formData = new FormData($(e.target)[0]);

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
