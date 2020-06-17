Vue.component('borrower-update-form', require('./../components/Borrowers/BorrowerUpdateForm.vue').default);

const app = new Vue({
    el: '#borrower',
    data() {
        return {
            borrower: [],
        }
    },
    methods: {

    },
    created() {
        let BorrowersGetOneURL = $('#BorrowersGetOneURL').html();
        $.showLoadingModal();
        axios.get(BorrowersGetOneURL).then(response => {
            this.borrower = response.data.borrower;
            // 地址
            $('#address_twzipcode').twzipcode({
                'readonly': false,
                'zipcodeSel': response.data.borrower.address_zipcode,
                'county': response.data.borrower.address_county,
                'district': response.data.borrower.address_district,
                'zipcode': response.data.borrower.address_zipcode
            });
            $.closeModal();
        });

        // 生成 機構 下拉式選單
        let AgenciesListURL = $('#AgenciesListURL').html();
        axios.get(AgenciesListURL).then(response => {
            this.agencies = response.data.agencies;
            for (let i = 0; i < this.agencies.length; i++) {
                $("#agency_id").append($("<option></option>").attr("value", this.agencies[i].id).text(this.agencies[i].name));
            }
            $('#agency_id').selectpicker('refresh');
            console.log(this.borrower.agency_id);
            $('#agency_id').val(this.borrower.agency_id);
            $('#agency_id').selectpicker('refresh');
        });
    },
    mounted() {

    }
});