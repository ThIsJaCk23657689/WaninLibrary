<template>
<div>
    <div id="step2" class="row">
        <div class="col-md-12 mb-2">
            <h4>借閱人資料</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">姓名</label>
                <input id="name" name="name" type="text" class="form-control mb-2" :value="borrower.name">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="tel">電話</label>
                <input id="tel" name="tel" type="text" class="form-control mb-2" :value="borrower.tel">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="birthday">生日</label>
                <input id="birthday" name="birthday" type="text" class="form-control mb-2" :value="borrower.birthday">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="agency">隸屬機構</label>
                <input id="agency" name="agency" type="text" class="form-control mb-2" :value="borrower.showAgencyName">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="status">身分</label>
                <input id="status" name="status" type="text" class="form-control mb-2" :value="borrower.showStatus">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="activate">狀態</label>
                <input id="activate" name="activate" type="text" class="form-control mb-2" :value="borrower.showActivated">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <table id="BorrowRecordTable" class="table">
                        <thead>
                            <tr>
                                <th>書籍條碼</th>
                                <th>書籍名稱</th>
                                <th>借閱日期</th>
                                <th>目前狀態</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="record in borrowsRecords" :key="record.id">
                                <td>{{ record.book.id  }}</td>
                                <td>{{ record.book.name }}</td>
                                <td>{{ record.borrow_date  }}</td>
                                <td>{{ record.status }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <paginate-custom @updatePage="getBorrowerList" :pageNum="pageNum" :totalPage="totalPage"></paginate-custom>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['borrower', 'borrowsRecords'],
    data(){
        return {

        }
    },
    methods: {

    },
    created(){

    },
    mounted(){

    }
}
</script>

<style>
</style>