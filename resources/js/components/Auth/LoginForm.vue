<template>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">登入</div>

            <div class="card-body">
                <form id="login_form" method="POST" action="#">
                    <div class="form-group row">
                        <label for="account" class="col-md-4 col-form-label text-md-right">帳號</label>

                        <div class="col-md-6">
                            <input id="account" type="text" class="form-control" name="account" value="" required autocomplete="account" autofocus>
                            <span id="account_error" class="invalid-feedback" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">密碼</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            <span id="password_error" class="invalid-feedback" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">記住我</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button id="LoginBtn" type="submit" class="btn btn-primary">
                                登入
                            </button>

                            <a class="btn btn-link" :href="forgetPasswordURL">
                                忘記密碼？
                            </a>
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
            forgetPasswordURL :$('#forgetPasswordURL').text()
        }
    },
    mounted(){
        $('#login_form').submit(function(e){
            e.preventDefault();

            $.showLoadingModal('驗證帳戶資訊中...');
            $('#login_form input.is-invalid').removeClass('is-invalid')
            $('#LoginBtn').attr('disabled', true);

            let url = $('#LoginAPI').html();
            let data = $(this).serializeObject();

            axios.post(url, data).then(response => {
                if($('#IntendedURL').html() != '' &&  $('#IntendedURL').html() != null){
                    location.href = $('#IntendedURL').html();
                }else{
                    location.href = response.data.redirect_url;
                }
            }).catch((error) => {
                console.error('登入失敗，錯誤訊息：' + error);
                if(error.response.data.errors == null){
                    $.showErrorModalWithoutError('登入失敗，錯誤訊息：' + error.response.data.message + '\n請聯絡系統設計師處理。');
                }else{
                    console.error(error.response.data.errors);
                    $.showErrorModal(error);
                    let $key = Object.keys(error.response.data.errors);
                    $key.forEach(function(item, index){
                        $('#' + item).addClass('is-invalid');
                        $('#' + item + '_error').html('<strong>'+ error.response.data.errors[item] + '</strong>');
                    });
                }
                $('#LoginBtn').attr('disabled', false);
            });
        });
    }
}
</script>

<style>

</style>
