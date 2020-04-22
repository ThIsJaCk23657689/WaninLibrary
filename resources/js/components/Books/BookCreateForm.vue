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
        
        <form id="book_create_form" method="POST" :action="BooksStoreURL" style="display:none;">

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="add_type">入庫方式</label>
                        <select id="add_type" name="add_type" class="form-control">
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

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="status">狀態</label>
                        <select id="status" name="status" class="form-control" readonly>
                            <option value="4">庫藏待上架</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="count">借閱次數</label>
                        <input id="count" name="count" type="text" class="form-control" value="0" readonly autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="form-group">
                        <div id="preview-upload" class="col-md-12">
                            <img id="previewImg-upload" class="img-fluid rounded" :src="uploadimg">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="picture" class="mb-2">
                            商品圖片
                        </label>
                        <div class="custom-file">
                            <input type="file" id="picture" name="picture" class="custom-file-input" accept="image/jpeg,image/png,image/bmp" aria-describedby="PictureHelp">
                            <small id="PictureHelp" class="form-text text-muted">僅支援JPG、JPEG、PNG與BMP格式圖片，且檔案大小上限為20MB。</small>
                            <label class="custom-file-label" for="picture">請選擇檔案</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="row">
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="data_resource">資料來源</label>
                                <select id="data_resource" name="data_resource" class="form-control">
                                    <option value="1">全新的書籍資料</option>
                                    <option value="2">已在庫藏內的書籍資料</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="bugurl">爬蟲網址</label>
                                <input id="bugurl" name="bugurl" type="text" class="form-control" value="" autocomplete="off">
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

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="published_year">出版年份</label>
                                <input id="published_year" name="published_year" type="text" class="form-control" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="published_month">出版月份</label>
                                <select id="published_month" name="published_month" class="form-control">
                                    <option value="">請選擇...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input id="isbn" name="isbn" type="text" class="form-control" value="" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="callnum">索書號</label>
                                <input id="callnum" name="callnum" type="text" class="form-control" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">總類</label>
                                <select id="category" name="category" class="form-control">
                                    <option value="">請選擇...</option>
                                    <option value="0">000 總類</option>
                                    <option value="1">100 哲學類</option>
                                    <option value="2">200 宗教類</option>
                                    <option value="3">300 科學類</option>
                                    <option value="4">400 應用科學類</option>
                                    <option value="5">500 社會學類</option>
                                    <option value="6">600 史地類</option>
                                    <option value="7">610 中國史地類</option>
                                    <option value="8">710 世界史地類</option>
                                    <option value="9">800 語文文學類</option>
                                    <option value="10">900 藝術類</option>
                                </select>
                            </div>
                        </div>
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
        }
    },
    methods: {
        
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

        // 圖片上傳
        $('#picture').change(function(){
            let input = $(this)[0];
            readURL(input);
        });

        // 預覽圖生成
        function readURL(input) {
            if (input.files && input.files[0]) {
                $('#preview-upload').fadeIn();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImg-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // 捐贈人
        $('#donor_id').selectpicker({
            liveSearch: true
        });

        // 入庫方式
        $('#add_type').change(function(){
            let x = $(this).val();
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
        });

        // ISBN查詢 (Google Book API) 9789865003913
        // $('#isbn').change(function(){
        //     if($(this).val().length != 13 && $(this).val().length != 10){
        //         alert('請輸入正確的ISBN格式');
        //         $(this).val('');
        //     }else{
        //         let backendURL = $('#backendURL').html();

        //         $('#modal_good').css({'display':'none'});
        //         $('#modal_error').css({'display':'none'});
        //         $('#modal_spinner').slideDown();
        //         $('#modal_msg').html('請稍等...');
        //         $('#modal_link').slideUp();
        //         $('#modal_close').slideUp();
        //         $('#LoadingModal').modal('show');
        //         axios.get(backendURL + '/books/isbn/' + $(this).val() + '/google').then(response => {
        //             if(response.data.result.totalItems == 0){
        //                 $('#modal_error').css({'display':'flex'});
        //                 $('#modal_spinner').css({'display':'none'});
        //                 $('#modal_msg').html('很抱歉無法透過ISBN獲取資料');
        //                 $('#modal_close').slideDown();
        //             }else{
        //                 $('#LoadingModal').modal('hide');
        //                 let $bookInfo = response.data.result.items[0].volumeInfo;
        //                 $('#title').val($bookInfo.title);
        //                 $('#subtitle').val($bookInfo.subtitle);
        //                 $('#author').val($bookInfo.authors);
        //                 $('#publisher').val($bookInfo.publisher);
        //                 $('#published_year').val($bookInfo.publishedDate);
        //             }
        //         }).catch((error) => {
        //             console.error('透過ISBN抓取資料時發生錯誤，錯誤訊息：' + error);
        //             $('#modal_error').css({'display':'flex'});
        //             $('#modal_spinner').css({'display':'none'});
        //             $('#modal_msg').html('透過ISBN抓取資料時發生錯誤<br>錯誤訊息：' + error + '<br>');
        //             $('#modal_close').slideDown();

        //             let $key = Object.keys(error.response.data.errors);
        //             $key.forEach(function(item, index){
        //                 $('#modal_msg').append(error.response.data.errors[item]+ '<br>');
        //                 $('#' + item).addClass('is-invalid');
        //             });
        //         });
        //     }
        // });

        $('#bugurl').change(function(){
            if(false){
                alert('請輸入正確的網頁格式');
                $(this).val('');
            }else{
                let BooksBugURL = $('#BooksBugURL').html();
                let data = $(this).serializeObject();

                $('#modal_good').css({'display':'none'});
                $('#modal_error').css({'display':'none'});
                $('#modal_spinner').slideDown();
                $('#modal_msg').html('請稍等...');
                $('#modal_link').slideUp();
                $('#modal_close').slideUp();
                $('#LoadingModal').modal('show');
                axios.post(BooksBugURL, data).then(response => {
                    console.log(response.data.data);
                    let $bookInfo = response.data.data;
                    if($bookInfo == null){
                        
                    }else{
                        $('#LoadingModal').modal('hide');
                        $('#title').val($bookInfo.title);
                        $('#subtitle').val($bookInfo.subtitle);
                        $('#author').val($bookInfo.author);
                        $('#isbn').val($bookInfo.ISBN);
                        $('#publisher').val($bookInfo.publisher);
                        $('#published_year').val($bookInfo.published_date);
                        $('#edition').val($bookInfo.edition);
                        $('#callnum').val($bookInfo.callnum);
                        $('#language').val($bookInfo.language);
                        if($bookInfo.cover_img != null && $bookInfo.cover_img != ''){
                            $('#previewImg-upload').attr('src', $bookInfo.cover_img);
                        }
                        alert($bookInfo.cover_img);
                    }
                    // if(response.data.result.totalItems == 0){
                    //     $('#modal_error').css({'display':'flex'});
                    //     $('#modal_spinner').css({'display':'none'});
                    //     $('#modal_msg').html('很抱歉無法透過ISBN獲取資料');
                    //     $('#modal_close').slideDown();
                    // }else{
                    //     $('#LoadingModal').modal('hide');
                    //     

                    // }
                }).catch((error) => {
                    console.error('爬蟲時發生錯誤，錯誤訊息：' + error);
                    $('#modal_error').css({'display':'flex'});
                    $('#modal_spinner').css({'display':'none'});
                    $('#modal_msg').html('透爬蟲時發生錯誤<br>錯誤訊息：' + error + '<br>');
                    $('#modal_close').slideDown();
                });
            }
        });

        $('#book_create_form').submit(function(e){
            e.preventDefault();

            let url = $(this).attr('action');
            let data = $(this).serializeObject();
            
            $('#modal_good').css({'display':'none'});
            $('#modal_error').css({'display':'none'});
            $('#modal_spinner').slideDown();
            $('#modal_msg').html('請稍等...');
            $('#modal_link').slideUp();
            $('#modal_close').slideUp();
            $('#LoadingModal').modal('show');
            axios.post(url, data).then(response => {
                $('#modal_good').css({'display':'flex'});
                $('#modal_spinner').css({'display':'none'});
                $('#modal_msg').html('新增成功');
                $('#modal_link').attr('href', response.data.url);
                $('#modal_link').slideDown();
            }).catch((error) => {
                console.error('新增借閱人時發生錯誤，錯誤訊息：' + error);
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
    },
}
</script>

<style>

</style>