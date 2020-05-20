<template>
<div>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <form method="POST" id="reset_password_form" action="#" @submit.prevent="resetPasswordForm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="old_password">
                                <span class="text-danger mr-2">*</span>請輸入舊密碼
                            </label>
                            <input id="old_password" name="old_password" type="password" class="form-control mb-2" value="" required autocomplete="off" autofocus>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="new_password">
                                <span class="text-danger mr-2">*</span>請輸入新密碼
                            </label>
                            <input id="new_password" name="new_password" type="password" class="form-control mb-2" value="" required autocomplete="off" autofocus>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="new_password_confirmation">
                                <span class="text-danger mr-2">*</span>請再輸入一次新密碼
                            </label>
                            <input id="new_password_confirmation" name="new_password_confirmation" type="password" class="form-control mb-2" value="" required autocomplete="off" autofocus>
                        </div>
                    </div>
                </div>



                <div class="form-group row justify-content-center">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-block btn-primary">
                            確認修改
                        </button>
                        <a :href="IndexURL" class="btn btn-block btn-danger">
                            返回首頁
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
            IndexURL: $('#IndexURL').html(),
            ResetPasswordURL: $('#ResetPasswordURL').html(),
        }
    },
    methods: {
        resetPasswordForm(e) {
            let url = this.ResetPasswordURL;
            let data = $(e.target).serializeObject();

            this.$refs.loadingModal.initalModal();
            axios.post(url, data).then(response => {
                this.$refs.loadingModal.successfulResponse('修改成功', this.IndexURL);
            }).catch((error) => {
                console.error('修改密碼時發生錯誤，錯誤訊息：' + error);
                this.$refs.loadingModal.failureResponse(error);
            });
        }
    },
    mounted(){

    }
}
</script>

<style>

</style>
