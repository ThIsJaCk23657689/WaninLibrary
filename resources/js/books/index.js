import Paginate from 'vuejs-paginate';

Vue.component('paginate', Paginate);
Vue.component('books-table', require('./../components/Books/BooksTable.vue').default);

const app = new Vue({
    el: '#book',
    data() {
        return {
            books: []
        }
    },
    methods: {
        
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