<template>
<div class="modal fade bd-example-modal-lg" id="CreateAgencyModal" tabindex="-1" role="dialog" aria-labelledby="CreateAgencyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CreateAgencyModalModalLabel">新增隸屬單位</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="CreateAgencyModalForm" action="#" method="POST" @submit.prevent="storeAgency">

                        <div class="form-group row">
                            <label for="agency_name" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span>
                                單位名稱
                            </label>

                            <div class="col-md-6">
                                <input id="agency_name" type="text" class="form-control" name="name" required autocomplete="off" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="agency_tel" class="col-md-4 col-form-label text-md-right">電話</label>

                            <div class="col-md-6">
                                <input id="agency_tel" type="text" class="form-control" name="tel" placeholder="例：0422115687 或 0912312312" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="agency_principal" class="col-md-4 col-form-label text-md-right">負責人/單位聯絡窗口</label>

                            <div class="col-md-6">
                                <input id="agency_principal" type="text" class="form-control" name="principal" autocomplete="off">
                            </div>
                        </div>

                        <div id="agency_address_twzipcode" class="form-group">
                            <div class="form-group row">
                                <label for="agency_address_others" class="col-md-4 col-form-label text-md-right">地址</label>

                                <div class="col-md-3">
                                    <div data-role="county" data-style="form-control" data-name="address_county" data-value=""></div>
                                </div>
                                <div class="col-md-3">
                                    <div data-role="district" data-style="form-control" data-name="address_district" data-value=""></div>
                                </div>
                                <div class="col-md-2">
                                    <div data-role="zipcode" data-style="form-control" data-name="address_zipcode" data-value=""></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-md-4 col-md-8">
                                    <input id="agency_address_others" type="text" class="form-control" name="address_others" value="" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="agency_content" class="col-md-4 col-form-label text-md-right">備註</label>

                            <div class="col-md-6">
                                <textarea id="agency_content" name="content" class="form-control" cols="30" rows="3"></textarea>
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
            AgenciesStoreURL: $('#AgenciesStoreURL').text(),
        }
    },
    methods: {
        storeAgency(e){
            let url = this.AgenciesStoreURL;
            let data = $(e.target).serializeObject();

            $.showLoadingModal();
            axios.post(url, data).then(response => {
                // $('#CreateAgencyModal').modal('hide');
                $.showSuccessModal('新增成功');
                $('#CreateAgencyModalForm').trigger('reset');
                this.$emit('refresh-agency', response.data.added_id);
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
        $('#agency_address_twzipcode').twzipcode({
            'readonly': false
        });
    }
}
</script>

<style>
</style>
