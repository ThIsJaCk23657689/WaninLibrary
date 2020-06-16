<template>
<div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" id="donor_update_form" action="#" @submit.prevent="donorUpdateForm">
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">
                                <span class="text-danger mr-2">*</span>姓名
                            </label>
                            <input id="name" name="name" type="text" class="form-control mb-2" v-model="donor.name" required autofocus>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tel">電話</label>
                            <input id="tel" name="tel" type="text" class="form-control" v-model="donor.tel" >
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cellphone">行動電話</label>
                            <input id="cellphone" name="cellphone" type="text" class="form-control" v-model="donor.cellphone">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="birthday">生日</label>
                            <input id="birthday" name="birthday" type="text" class="form-control" v-model="donor.birthday">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exposure">
                                <span class="text-danger mr-2">*</span>曝光程度
                            </label>
                            <select name="exposure" id="exposure" class="form-control" v-bind:value = "donor.exposure">
                                <option value="1">完全公開</option>
                                <option value="2">半公開</option>
                                <option value="3">對外匿名</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">信箱</label>
                            <input id="email" name="email" type="email" class="form-control mb-2" v-model="donor.email" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="content">備註內容</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="3" v-model="donor.content"></textarea>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div id="address_twzipcode" class="form-group">
                            <label>地址</label>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <div data-role="county" data-style="form-control" data-name="address_county" :data-value="donor.address_county"></div>
                                </div>
                                <div class="col-md-4">
                                    <div data-role="district" data-style="form-control" data-name="address_district" :data-value="donor.address_district"></div>
                                </div>
                                <div class="col-md-4">
                                    <div data-role="zipcode" data-style="form-control" data-name="address_zipcode" :data-value="donor.address_zipcode"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="address_others" type="text" class="form-control" name="address_others" v-model="donor.address_others">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-block btn-success">
                            確認修改
                        </button>
                        <a :href="DonorsIndexURL" class="btn btn-block btn-danger">
                            返回列表
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
    props: ['donor'],
    data(){
        return {
            DonorsIndexURL: $('#DonorsIndexURL').html(),
            DonorsUpdateURL: $('#DonorsUpdateURL').html(),
        }
    },
    methods: {
        donorUpdateForm(e) {
            let url = this.DonorsUpdateURL;
            let data = $(e.target).serializeObject();

            this.$refs.loadingModal.initalModal();
            axios.patch(url, data).then(response => {
                this.$refs.loadingModal.successfulResponse('編輯成功', response.data.url);
            }).catch((error) => {
                console.error('編輯借閱人時發生錯誤，錯誤訊息：' + error);
                this.$refs.loadingModal.failureResponse(error);
            });
        }
    },
    created(){

    },
    mounted(){
        // 地址
        // $('#address_twzipcode').twzipcode({
        //     'readonly': false
        // });

    }
}
</script>

<style>
</style>
