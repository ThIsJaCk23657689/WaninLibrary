Vue.component('books-table', require('./../components/Books/BooksTable.vue').default);
Vue.component('paginate-custom', require('./../components/Partials/PaginateCustom.vue').default);

const app = new Vue({
    el: '#book',
    data() {
        return {
            books: []
        }
    },
    methods: {
        updateBook(books) {
            this.books = books;
        }
    },
    created(){
        let BooksGetList = $('#BooksGetList').html();
        axios.get(BooksGetList).then(response => {
            this.books = response.data.books;
        });
    },
    mounted(){

    }
});