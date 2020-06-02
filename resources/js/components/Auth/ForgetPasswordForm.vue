<template>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">忘記密碼</div>

            <div class="card-body">
                <form id="forget_password_form" method="POST" action="#">
                    <div class="form-group row">
                        <label for="account" class="col-md-4 col-form-label text-md-right">請輸入您的信箱</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus>
                            <span id="email_error" class="invalid-feedback" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                送出
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return {
            forgetPasswordAPIURL :$('#forgetPasswordAPIURL').text(),
            LoginURL :$('#LoginURL').text(),
        }
    },
    mounted(){
        $('#forget_password_form').submit(function(e){
            e.preventDefault();

            let url = $('#forgetPasswordAPIURL').text();
            let data = $(this).serializeObject();
            console.log(url);
            // $('#forget_password_form input.is-invalid').removeClass('is-invalid')
            axios.post(url, data).then(response => {
                console.log(response.data);
                $.showSuccessModal('請至信箱收信',$('#LoginURL').text());
                // location.href = $('#LoginURL').text();
            }).catch((error) => {
                console.error('失敗，錯誤訊息：' + error);
                // console.error(error.response);
                if(error.response.data.errors == null){
                    alert('失敗，錯誤訊息：' + error.response.data.message + '\n請聯絡系統設計師處理。');
                }else{
                    console.error(error.response.data.errors);
                    let $key = Object.keys(error.response.data.errors);
                    $key.forEach(function(item, index){
                        $('#' + item).addClass('is-invalid');
                        $('#' + item + '_error').html('<strong>'+ error.response.data.errors[item] + '</strong>');
                    });
                }
            });
        });
    }
}
</script>

<style>

</style>
