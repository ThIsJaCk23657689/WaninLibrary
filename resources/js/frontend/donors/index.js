Vue.component('donor-filter', require('../../components/Frontend/Donors/DonorFilter.vue').default);
Vue.component('donor-container', require('../../components/Frontend/Donors/DonorContainer.vue').default);
Vue.component('donor-row', require('../../components/Frontend/Donors/DonorRow.vue').default);
Vue.component('content-paginate', require('../../components/Frontend/Partials/ContentPaginate.vue').default);

const app = new Vue({
    el: '#content-donor',
    data() {
        return {
            donors: [],
            filter: {
                year: 0,
                keyword: '',
                order: 0,
            },

            totalcount: 0,
            currentPage: 1,
            totalPage: 0,
        }
    },
    methods: {
        getDonors(firstPage = 0) {
            $.showLoadingModal();

            if(firstPage == 1 || this.currentPage == 0){
                this.currentPage = 1;
            }

            let url = $('#GetDonorsList').text();
            axios.get(url, {
                params: {
                    skip: (this.currentPage - 1) * 4,
                    year: this.filter.year,
                    keywords: this.filter.keyword,
                    orderBy: this.filter.order,
                    firstPage: firstPage,
                    status: 1
                }
            }).then(response => {
                this.donors = response.data.donors;
                this.totalcount = response.data.totalcount;
                this.totalPage = Math.ceil(this.totalcount / 4);
                if(this.totalcount == 0){
                    this.currentPage = 0;
                }
                $.closeModal();
            }).catch(error => {
                console.log('抓取書籍資料時錯誤。');
                $.showErrorModal(error);
            });
        },
        chagePage(value) {
            this.currentPage = value;
            this.getDonors();
            this.goBackToTop();
        },
        refreshDonor(firstPage){
            this.getDonors(firstPage);
            this.goBackToTop();
        },
        goBackToTop(){
            $('html, body').animate({
                scrollTop: 200
            }, 500);
        }
    },
    created() {
        this.getDonors();
    },
    mounted() {

    }
});