Vue.component('book-filter', require('../../components/Frontend/Books/BookFilter.vue').default);
Vue.component('freebook-container', require('../../components/Frontend/FreeBooks/FreeBookContainer.vue').default);
Vue.component('freebook-card', require('../../components/Frontend/FreeBooks/FreeBookCard.vue').default);
Vue.component('content-paginate', require('../../components/Frontend/Partials/ContentPaginate.vue').default);

const app = new Vue({
    el: '#content-freebook',
    data() {
        return {
            books: [],
            filter: {
                type: 0,
                keyword: '',
                order: 0,
            },

            totalcount: 0,
            currentPage: 1,
            totalPage: 0,
        }
    },
    methods: {
        getBooks(firstPage = 0) {
            $.showLoadingModal();

            if (firstPage == 1 || this.currentPage == 0) {
                this.currentPage = 1;
            }

            let url = $('#GetBooksList').text();
            axios.get(url, {
                params: {
                    skip: (this.currentPage - 1) * 6,
                    type: this.filter.type,
                    keywords: this.filter.keyword,
                    orderBy: this.filter.order,
                    firstPage: firstPage,
                    status: 7
                }
            }).then(response => {
                this.books = response.data.books;
                this.totalcount = response.data.totalcount;
                this.totalPage = Math.ceil(this.totalcount / 6);
                if (this.totalcount == 0) {
                    this.currentPage = 0;
                }
                $.closeModal();
            }).catch(error => {
                console.log('抓取免費索取書籍資料時錯誤。');
                $.showErrorModal(error);
            });
        },
        chagePage(value) {
            this.currentPage = value;
            this.getBooks();
            this.goBackToTop();
        },
        refreshBook(firstPage) {
            this.getBooks(firstPage);
            this.goBackToTop();
        },
        goBackToTop() {
            $('html, body').animate({
                scrollTop: 200
            }, 500);
        }
    },
    created() {
        this.getBooks();
    },
    mounted() {

    }
});
