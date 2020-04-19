<template>
<div class="row justify-content-center">
    <div class="col-md-8">

        <div id="step1" class="row">
            <div class="col-md-12 mb-2">
                <h4>1. 書本類型</h4>
                <small>請先選擇欲要創建書本的類型</small>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <button id="individual_btn" type="button" class="btn btn-block btn-info">
                        <i class="fas fa-user-tie mr-2"></i>
                        一般書籍(有ISBN)
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <button id="company_btn" type="button" class="btn btn-block btn-info">
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
        
        <form method="POST" id="book_create_form" :action="BooksStoreURL">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">
                            <span class="text-danger mr-2">*</span>書本名稱
                        </label>
                        <input id="name" name="name" type="text" class="form-control mb-2" value="" required autocomplete="off" autofocus>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday"><span class="text-danger mr-2">*</span>副標題</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" required autocomplete="off" placeholder="例：1950-01-01">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday"><span class="text-danger mr-2">*</span>作者</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" required autocomplete="off" placeholder="例：1950-01-01">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday"><span class="text-danger mr-2">*</span>譯者</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" required autocomplete="off" placeholder="例：1950-01-01">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday"><span class="text-danger mr-2">*</span>出版商</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" required autocomplete="off" placeholder="例：1950-01-01">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday"><span class="text-danger mr-2">*</span>版次</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" required autocomplete="off" placeholder="例：1950-01-01">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday"><span class="text-danger mr-2">*</span>圖片</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" required autocomplete="off" placeholder="例：1950-01-01">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday"><span class="text-danger mr-2">*</span>ISBN</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" required autocomplete="off" placeholder="例：1950-01-01">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday"><span class="text-danger mr-2">*</span>出版年</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" required autocomplete="off" placeholder="例：1950-01-01">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday"><span class="text-danger mr-2">*</span>備註</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" required autocomplete="off" placeholder="例：1950-01-01">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tel"><span class="text-danger mr-2">*</span>入庫方式</label>
                        <input id="tel" name="tel" type="text" class="form-control mb-2" value="" required autocomplete="off">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday"><span class="text-danger mr-2">*</span>捐贈人</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" required autocomplete="off" placeholder="例：1950-01-01">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday"><span class="text-danger mr-2">*</span>花費</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" required autocomplete="off" placeholder="例：1950-01-01">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday"><span class="text-danger mr-2">*</span>索書號</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" required autocomplete="off" placeholder="例：1950-01-01">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday"><span class="text-danger mr-2">*</span>總類</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" required autocomplete="off" placeholder="例：1950-01-01">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday"><span class="text-danger mr-2">*</span>狀態</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" required autocomplete="off" placeholder="例：1950-01-01">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday"><span class="text-danger mr-2">*</span>捐贈人</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" required autocomplete="off" placeholder="例：1950-01-01">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday"><span class="text-danger mr-2">*</span>借閱次數</label>
                        <input id="birthday" name="birthday" type="text" class="form-control mb-2" value="" required autocomplete="off" placeholder="例：1950-01-01">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status">
                            <span class="text-danger mr-2">*</span>身分別
                        </label>
                        <select name="status" id="status" class="form-control">
                            <option value="">請選擇...</option>
                            <option value="0">一般民眾</option>
                            <option value="1">具有社輔資格</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="agency_id">隸屬單位</label>
                        <select id="agency_id" name="agency_id" class="form-control">
                            <option value="0">請選擇...</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="job_title">職稱</label>
                        <input id="job_title" name="job_title" type="text" class="form-control mb-2" value="" autocomplete="off">
                    </div>
                </div>                
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">信箱</label>
                        <input id="email" name="email" type="email" class="form-control" value="" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="content">備註內容</label>
                        <textarea name="content" id="content" class="form-control" cols="30" rows="3"></textarea>
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
    </div>
</div>
</template>

<script>
export default {
    data(){
        return {
            BooksIndexURL: $('#BooksIndexURL').html(),
            BooksStoreURL: $('#BooksStoreURL').html(),
            FormErrorsMsg: [],
            agencies: [],
        }
    },
    methods: {
        
    },
    created(){
        let AgenciesListURL = $('#AgenciesListURL').html();
        axios.get(AgenciesListURL).then(response => {
            this.agencies = response.data.agencies;
            for(let i = 0; i < this.agencies.length; i++){
                $("#agency_id").append($("<option></option>").attr("value", this.agencies[i].id).text(this.agencies[i].name));
            }
            $('#agency_id').selectpicker('refresh');
        });
    },
    mounted(){
        // 地址
        $('#address_twzipcode').twzipcode({
            'readonly': true
        });

        // 生日
        $("#birthday").datepicker({
            dateFormat: 'yy-mm-dd',
            changeYear: true,
            changeMonth: true,
            yearRange: "-80:+0",
            maxDate: '-15y',
        });

        $('#agency_id').selectpicker({
            liveSearch: true
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