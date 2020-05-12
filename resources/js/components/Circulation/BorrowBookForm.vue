<template>
<div class="row justify-content-center">
    <div class="col-md-8">
        <form method="POST" id="borrow_book_form" action="#" @submit.prevent="borrowBookForm">

            <div id="step2" class="row">
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

            <filter-table :borrowers="borrowers" :pageNum="pageNum" :totalPage="totalPage"
                @update-page-num="updatePageNum" @update-current-borrower="updateCurrentBorrower"></filter-table>

            <borrower-info :borrower="currentBorrower" :borrows-records="historyBorrowRecords"></borrower-info>

            <div class="form-group row justify-content-center">
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
                if(response.data.borrower.activated == 0){
                    $.showWarningModal('很抱歉，此借閱人已被停權，無法進行借閱。');
                    this.currentBorrower = [];
                    this.historyBorrowRecords = [];
                }else{
                    this.currentBorrower = response.data.borrower;
                    this.historyBorrowRecords = response.data.borrower.borrows;
                    $.closeModal();
                }
            }).catch(error => {
                console.error('抓取借閱人資料時發生錯誤，錯誤訊息：' + error);
                $.showErrorModal(error);
            });
        },

        borrowBookForm(){
            alert('f');
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
</style>