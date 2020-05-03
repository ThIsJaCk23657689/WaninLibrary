<template>
<div class="row justify-content-center">
    <div class="col-md-8">
        <form method="POST" id="user_update_form" :action="UsersUpdateURL">
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">
                            <span class="text-danger mr-2">*</span>姓名
                        </label>
                        <input id="name" name="name" type="text" class="form-control mb-2" :value="user.name" required autofocus>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="email"><span class="text-danger mr-2">*</span>信箱</label>
                        <input id="email" name="email" type="email" class="form-control" :value="user.email" required>
                    </div>
                </div>

                <!-- <div class="col-md-3">
                    <div class="form-group">
                        <label for="status"><span class="text-danger mr-2">*</span>帳號類型</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="1">一般使用者</option>
                            <option value="0">管理者</option>
                        </select>
                    </div>
                </div> -->
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tel">電話</label>
                        <input id="tel" name="tel" type="text" class="form-control mb-2" :value="user.tel">
                    </div>
                </div>
                <div class="col-md-8">
                    <div id="address_twzipcode" class="form-group">
                        <label>地址</label>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <div data-role="county" data-style="form-control" data-name="address_county" data-value=""></div>
                            </div>
                            <div class="col-md-4">
                                <div data-role="district" data-style="form-control" data-name="address_district" data-value=""></div>
                            </div>
                            <div class="col-md-4">
                                <div data-role="zipcode" data-style="form-control" data-name="address_zipcode" data-value=""></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input id="address_others" type="text" class="form-control" name="address_others" :value="user.address_others">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="content">備註內容</label>
                        <textarea name="content" id="content" class="form-control" cols="30" rows="5" v-model="user.content"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-block btn-success">
                        確認修改
                    </button>
                    <a :href="UsersIndexURL" class="btn btn-block btn-danger">
                        返回列表
                    </a>
                </div>
            </div>

        </form>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return {
            user: [],
            UsersIndexURL: $('#UsersIndexURL').html(),
            UsersUpdateURL: $('#UsersUpdateURL').html(),
            FormErrorsMsg: [],
        }
    },
    methods: {

    },
    created(){
        let UsersGetOneURL = $('#UsersGetOneURL').html();
        axios.get(UsersGetOneURL).then(response => {
            this.user = response.data.user;

            // 地址
            $('#address_twzipcode').twzipcode({
                'zipcodeSel': response.data.user.address_zipcode
            });
        });
    },
    mounted(){
        // 地址
        $('#address_twzipcode').twzipcode({
            'readonly': false
        });

        $('#user_update_form').submit(function(e){
            e.preventDefault();

            let url = $(this).attr('action');
            let data = $(this).serializeObject();

            $('#modal_good').css({'display':'none'});
            $('#modal_error').css({'display':'none'});
            $('#modal_spinner').slideDown();
            $('#modal_msg').html('請稍等...');
            $('#modal_link').slideUp();
            $('#modal_close').slideUp();
            $('#LoadingModal').modal('show');
            axios.patch(url, data).then(response => {
                $('#modal_good').css({'display':'flex'});
                $('#modal_spinner').css({'display':'none'});
                $('#modal_msg').html('編輯成功');
                $('#modal_link').attr('href', response.data.url);
                $('#modal_link').slideDown();
            }).catch((error) => {
                console.error('編輯使用者時發生錯誤，錯誤訊息：' + error);
                $('#modal_error').css({'display':'flex'});
                $('#modal_spinner').css({'display':'none'});
                $('#modal_msg').html('發生錯誤<br>錯誤訊息：' + error.response.data.message + '<br>');
                $('#modal_close').slideDown();

                let $key = Object.keys(error.response.data.errors);
                $key.forEach(function(item, index){
                    $('#modal_msg').append(error.response.data.errors[item]+ '<br>');
                    $('#' + item).addClass('is-invalid');
                });
            });
        });
    }
}
</script>

<style>

</style>
