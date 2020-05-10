<template>
<div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" id="circulation_index_form" action="#" @submit.prevent="circulationIndexForm">
                
                <div id="step1" class="row">
                    <div class="col-md-12 mb-2">
                        <h4>1. 請掃描書本條碼或自行輸入書本條碼號</h4>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="barcode">
                                <span class="text-danger mr-2">*</span>書本條碼
                            </label>
                            <input id="barcode" name="barcode" type="text" class="form-control mb-2" value="" required autocomplete="off" autofocus @change="getBookDataByBarcode">
                            <span id="barcode_error" class="invalid-feedback" role="alert"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">書名</label>
                            <input id="title" name="title" type="text" class="form-control mb-2" :value="this.book.title" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="author">作者</label>
                            <input id="author" name="author" type="text" class="form-control mb-2" :value="this.book.author" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="publisher">出版商</label>
                            <input id="publisher" name="publisher" type="text" class="form-control mb-2" :value="this.book.publisher" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="callnum">索書號</label>
                            <input id="callnum" name="callnum" type="text" class="form-control mb-2" :value="this.book.callnum" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="count">借閱次數</label>
                            <input id="count" name="count" type="text" class="form-control mb-2" :value="this.book.count" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="donor">捐贈人</label>
                            <input id="donor" name="donor" type="text" class="form-control mb-2" :value="this.book.donorName" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">狀態</label>
                            <input id="status" name="status" type="text" class="form-control mb-2" :value="this.book.showStatus" readonly>
                        </div>
                    </div>
                </div>

                <hr>

                <div id="step2" class="row">
                    <div class="col-md-12 mb-2">
                        <h4>2. 請選擇借閱人</h4>
                        <small>請輸入姓名、電話或生日來找尋借閱人</small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">姓名</label>
                            <input id="name" name="name" type="text" class="form-control mb-2" value="" @change="searchBorrower">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tel">電話</label>
                            <input id="tel" name="tel" type="text" class="form-control mb-2" value="" @change="searchBorrower">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="birthday">生日</label>
                            <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" @change="searchBorrower">
                        </div>
                    </div>
                </div>

                <div class="row">
                </div>

                <hr>

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
                            確認
                        </button>
                        <a :href="CirculationIndexURL" class="btn btn-block btn-danger">
                            取消
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
    props: [],
    data(){
        return {
            CirculationIndexURL: $('#CirculationIndexURL').html(),
            GetBooksDataByBarcodeURL: $('#GetBooksDataByBarcodeURL').html(),
            book: [],
        }
    },
    methods: {
        getBookDataByBarcode(e) {
            $(e.target).removeClass('is-invalid');

            let $value = e.target.value;
            var patt = /^[0-9]{13}$/;
            if(patt.test($value)){
                 axios.get(this.GetBooksDataByBarcodeURL, {
                    params: {
                        barcode: $value
                    }
                }).then(response => {
                    if(response.data.book == null || response.data.book == []){
                        $(e.target).addClass('is-invalid');
                        $('#barcode_error').html('<strong>查無此書本，請檢查條碼是否有誤。</strong>');
                        this.book = [];
                    }else{
                        this.book = response.data.book;
                    }
                }).catch(error => {
                    console.log('發生錯誤！<br>錯誤訊息：' + error.response.data.message);

                    if(error.response.data.errors == null){
                        $(e.target).addClass('is-invalid');
                        alert('錯誤訊息：' + error.response.data.message + '\n請聯絡系統設計師處理。');
                    }else{
                        let $key = Object.keys(error.response.data.errors);
                        $key.forEach(function(item, index){
                            $('#' + item).addClass('is-invalid');
                            $('#' + item + '_error').html('<strong>'+ error.response.data.errors[item] + '</strong>');
                        });
                    }
                });
            }else{
                $(e.target).addClass('is-invalid');
                $('#barcode_error').html('<strong>請輸入正確格式的書本條碼。</strong>');
            }
        },

        searchBorrower(e){
            let $name = $('#name').val();
            let $tel = $('#tel').val();
            let $birthday = $('#birthday').val();

            console.log({$name, $tel, $birthday});
        }
    },
    created(){

    },
    mounted(){

    },
}
</script>

<style>

</style>