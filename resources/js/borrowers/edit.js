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
        axios.get(BorrowersGetOneURL).then(response => {
            this.borrower = response.data.borrower;

            // 地址
            $('#address_twzipcode').twzipcode({
                'zipcodeSel': response.data.borrower.address_zipcode
            });
        });
    },
    mounted() {

    }
});