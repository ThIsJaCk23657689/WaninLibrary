<template>
<div class="modal fade bd-example-modal-lg" id="CreateDonorModal" tabindex="-1" role="dialog" aria-labelledby="CreateDonorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CreateDonorModalModalLabel">新增捐贈人(單位)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="CreateDonorModalForm" action="#" method="POST" @submit.prevent="storeDonor">

                        <div class="form-group row">
                            <label for="donor_name" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span>
                                捐贈人(單位)名稱
                            </label>

                            <div class="col-md-6">
                                <input id="donor_name" type="text" class="form-control" name="name" required autocomplete="off" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="donor_tel" class="col-md-4 col-form-label text-md-right">電話</label>

                            <div class="col-md-6">
                                <input id="donor_tel" type="text" class="form-control" name="tel" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="donor_cellphone" class="col-md-4 col-form-label text-md-right">行動電話</label>

                            <div class="col-md-6">
                                <input id="donor_cellphone" type="text" class="form-control" name="cellphone" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="donor_birthday" class="col-md-4 col-form-label text-md-right">生日</label>

                            <div class="col-md-6">
                                <input id="donor_birthday" type="text" class="form-control" name="birthday" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="donor_email" class="col-md-4 col-form-label text-md-right">信箱</label>

                            <div class="col-md-6">
                                <input id="donor_email" type="email" class="form-control" name="email" autocomplete="off">
                            </div>
                        </div>

                        <div id="address_twzipcode" class="form-group">
                            <div class="form-group row">
                                <label for="address_others" class="col-md-4 col-form-label text-md-right">地址</label>

                                <div class="col-md-2">
                                    <div data-role="county" data-style="form-control" data-name="address_county" data-value=""></div>
                                </div>
                                <div class="col-md-2">
                                    <div data-role="district" data-style="form-control" data-name="address_district" data-value=""></div>
                                </div>
                                <div class="col-md-2">
                                    <div data-role="zipcode" data-style="form-control" data-name="address_zipcode" data-value=""></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-md-4 col-md-6">
                                    <input id="address_others" type="text" class="form-control" name="address_others" value="" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="donor_exposure" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span>
                                曝光程度
                            </label>

                            <div class="col-md-6">
                                <select id="donor_exposure" class="form-control" name="exposure" required>
                                    <option value="1">完全公開</option>
                                    <option value="2">姓名保護</option>
                                    <option value="3">對外匿名</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="donor_content" class="col-md-4 col-form-label text-md-right">備註</label>

                            <div class="col-md-6">
                                <textarea id="donor_content" name="content" class="form-control" cols="30" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-block btn-primary">
                                    確認新增
                                </button>
                                <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">
                                    取消
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: [],
    data(){
        return {
            DonorsStoreURL: $('#DonorsStoreURL').text(),
        }
    },
    methods: {
        storeDonor(e){
            let url = this.DonorsStoreURL;
            let data = $(e.target).serializeObject();

            $.showLoadingModal();
            axios.post(url, data).then(response => {
                // $('#CreateDonorModal').modal('hide');
                $.showSuccessModal('新增成功');
                $('#CreateDonorModalForm').trigger('reset');
            }).catch((error) => {
                console.error('新增捐贈人時發生錯誤，錯誤訊息：' + error);
                $.showErrorModal(error);
            });
        }
    },
    created(){

    },
    mounted(){
        // 地址
        $('#address_twzipcode').twzipcode({
            'readonly': false
        });

        // 生日
        $("#donor_birthday").datepicker({
            dateFormat: 'yy-mm-dd',
            changeYear: true,
            changeMonth: true,
            yearRange: "-80:+0",
            maxDate: '-15y',
        });
    }
}
</script>

<style>
</style>
