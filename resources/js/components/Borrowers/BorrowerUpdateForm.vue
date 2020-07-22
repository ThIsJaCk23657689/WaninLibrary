<template>
<div class="row justify-content-center">
    <div class="col-md-8">
        <form method="POST" id="borrower_update_form" action="#" @submit.prevent="borrowerUpdateForm">
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">
                            <span class="text-danger mr-2">*</span>姓名
                        </label>
                        <input id="name" name="name" type="text" class="form-control mb-2" v-model="borrower.name" required autofocus>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tel"><span class="text-danger mr-2">*</span>電話</label>
                        <input id="tel" name="tel" type="text" class="form-control" v-model="borrower.tel" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday">生日</label>
                        <input id="birthday" name="birthday" type="text" class="form-control" v-model="borrower.birthday">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status">
                            <span class="text-danger mr-2">*</span>身分別
                        </label>
                        <select name="status" id="status" class="form-control" v-bind:value = "borrower.status">
                            <option value="">請選擇...</option>
                            <option value="0">一般民眾</option>
                            <option value="1">符合社福資格</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="agency_id">隸屬單位</label>
                        <select id="agency_id" name="agency_id" class="form-control" v-bind:value = "borrower.agency_id">
                            <option value="0">請選擇...</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label style="color:white;">_______</label>
                        <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#CreateDonorModal">
                            <i class="fas fa-plus mr-2"></i>
                            新增隸屬單位
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div id="address_twzipcode" class="form-group">
                        <label>地址</label>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <div data-role="county" data-style="form-control" data-name="address_county" :data-value="borrower.address_county"></div>
                            </div>
                            <div class="col-md-4">
                                <div data-role="district" data-style="form-control" data-name="address_district" :data-value="borrower.address_district"></div>
                            </div>
                            <div class="col-md-4">
                                <div data-role="zipcode" data-style="form-control" data-name="address_zipcode" :data-value="borrower.address_zipcode"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input id="address_others" type="text" class="form-control" name="address_others" v-model="borrower.address_others">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="job_title">職稱</label>
                        <input id="job_title" name="job_title" type="text" class="form-control mb-2" v-model="borrower.job_title" autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">信箱</label>
                        <input id="email" name="email" type="email" class="form-control" v-model="borrower.email" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="content">備註內容</label>
                        <textarea name="content" id="content" class="form-control" cols="30" rows="3" v-model="borrower.content"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-block btn-success">
                        確認修改
                    </button>
                    <a :href="BorrowersIndexURL" class="btn btn-block btn-danger">
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
    props: ['borrower'],
    data(){
        return {
            BorrowersIndexURL: $('#BorrowersIndexURL').html(),
            BorrowersUpdateURL: $('#BorrowersUpdateURL').html(),
        }
    },
    methods: {
        borrowerUpdateForm(e) {
            let url = this.BorrowersUpdateURL;
            let data = $(e.target).serializeObject();

            $.showLoadingModal();
            axios.patch(url, data).then(response => {
                $.showSuccessModal('編輯成功', response.data.url);
            }).catch((error) => {
                console.error('編輯借閱人時發生錯誤，錯誤訊息：' + error);
                $.showErrorModal(error);
            });
        }
    },
    created(){

    },
    mounted(){
        // select agency
        $('#agency_id').selectpicker({
            liveSearch: true
        });

        $("#birthday").datepicker({
            dateFormat: 'yy-mm-dd',
            changeYear: true,
            changeMonth: true,
            yearRange: "-80:+0",
        });
    }
}
</script>

<style>
</style>
