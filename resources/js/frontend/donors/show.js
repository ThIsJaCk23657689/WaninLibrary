Vue.component('donor-show-container', require('../../components/Frontend/Donors/DonorShowContainer.vue').default);
Vue.component('donor-show-row', require('../../components/Frontend/Donors/DonorShowRow.vue').default);
Vue.component('content-paginate', require('../../components/Frontend/Partials/ContentPaginate.vue').default);

const app = new Vue({
    el: '#content-donor-show',
    data() {
        return {
            books: [],
            totalcount: 0,
            currentPage: 1,
            totalPage: 0,
            isSearched: 0,
        }
    },
    methods: {
        getDonatedBooks() {
            $.showLoadingModal();

            let url = $('#getDonorBooksList').text();
            let donor_id = $('#getDonorId').text();
            this.isSearched = parseInt($('#getIsSearched').text());
            axios.get(url, {
                params: {
                    skip: (this.currentPage - 1) * 4,
                    id: donor_id,
                }
            }).then(response => {
                this.books = response.data.books;
                this.totalcount = response.data.totalcount;
                this.totalPage = Math.ceil(this.totalcount / 4);
                if (this.totalcount == 0) {
                    this.currentPage = 0;
                }
                $.closeModal();
            }).catch(error => {
                console.log('抓取捐贈人捐贈書籍時發生錯誤。');
                $.showErrorModal(error);
            });
        },
        chagePage(value) {
            this.currentPage = value;
            this.getDonatedBooks();
            this.goBackToTop();
        },
        goBackToTop() {
            $('html, body').animate({
                scrollTop: 200
            }, 500);
        }
    },
    created() {
        this.getDonatedBooks();
    },
    mounted() {

    }
});