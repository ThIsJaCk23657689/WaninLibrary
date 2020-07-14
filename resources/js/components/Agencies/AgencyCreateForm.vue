<template>
<div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" id="agency_create_form" action="" @submit.prevent="agencyCreateForm">
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">
                                <span class="text-danger mr-2">*</span>單位名稱
                            </label>
                            <input id="name" name="name" type="text" class="form-control mb-2" value="" required autocomplete="off" autofocus @input="onChangeForName">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tel">電話</label>
                            <input id="tel" name="tel" type="text" class="form-control mb-2" value="" placeholder="例：0912-312312" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="principal">負責人/單位聯絡窗口</label>
                            <input id="principal" name="principal" type="text" class="form-control" value="" autocomplete="off">
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
                                    <input id="address_others" type="text" class="form-control" name="address_others" value="" autocomplete="off">
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
                        <button type="submit" class="btn btn-block btn-primary">
                            確認新增
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
            AgenciesIndexURL: $('#AgenciesIndexURL').html(),
            AgenciesStoreURL: $('#AgenciesStoreURL').html(),
            NameIsIniqueURL: $('#NameIsIniqueURL').html(),
        }
    },
    methods: {
        agencyCreateForm(e) {
            let url = this.AgenciesStoreURL;
            let data = $(e.target).serializeObject();

            $.showLoadingModal();
            axios.post(url, data).then(response => {
                $.showSuccessModal('新增成功', response.data.url);
            }).catch((error) => {
                console.error('新增單位時發生錯誤，錯誤訊息：' + error);
                $.showErrorModal(error);
            });
        },
        onChangeForName(e){
            this.checkName(e.target.value, this);
        },
        checkName: _.debounce((name, vm) => {
            axios.post(vm.NameIsIniqueURL, {
                name: name
            }).then(response => {
                console.log(response.data.message);
                if(!response.data.isUnique){
                   $.showWarningModal(response.data.message);
                }
            }).catch(error => {
                console.error('檢查單位名稱是否重複時發生錯誤，錯誤訊息：' + error);
                $.showErrorModal(error);
            });
        }, 750),
    },
    mounted(){
        // 地址
        $('#address_twzipcode').twzipcode({
            'readonly': false
        });
    }
}
</script>

<style>

</style>
