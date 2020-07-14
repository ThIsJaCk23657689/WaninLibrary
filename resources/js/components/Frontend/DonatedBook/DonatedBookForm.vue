<template>
<div class="row justify-content-center">
    <div class="col-md-8">
        <form method="POST" id="get_donated_book_form" action="#" @submit.prevent="getDonatedBookForm">
            <div class="form-group row search-input-row">
                <label for="donor_name" class="col-md-4 col-form-label text-md-right search-label">姓名</label>
                <div class="col-md-5">
                    <input id="donor_name" type="text" class="form-control search-input" name="donor_name" value="" required autocomplete="off" placeholder="請輸入姓名" autofocus>
                </div>
            </div>
            <div class="form-group row search-input-row">
                <label for="donor_tel" class="col-md-4 col-form-label text-md-right search-label">電話</label>
                <div class="col-md-5">
                    <input id="donor_tel" type="text" class="form-control search-input" name="donor_tel" value="" required autocomplete="off" placeholder="例：0912-312312" disabled>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <button id="SearchBtn" type="submit" class="btn search-btn">
                        查詢捐贈書籍
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
</template>

<script>
export default {
    props: [],
    data(){
        return {
            GetDonatedBooksURL: $('#GetDonatedBooksURL').text(),
        }
    },
    methods: {
        getDonatedBookForm(e) {
            let url = this.GetDonatedBooksURL;
            let data = $(e.target).serializeObject();

            axios.post(url, data).then(response => {
                console.log(response.data);
                location.href = response.data.url;
                // $.showSuccessModal('查詢成功', response.data.url);
            }).catch((error) => {
                // console.error(error);
                if (error.response.status == 422) {
                    $('#donor_tel').attr('disabled',false);
                    $.showWarningModal(error.response.data.message);
                }else{
                    $.showWarningModal(error.response.data.message);
                }

            });
        }

    },
    created(){

    },
    mounted(){

    }
}
</script>

<style>
</style>
