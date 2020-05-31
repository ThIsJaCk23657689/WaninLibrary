<template>
<div>
    <div class="row">
        <div class="col-md-12 mb-2">
            <h4>借閱人資料</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">姓名</label>
                <input id="name" name="name" type="text" class="form-control mb-2" :value="borrower.name" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="tel">電話</label>
                <input id="tel" name="tel" type="text" class="form-control mb-2" :value="borrower.tel" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="birthday">生日</label>
                <input id="birthday" name="birthday" type="text" class="form-control mb-2" :value="borrower.birthday?borrower.birthday:'無'" readonly>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="agency">隸屬機構</label>
                <input id="agency" name="agency" type="text" class="form-control mb-2" :value="borrower.showAgencyName" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="status">身分</label>
                <input id="status" name="status" type="text" class="form-control mb-2" :value="borrower.showStatus" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="activate">狀態</label>
                <input id="activate" name="activate" type="text" class="form-control mb-2" :value="borrower.showActivated" readonly>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 mb-1 text-center">
                    <span v-if="borrowsRecords.length == 0">
                        <strong>無過往借閱紀錄。</strong>
                    </span>
                    <table id="BorrowRecordTable" class="table" v-if="borrowsRecords.length">
                        <thead>
                            <tr>
                                <th>書籍條碼</th>
                                <th>書籍名稱</th>
                                <th>借閱日</th>
                                <th>到期日</th>
                                <th>目前狀態</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="record in borrowsRecords" :key="record.id">
                                <td>{{ record.book_barcode  }}</td>
                                <td>{{ record.book_title }}</td>
                                <td>{{ record.created_at  }}</td>
                                <td>{{ record.return_date  }}</td>
                                <td>{{ record.showStatus }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-12">
                    <paginate-custom @updatePage="getBorrowerList" :pageNum="pageNum" :totalPage="totalPage"></paginate-custom>
                </div>
            </div> -->
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