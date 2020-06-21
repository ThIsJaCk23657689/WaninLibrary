<template>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div v-if="book.category < 11 || book.category === 13">
            <form id="book_update_form" method="POST" :action="BooksUpdateURL" enctype="multipart/form-data" @submit.prevent="bookUpdateForm">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="addType">入庫方式</label>
                            <select id="addType" name="addType" class="form-control" :value="addType" @change="changeAddType">
                                <option value="1">捐贈入庫</option>
                                <option value="2">採購入庫</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group" v-if="addType === 1">
                            <label>
                                <span class="text-danger mr-2">*</span>捐贈人(單位)名稱
                            </label>
                            <div id="donor_id_input" class="input-group mb-3">
                                <input type="text" class="form-control" :value="book.donor.name" readonly>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-dark" @click="startUpdate">編輯</button>
                                </div>
                            </div>
                            <div id="donor_id" style="display:none;">
                                <select-donor-custom ref="DonorsOption" :placeholder="'請輸入捐贈人(單位)名稱名稱'" @search="onSearch" @update-value="updateValue"></select-donor-custom>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group" v-if="addType === 2">
                            <label for="price">
                                <span class="text-danger mr-2">*</span>價格
                            </label>
                            <input id="price" name="price" type="text" class="form-control" v-model="book.price">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">狀態</label>
                            <select id="status" name="status" class="form-control" :value="book.status">
                                <option v-for="option in statusOptions" :key="option.id" :value="option.id">{{ option.text }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row" v-if="addType === 1">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>捐贈人電話</label>
                            <input class="form-control" type="text" :value="current_donor.tel || '無'" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>捐贈人手機</label>
                            <input class="form-control" type="text" :value="current_donor.phone || '無'" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>捐贈人生日</label>
                            <input class="form-control" type="text" :value="current_donor.birthday || '無'" readonly>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6 text-center">
                        <upload-images ref="uploadBookImages" :uploadimg="BooksCoverImageURL" :title="title" :aspect-ratio="15/21" :prefix="'book'"></upload-images>
                    </div>

                    <div class="col-md-6">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">
                                        <span class="text-danger mr-2">*</span>書名（主標題）
                                    </label>
                                    <input id="title" name="title" type="text" class="form-control" v-model="book.title" required autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="subtitle">副標題</label>
                                    <input id="subtitle" name="subtitle" type="text" class="form-control" v-model="book.subtitle" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="author">作者</label>
                                    <input id="author" name="author" type="text" class="form-control" v-model="book.author" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="position">位置</label>
                                    <input id="position" name="position" type="text" class="form-control" v-model="book.position" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="translator">譯者</label>
                                    <input id="translator" name="translator" type="text" class="form-control" v-model="book.translator" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="language">語言</label>
                                    <input id="language" name="language" type="text" class="form-control" v-model="book.language" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="publisher">出版商</label>
                                    <input id="publisher" name="publisher" type="text" class="form-control" v-model="book.publisher" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="edition">版次</label>
                                    <input id="edition" name="edition" type="text" class="form-control" v-model="book.edition" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="published_date">出版日期</label>
                            <input id="published_date" name="published_date" type="text" class="form-control" v-model="book.published_date" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input id="isbn" name="isbn" type="text" class="form-control" v-model="book.isbn" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="callnum">
                                <span class="text-danger mr-2">*</span>分類號
                            </label>
                            <input id="callnum" name="callnum" type="text" class="form-control" v-model="book.callnum" autocomplete="off" @input="updateCategory">
                            <span id="callnum_error" class="invalid-feedback" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="category">圖書類別</label>
                            <select id="category" name="category" class="form-control" v-bind:value="book.category" disabled>
                                <option v-for="option in category_options" :key="option.id" :value="option.id">{{ option.text }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="content">備註內容</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="3" v-model="book.content"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-block btn-primary">
                            確認修改
                        </button>
                        <a :href="BooksIndexURL" class="btn btn-block btn-danger">
                            返回列表
                        </a>
                    </div>
                </div>

            </form>
        </div>
        <div v-else>
            <form id="book_update_form" method="POST" :action="BooksUpdateURL" enctype="multipart/form-data" @submit.prevent="bookUpdateForm">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="addType">入庫方式</label>
                            <select id="addType" name="addType" class="form-control" :value="addType" @change="changeAddType">
                                <option value="1">捐贈入庫</option>
                                <option value="2">採購入庫</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group" v-if="addType === 1">
                            <label>
                                <span class="text-danger mr-2">*</span>捐贈人(單位)名稱
                            </label>
                            <div id="donor_id_input" class="input-group mb-3">
                                <input type="text" class="form-control" :value="(book.donor)?book.donor.name:'無'" readonly>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-dark" @click="startUpdate">編輯</button>
                                </div>
                            </div>
                            <div id="donor_id" style="display:none;">
                                <select-donor-custom ref="DonorsOption" :placeholder="'請輸入捐贈人(單位)名稱名稱'" @search="onSearch" @update-value="updateValue"></select-donor-custom>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group" v-if="addType === 2">
                            <label for="price">
                                <span class="text-danger mr-2">*</span>價格
                            </label>
                            <input id="price" name="price" type="text" class="form-control" v-model="book.price">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">狀態</label>
                            <select id="status" name="status" class="form-control" v-model="book.status" v-if="isModifyStatus">
                                <option v-for="option in statusOptions" :key="option.id" :value="option.id">{{ option.text }}</option>
                            </select>
                            <select id="status" name="status" class="form-control" v-model="book.status" v-else readonly>
                                <option v-for="option in statusOptions" :key="option.id" :value="option.id">{{ option.text }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row" v-if="addType === 1">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>捐贈人電話</label>
                            <input class="form-control" type="text" :value="current_donor.tel || '無'" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>捐贈人手機</label>
                            <input class="form-control" type="text" :value="current_donor.phone || '無'" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>捐贈人生日</label>
                            <input class="form-control" type="text" :value="current_donor.birthday || '無'" readonly>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6 text-center">
                        <upload-images ref="uploadBookImages" :uploadimg="BooksCoverImageURL" :title="title" :aspect-ratio="15/21" :prefix="'book'"></upload-images>
                    </div>

                    <div class="col-md-6">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">
                                        <span class="text-danger mr-2">*</span>書名（主標題）
                                    </label>
                                    <input id="title" name="title" type="text" class="form-control" v-model="book.title" required autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="subtitle">副標題</label>
                                    <input id="subtitle" name="subtitle" type="text" class="form-control" v-model="book.subtitle" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="author">作者</label>
                                    <input id="author" name="author" type="text" class="form-control" v-model="book.author" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="position">位置</label>
                                    <input id="position" name="position" type="text" class="form-control" v-model="book.position" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="translator">譯者</label>
                                    <input id="translator" name="translator" type="text" class="form-control" v-model="book.translator" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="language">語言</label>
                                    <input id="language" name="language" type="text" class="form-control" v-model="book.language" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="publisher">出版商</label>
                                    <input id="publisher" name="publisher" type="text" class="form-control" v-model="book.publisher" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="edition">版次</label>
                                    <input id="edition" name="edition" type="text" class="form-control" v-model="book.edition" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="published_date">期數/出版日期</label>
                            <input id="published_date" name="published_date" type="text" class="form-control" v-model="book.published_date" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">圖書類別</label>
                            <select id="category" name="category" class="form-control" v-bind:value="book.category">
                                <option v-for="option in category_options" :key="option.id" :value="option.id">{{ option.text }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="content">備註內容</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="3" v-model="book.content"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-block btn-primary">
                            確認修改
                        </button>
                        <a :href="BooksIndexURL" class="btn btn-block btn-danger">
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
    props: ['book', 'addType', 'statusOptions', 'isModifyStatus'],
    data(){
        return {
            BooksIndexURL: $('#BooksIndexURL').html(),
            BooksUpdateURL: $('#BooksUpdateURL').html(),
            DonorsNameURL: $('#DonorsNameURL').html(),
            DonorsGetInfoURL: $('#DonorsGetInfoURL').text(),
            BooksCoverImageURL: $('#BooksCoverImageURL').html(),
            title: '書籍圖片',
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
            donors: [],
            donorValue: null,
            bookInfo: [],
            current_donor: [],
        }
    },
    methods : {
        onSearch(search, loading, index) {
            loading(true);
            this.search(loading, search, this, index, this.donorValue);
        },
        search: _.debounce((loading, search, vm, index, selectID) => {
            // alert(vm.DonorsNameURL);
            axios.get(vm.DonorsNameURL, {
                params:{
                    keyword: search,
                    selectID: selectID
                }
            }).then(response => {
                    // console.log(response.data.book_list);
                    vm.options = response.data.donors;
                    vm.$refs.DonorsOption.changeOptions(vm.options);
                    // vm.$refs.PaperDonorsOption.changeOptions(vm.options);

                    loading(false);
                });
        }, 350),
        updateValue(value){
            this.donorValue = value;
            axios.get(this.DonorsGetInfoURL, {
                params:{
                    id: this.donorValue
                }
            }).then(response => {
                this.current_donor = response.data.donor;
            });
        },
        startUpdate(){
            $('#donor_id_input').slideUp();
            $('#donor_id').slideDown();
        },
        changeAddType(e){
            // 更動入庫方式
            let x = $(e.target).val();
            if(x == '1'){
                // 捐贈入庫
                this.$emit('update-add-type', 1);
            }else{
                // 採購入庫
                this.$emit('update-add-type', 2);
            }
        },
        updateCategory(e){
            let $callNum = $('#callnum').val();
            if($callNum.length >= 3 && Number.isInteger(parseInt($callNum[0] + $callNum[1] + $callNum[2]))){
                $('#callnum').removeClass('is-invalid');
                if($callNum[0] < 6){
                    // 前面6類，可以靠分類號第一碼來判斷。
                    this.book.category = $callNum[0];
                }else{
                    // 第六類到第七類，必須還要再看第二碼。
                    if($callNum[0] == 6){
                        if($callNum[1] == 0){
                            this.book.category = 6;
                        }else{
                            this.book.category = 7;
                        }
                    }else{
                        if($callNum[0] == 7){
                            if($callNum[1] == 0){
                                this.book.category = 7;
                            }else{
                                this.book.category = 8;
                            }
                        }else{
                            this.book.category = parseInt($callNum[0]) + 1;
                        }
                    }
                }
            }else{
                $('#callnum').addClass('is-invalid');
                $('#callnum_error').html('<strong>分類號至少要三碼以上且為數字。</strong>');
            }
        },

        bookUpdateForm(e) {
            let url = $(e.target).attr('action');
            // let data = $(e.target).serializeObject();

            // formdata 是不可以被console.log的，只會回傳空object。
            $('#category').attr('disabled', false);
            let formdata = new FormData($(e.target)[0]);
            formdata.append('donor_id', this.donorValue);
            formdata.append('_method', 'patch');
            $.showLoadingModal();
            axios.post(url, formdata, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(response => {
                // this.$refs.uploadBookImages.stopCropper();
                $.showSuccessModal('修改成功', response.data.url, '檢視書籍');
            }).catch(error => {
                console.error('修改書籍時發生錯誤，錯誤訊息：' + error);
                $.showErrorModal(error);
            });
        }

    },
    created(){
        // let DonorsListURL = $('#DonorsListURL').html();
        // axios.get(DonorsListURL).then(response => {
        //     this.donors = response.data.donors;
        //     for(let i = 0; i < this.donors.length; i++){
        //         $("#donor_id").append($("<option></option>").attr("value", this.donors[i].id).text(this.donors[i].name));
        //         // $("#p_donor_id").append($("<option></option>").attr("value", this.donors[i].id).text(this.donors[i].name));
        //     }
        //     $('#donor_id').selectpicker('refresh');
        //     // $('#p_donor_id').selectpicker('refresh');
        // });
    },
    mounted(){

    }
}
</script>

<style>

</style>
