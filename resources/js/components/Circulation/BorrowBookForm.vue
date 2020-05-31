<template>
<div class="row justify-content-center">
    <div class="col-md-8">
        <form method="POST" id="borrow_book_form" action="#" @submit.prevent="borrowBookForm">

            <div id="step1">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <h4>1. 請選擇借閱人</h4>
                        <small>請輸入姓名、電話或生日來找尋借閱人</small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="search_name">姓名</label>
                            <input id="search_name" name="search_name" type="text" class="form-control mb-2"
                                v-model="keywords.name" @change="searchBorrower">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="search_tel">電話</label>
                            <input id="search_tel" name="search_tel" type="text" class="form-control mb-2"
                                v-model="keywords.tel" @change="searchBorrower">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="search_birthday">生日</label>
                            <input id="search_birthday" name="search_birthday" type="text" class="form-control mb-2"
                                v-model="keywords.birthday" autocomplete="off" @change="searchBorrower">
                        </div>
                    </div>
                </div>

                <borrower-filter-table :borrowers="borrowers" :pageNum="pageNum" :totalPage="totalPage"
                    @update-page-num="updatePageNum" @update-current-borrower="updateCurrentBorrower"></borrower-filter-table>
            </div>

            <div id="step2" style="display: none;">
                <div id="goback2step1" class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button id="goback2step1_btn" type="button" class="btn btn-block btn-secondary" @click="goback2step1">
                                <i class="fas fa-undo-alt mr-2"></i>
                                重新選擇借閱人
                            </button>
                        </div>
                    </div>
                </div>
                
                <borrower-info :borrower="currentBorrower" :borrows-records="historyBorrowRecords"></borrower-info>

                <hr>

                <div class="row">
                    <div class="col-md-12 mb-2">
                        <h4>2. 請掃描書本條碼。</h4>
                        <small>每人最多只能借閱5本書，目前還只能再借{{ borrowCounts - notReturnCounts }}本</small>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="barcode">書本條碼</label>
                            <input id="barcode" name="barcode" type="text" class="form-control" value="" required autocomplete="off" @change="addBook">
                            <span id="barcode_error" class="invalid-feedback" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-12 text-center">
                        <span v-if="currentBooks.length == 0">
                            <strong>借書列表為空。</strong>
                        </span>
                        <table id="borrowList" class="table" v-if="currentBooks.length != 0">
                            <thead>
                                <tr>
                                    <th>條碼</th>
                                    <th>書名</th>
                                    <th>到期日</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="book in currentBooks" :key="book.id">
                                    <td>{{ book.barcode }}</td>
                                    <td>{{ book.title }}</td>
                                    <td>{{ book.expiredDate }}</td>
                                    <td>
                                        <button type="button" class="btn btn-md btn-danger" @click="removeBook(book.id)">取消</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="submit_btn" class="form-group row justify-content-center" v-if="currentBooks.length != 0">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-block btn-primary">
                        確認
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
            borrowers: [],

            pageNum: 1,
            totalPage: 0,
            totalCount: 0,
            countPerPage: 5,

            keywords: {
                name: null,
                tel: null,
                birthday: null
            },
            currentBorrower: [],
            historyBorrowRecords: [],

            currentBooks: [],
            borrowCounts: 5,
            notReturnCounts: 0,
        }
    },
    methods: {
        // 更新借閱人搜尋頁碼
        updatePageNum(pageNum){
            this.pageNum = pageNum;
            this.updateTable();
        },

        // 更新借閱人搜尋資料
        updateTable(){
            let BorrowersFilterURL = $('#BorrowersFilterURL').html();
            $.showLoadingModal();
            axios.get(BorrowersFilterURL, {
                params: {
                    name: this.keywords.name,
                    tel: this.keywords.tel,
                    birthday: this.keywords.birthday,
                    skip: (this.pageNum - 1) * this.countPerPage,
                    take: this.countPerPage,
                }
            }).then(response => {
                this.borrowers = response.data.borrowers;
                this.totalCount = response.data.count;
                this.totalPage = Math.ceil(this.totalCount / this.countPerPage);
                $.closeModal();
            }).catch(error => {
                console.error('抓取借閱人列表時發生錯誤，錯誤訊息：' + error);
                $.showErrorModal(error);
            });
        },

        // 搜尋資料
        searchBorrower(e){
            if(this.keywords.name != '' || this.keywords.tel != '' || this.keywords.birthday != ''){
                this.updateTable();
            }
        },

        // 選擇借閱人並抓取資料
        updateCurrentBorrower(url){
            $.showLoadingModal('抓取借閱人資料中');
            axios.get(url, {
                params: {
                    with: 'borrows'
                }
            }).then(response => {
                if(!response.data.borrower){
                    $.showErrorModalWithoutError('發生錯誤，無法找尋借閱人。');
                }else{
                    if(response.data.borrower.activated == 0){
                        $.showWarningModal('很抱歉，此借閱人已被停權，無法進行借閱。');
                        this.currentBorrower = [];
                        this.historyBorrowRecords = [];
                    }else{
                        this.currentBorrower = response.data.borrower;
                        this.historyBorrowRecords = response.data.borrower.borrows;
                        this.historyBorrowRecords.forEach(record => {
                            if(record.status == 1){
                                this.notReturnCounts = this.notReturnCounts + 1;
                            }
                        });
                        $('#step1').slideUp();
                        $('#step2').slideDown();
                        $.closeModal();
                    }
                }
            }).catch(error => {
                console.error('抓取借閱人資料時發生錯誤，錯誤訊息：' + error);
                $.showErrorModal(error);
            });
        },
        
        // 發送借書表單
        borrowBookForm(){
            let url = $('#borrowBookURL').html();
            let data = {
                borrowerID: this.currentBorrower.id,
                books: this.currentBooks
            };

            $.showLoadingModal('新增借閱資料中');
            axios.post(url, data).then(response => {
                $.showSuccessModal(response.data.message, response.data.url, '確認');
            }).catch(error => {
                console.error('新增借閱資料時發生錯誤，錯誤訊息：' + error);
                $.showErrorModal(error);
            });
        },

        goback2step1(){
            $('#step1').slideDown();
            $('#step2').slideUp();
        },

        addBook(e){
            // 最多只能借閱5本
            if(this.currentBooks.length == (this.borrowCounts - this.notReturnCounts)){
                $.showWarningModal('最多只能借閱5本書哦！');
                return false;
            }

            let url = $('#getBookDataByBarcode').text();
            let $barcode = e.target.value;

            if(!$barcode){
                return false;
            }

            $.showLoadingModal('抓取書本資料中');
            axios.get(url, {
                params: {
                    barcode: $barcode
                }
            }).then(response => {
                let $book = response.data.book;
                if(!$book){
                    $.showErrorModalWithoutError('發生錯誤，無法找尋書本。');
                }else{
                    // 先判斷是否有重複加入書本
                    let isRepeated = false;
                    this.currentBooks.forEach(book => {
                        if(book.barcode == $book.barcode){
                            isRepeated = true;
                        }
                    });

                    // 再判斷此書狀態是否可以出借。
                    if($book.status != 1){
                        $.showWarningModal('此書本狀態為：' + $book.showStatus + '，所以無法進行借閱！。');
                        return false;
                    }

                    if(isRepeated){
                        $.showWarningModal('此書本已經加入借閱清單中了！。');
                    }else{
                        let $today = new Date();
                        this.currentBooks.push({
                            id: $book.id,
                            barcode: $book.barcode,
                            title: $book.title,
                            expiredDate: $.formatDate($today.setDate($today.getDate() + 30))
                        });
                        $.closeModal();
                    }
                }
            }).catch(error => {
                console.error('抓取書本資料時發生錯誤，錯誤訊息：' + error);
                if(error.response.data.errors){
                    $('#barcode_error').html('<span>' + error.response.data.errors.barcode[0] + '</span>');
                }
                $.showErrorModal(error);
            });
        },

        removeBook(id){
            this.currentBooks = this.currentBooks.filter(function(el, $i, $arr){
                return el.id != id;
            });
        }
    },
    created(){

    },
    mounted(){
        // 生日
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
#borrowList tbody tr:nth-child(even){
    background-color: #eee;
}
</style>