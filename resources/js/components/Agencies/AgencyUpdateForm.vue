<template>
<div class="row justify-content-center">
    <div class="col-md-8">
        <form method="POST" id="agency_edit_form" :action="AgenciesUpdateURL">
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">
                            <span class="text-danger mr-2">*</span>機構名稱
                        </label>
                        <input id="name" name="name" type="text" class="form-control mb-2" :value="agency.name" required autocomplete="off" autofocus>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tel">電話</label>
                        <input id="tel" name="tel" type="text" class="form-control mb-2" :value="agency.tel" autocomplete="off">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="principal">負責人</label>
                        <input id="principal" name="principal" type="text" class="form-control" :value="agency.principal" autocomplete="off">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
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
                                <input id="address_others" type="text" class="form-control" name="address_others" :value="agency.address_others" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="content">備註內容</label>
                        <textarea name="content" id="content" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                </div>
            </div> 

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-block btn-success">
                        確認修改
                    </button>
                    <a :href="AgenciesIndexURL" class="btn btn-block btn-danger">
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
            agency: [],
            AgenciesIndexURL: $('#AgenciesIndexURL').html(),
            AgenciesUpdateURL: $('#AgenciesUpdateURL').html(),
            FormErrorsMsg: [],
        }
    },
    methods: {    
    },
    created(){  
        let AgenciesGetOneURL = $('#AgenciesGetOneURL').html();
        axios.get(AgenciesGetOneURL).then(response => {
            this.agency = response.data.agency;

            // 地址
            $('#address_twzipcode').twzipcode({
                'zipcodeSel': response.data.agency.address_zipcode
            }); 
        });
    },
    mounted(){
        console.log('AgencyEditForm.vue mounted');

        $('#agency_edit_form').submit(function(e){
            e.preventDefault();

            let url = $(this).attr('action');

            let data = $(this).serializeObject();
            let formdata = new FormData();
            Object.keys(data).forEach(
                key => formdata.append(key, data[key])
            );
            console.log(formdata);
            
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
                console.error('編輯機構時發生錯誤，錯誤訊息：' + error);
                $('#modal_error').css({'display':'flex'});
                $('#modal_spinner').css({'display':'none'});
                $('#modal_msg').html('發生錯誤<br>錯誤訊息：' + error + '<br>');
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