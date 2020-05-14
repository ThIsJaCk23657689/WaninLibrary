<template>
<div class="row justify-content-center">
    <div class="col-md-10">

        <div id="step1" class="row">
            <div class="col-md-12 mb-2">
                <h4>1. 書本類型</h4>
                <small>請先選擇欲要創建書本的類型</small>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <button id="book_btn" type="button" class="btn btn-block btn-info">
                        <i class="fas fa-user-tie mr-2"></i>
                        一般書籍(有ISBN)
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <button id="paper_btn" type="button" class="btn btn-block btn-info">
                        <i class="far fa-building mr-2"></i>
                        論文、期刊、雜誌等(無ISBN)
                    </button>
                </div>
            </div>
        </div>

        <div id="goback2step1" class="row" style="display: none;">
            <div class="col-md-12">
                <div class="form-group">
                    <button id="goback2step1_btn" type="button" class="btn btn-block btn-secondary">
                        <i class="fas fa-undo-alt mr-2"></i>
                        重新選擇書本類型
                    </button>
                </div>
            </div>
        </div>
        
        <form id="book_create_form" method="POST" :action="BooksStoreURL" enctype="multipart/form-data" style="display:none;" @submit.prevent="bookCreateForm">

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="add_type">入庫方式</label>
                        <select id="add_type" name="add_type" class="form-control" @change="changeAddType">
                            <option value="1" selected>捐贈入庫</option>
                            <option value="2">購買入庫</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="donor_id"><span id="donor_id_required_star" class="text-danger mr-2">*</span>捐贈人</label>
                        <select id="donor_id" name="donor_id" class="form-control">
                            <option value="0">請選擇...</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="price"><span id="price_required_star" class="text-danger mr-2" style="display:none;">*</span>價格</label>
                        <input id="price" name="price" type="text" class="form-control" value="0" autocomplete="off" disabled>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status">狀態</label>
                        <select id="status" name="status" class="form-control" disabled>
                            <option value="4">庫藏待上架</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 text-center">
                    <upload-images ref="uploadBookImages" :uploadimg="uploadimg" :title="title"></upload-images>
                </div>

                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="bugurl">爬蟲網址</label>
                                <a href="http://metadata.ncl.edu.tw/blstkmc/blstkm#tudorkmtop" target="_blank">爬蟲網址</a>
                                <input id="bugurl" name="bugurl" type="text" class="form-control" value="" autocomplete="off" @change="getBookDataFromWeb">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">
                                    <span class="text-danger mr-2">*</span>書名（主標題）
                                </label>
                                <input id="title" name="title" type="text" class="form-control" value="" required autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="subtitle">副標題</label>
                                <input id="subtitle" name="subtitle" type="text" class="form-control" value="" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="author">作者</label>
                                <input id="author" name="author" type="text" class="form-control" value="" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="translator">譯者</label>
                                <input id="translator" name="translator" type="text" class="form-control" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="language">語言</label>
                                <input id="language" name="language" type="text" class="form-control" value="" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="publisher">出版商</label>
                                <input id="publisher" name="publisher" type="text" class="form-control" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="edition">版次</label>
                                <input id="edition" name="edition" type="text" class="form-control" value="" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="published_date">出版日期</label>
                        <input id="published_date" name="published_date" type="text" class="form-control" value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input id="isbn" name="isbn" type="text" class="form-control" value="" autocomplete="off">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="callnum">
                            <span class="text-danger mr-2">*</span>索書號
                        </label>
                        <input id="callnum" name="callnum" type="text" class="form-control" value="" autocomplete="off" @input="updateCategory">
                        <span id="callnum_error" class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="category">圖書類別</label>
                        <select id="category" name="category" class="form-control" disabled>
                            <option v-for="option in category_options" :key="option.id" :value="option.id">{{ option.text }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="content">備註內容</label>
                        <textarea name="content" id="content" class="form-control" cols="30" rows="3"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-block btn-primary">
                        確認新增
                    </button>
                    <a :href="BooksIndexURL" class="btn btn-block btn-danger">
                        返回列表
                    </a>
                </div>
            </div>

        </form>

        <form id="papper_create_form" method="POST" :action="BooksStoreURL" style="display:none;">

        </form>
    </div>
</div>
</template>

<script>
export default {
    props: ['uploadimg'],
    data(){
        return {
            BooksIndexURL: $('#BooksIndexURL').html(),
            BooksStoreURL: $('#BooksStoreURL').html(),
            FormErrorsMsg: [],
            donors: [],
            title: '書本圖片',
            category_options: [
                {id: null, text: '請選擇...'},
                {id: 0, text: '000 總類'},
                {id: 1, text: '100 哲學類'},
                {id: 2, text: '200 宗教類'},
                {id: 3, text: '300 科學類'},
                {id: 4, text: '400 應用科學類'},
                {id: 5, text: '500 社會學類'},
                {id: 6, text: '600 史地類'},
                {id: 7, text: '610 中國史地類'},
                {id: 8, text: '710 世界史地類'},
                {id: 9, text: '800 語文文學類'},
                {id: 10, text: '900 藝術類'},
                {id: 11, text: '1100 論文類'},
                {id: 12, text: '1200 雜誌類'},
                {id: 13, text: '1300 外文圖書'},
            ],

            bookInfo: [],
        }
    },
    methods: {
        changeAddType(e){
            // 更動入庫方式
            let x = $(e.target).val();
            if(x == '1'){
                // 捐贈入庫
                $('#donor_id').prop('disabled', false).selectpicker('refresh');
                $('#donor_id_required_star').fadeIn();

                $('#price').val('0').prop('disabled', true).attr('required', false);
                $('#price_required_star').fadeOut();
            }else{
                // 購滿入庫
                $('#donor_id').prop('disabled', true).selectpicker('refresh');
                $('#donor_id_required_star').fadeOut();

                $('#price').val('0').prop('disabled', false).attr('required', true);
                $('#price_required_star').fadeIn();
            }
        },
        updateCategory(e){
            let $callNum = $('#callnum').val();
            if($callNum.length >= 3 && Number.isInteger(parseInt($callNum[0] + $callNum[1] + $callNum[2]))){
                $('#callnum').removeClass('is-invalid');
                if($callNum[0] < 6){
                    // 前面6類，可以靠索書號第一碼來判斷。
                    $('#category').val($callNum[0]);
                }else{
                    // 第六類到第七類，必須還要再看第二碼。
                    if($callNum[0] == 6){
                        if($callNum[1] == 0){
                            $('#category').val(6);
                        }else{
                            $('#category').val(7);
                        }
                    }else{
                        if($callNum[0] == 7){
                            if($callNum[1] == 0){
                                $('#category').val(7);
                            }else{
                                $('#category').val(8);
                            }
                        }else{
                            $('#category').val(parseInt($callNum[0]) + 1);
                        }
                    }
                }
            }else{
                $('#callnum').addClass('is-invalid');
                $('#callnum_error').html('<strong>索書號至少要三碼以上且為數字。</strong>');
            }
        },
        getBookDataFromWeb(e){
            let $url = $(e.target).val();
            if($url){
                if(!$.isUrl($url)){
                    $.showErrorModalWithoutError('請輸入正確的網頁格式。');
                    $(e.target).val('');
                }else{
                    let parser = document.createElement('a');
                    parser.href = $url;
                    if(parser.hostname == 'metadata.ncl.edu.tw'){
                        // 代表發送的是 台灣書目整合查詢系統
                        let BooksBugURL = $('#BooksBugURL').html();
                        let data = $(e.target).serializeObject();

                        $.showLoadingModal();
                        axios.post(BooksBugURL, data).then(response => {
                            console.log(response.data.data);
                            this.bookInfo = response.data.data;
                            if(this.bookInfo == null){
                                
                            }else{
                                $.closeModal();
                                this.keyBookDataInForm();
                            }
                        }).catch((error) => {
                            console.error('爬蟲時發生錯誤，錯誤訊息：' + error);
                            $.showErrorModal(error);
                        });
                    }else{
                        $.showErrorModalWithoutError('目前爬蟲僅支援台灣書目整合查詢系統網站。');
                        $(e.target).val('');
                    }
                }
            }
        },
        keyBookDataInForm(){
            $('#title').val(this.bookInfo.title);
            $('#subtitle').val(this.bookInfo.subtitle);
            $('#author').val(this.bookInfo.author);
            $('#isbn').val(this.bookInfo.ISBN);
            $('#publisher').val(this.bookInfo.publisher);
            $('#published_date').val(this.bookInfo.published_date);
            $('#edition').val(this.bookInfo.edition);
            $('#language').val(this.bookInfo.language);

            if(this.bookInfo.language != '中文'){
                // 此書籍是外文，索書號會抓取【杜威碼】
                $('#callnum').val(this.bookInfo.Dewey_callnum);
                            
                // 種類選項強制鎖定13
                $('#category').val(13);
            }else{
                $('#callnum').val(this.bookInfo.callnum);
                this.updateCategory();
            }
                        
            // 爬蟲抓圖片網址
            let $cover_img_name = this.bookInfo.cover_img.split('/').pop();
            if(this.bookInfo.cover_img != null && this.bookInfo.cover_img != '' && $cover_img_name != 'qrcode.png'){
                this.$refs.uploadBookImages.uploadURLImage(this.bookInfo.cover_img);
            }else{
                console.log('Cover Images URL:' + this.bookInfo.cover_img);
            }
        },
        bookCreateForm(e){
            // 如果 file 沒有值時，請重新選擇圖片。
            // if(!$('#image_file').val()){
            //     $.showErrorModalWithoutError('請重新選擇圖片。');
            //     return false;
            // }

            let url = $(e.target).attr('action');
            // let data = $(e.target).serializeObject();

            // formdata 是不可以被console.log的，只會回傳空object。
            $('#category').attr('disabled', false);
            let formdata = new FormData($(e.target)[0]);
            // Object.keys(data).forEach(
            //     key => formdata.append(key, data[key])
            // );
            // formdata.append('image_file', $('#image_file')[0].files[0]);
            
            $.showLoadingModal();
            axios.post(url, formdata, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(response => {
                // this.$refs.uploadBookImages.stopCropper();
                $.showSuccessModal('新增成功', response.data.url, '檢視書籍');
            }).catch(error => {
                console.error('新增書本時發生錯誤，錯誤訊息：' + error);
                $.showErrorModal(error);
            });
            $('#category').attr('disabled', true);
        }
    },
    created(){
        let DonorsListURL = $('#DonorsListURL').html();
        axios.get(DonorsListURL).then(response => {
            this.donors = response.data.donors;
            for(let i = 0; i < this.donors.length; i++){
                $("#donor_id").append($("<option></option>").attr("value", this.donors[i].id).text(this.donors[i].name));
            }
            $('#donor_id').selectpicker('refresh');
        });
    },
    mounted(){
        $('#book_btn').click(function(e){
            $('#book_create_form').slideDown();
            $('#book_btn').attr('disabled', true);
            $('#paper_btn').attr('disabled', true);
            $('#step1').slideUp();
            $('#goback2step1').slideDown();
            $('#add_type').focus();
        });

        $('#paper_btn').click(function(e){
            $('#papper_create_form').slideDown();
            $('#book_btn').attr('disabled', true);
            $('#paper_btn').attr('disabled', true);
            $('#step1').slideUp();
            $('#goback2step1').slideDown();
        });

        $('#goback2step1_btn').click(function(e){
            $('#book_create_form').slideUp();
            $('#papper_create_form').slideUp();
            $('#book_btn').attr('disabled', false);
            $('#paper_btn').attr('disabled', false);
            $('#step1').slideDown();
            $('#goback2step1').slideUp();
        });

        // 捐贈人
        $('#donor_id').selectpicker({
            liveSearch: true
        });
    },
}
</script>

<style>

</style>