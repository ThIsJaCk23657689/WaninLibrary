<template>
<div class="row justify-content-center">
    <div class="col-md-8">
        <form method="POST" id="donor_create_form" :action="DonorsStoreURL">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">
                            <span class="text-danger mr-2">*</span>名稱
                        </label>
                        <input id="name" name="name" type="text" class="form-control mb-2" value="" required autocomplete="off" autofocus>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tel">電話</label>
                        <input id="tel" name="tel" type="text" class="form-control mb-2" value="" autocomplete="off">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cellphone">行動電話</label>
                        <input id="cellphone" name="cellphone" type="text" class="form-control mb-2" value="" autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday">生日</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" autocomplete="off" placeholder="例：1950-01-01">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exposure">
                            <span class="text-danger mr-2">*</span>曝光程度
                        </label>
                        <select name="exposure" id="exposure" class="form-control">
                            <option value="1">完全公開</option>
                            <option value="2">半公開</option>
                            <option value="3">對外匿名</option>
                        </select>
                    </div>
                </div>

               <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">信箱</label>
                        <input id="email" name="email" type="email" class="form-control" value="" autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="content">備註內容</label>
                        <textarea name="content" id="content" class="form-control" cols="30" rows="3"></textarea>
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
                                <input id="address_others" type="text" class="form-control" name="address_others" value="" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-block btn-primary">
                        確認新增
                    </button>
                    <a :href="DonorsIndexURL" class="btn btn-block btn-danger">
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
            DonorsIndexURL: $('#DonorsIndexURL').html(),
            DonorsStoreURL: $('#DonorsStoreURL').html(),
            FormErrorsMsg: [],
        }
    },
    methods: {

    },
    created(){

    },
    mounted(){
        // 地址
        $('#address_twzipcode').twzipcode({
            'readonly': false
        });

        // 生日
        $("#birthday").datepicker({
            dateFormat: 'yy-mm-dd',
            changeYear: true,
            changeMonth: true,
            yearRange: "-80:+0",
            maxDate: '-15y',
        });

        $('#exposure').selectpicker();

        $('#donor_create_form').submit(function(e){
            e.preventDefault();

            let url = $(this).attr('action');
            let data = $(this).serializeObject();

            $.showLoadingModal();
            axios.post(url, data).then(response => {
                $.showSuccessModal('新增成功', response.data.url);
            }).catch((error) => {
                console.error('新增捐贈人時發生錯誤，錯誤訊息：' + error);
                $.showErrorModal(error);
            });
        });
    },
}
</script>

<style>

</style>
