<template>
<div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" id="agency_edit_form" action="#" @submit.prevent="agencyEditForm">
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">
                                <span class="text-danger mr-2">*</span>單位名稱
                            </label>
                            <input id="name" name="name" type="text" class="form-control mb-2" v-model="agency.name" required autocomplete="off" autofocus>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tel">電話</label>
                            <input id="tel" name="tel" type="text" class="form-control mb-2" v-model="agency.tel" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="principal">負責人/單位聯絡窗口</label>
                            <input id="principal" name="principal" type="text" class="form-control" v-model="agency.principal" autocomplete="off">
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
                                    <input id="address_others" type="text" class="form-control" name="address_others" v-model="agency.address_others" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="content">備註內容</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="5" v-model="agency.content"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-block btn-success">
                            確認編輯
                        </button>
                        <a :href="AgenciesIndexURL" class="btn btn-block btn-danger">
                            返回列表
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
    data(){
        return {
            agency: [],
            AgenciesIndexURL: $('#AgenciesIndexURL').html(),
            AgenciesUpdateURL: $('#AgenciesUpdateURL').html(),
        }
    },
    methods: {
        agencyEditForm(e) {
            let url = this.AgenciesUpdateURL;
            let data = $(e.target).serializeObject();

            $.showLoadingModal();
            axios.patch(url, data).then(response => {
                $.showSuccessModal('編輯成功', response.data.url);
            }).catch((error) => {
                console.error('編輯單位時發生錯誤，錯誤訊息：' + error);
                $.showErrorModal(error);
            });
        }
    },
    created(){
        let AgenciesGetOneURL = $('#AgenciesGetOneURL').html();
        $.showLoadingModal();
        axios.get(AgenciesGetOneURL).then(response => {
            this.agency = response.data.agency;

            // 地址
            $('#address_twzipcode').twzipcode({
                'zipcodeSel': response.data.agency.address_zipcode
            });
            $.closeModal();
        });
    },
    mounted(){

    }
}
</script>

<style>

</style>
