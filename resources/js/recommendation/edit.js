Vue.component('recommendation-update-form', require('./../components/Recommendation/RecommendationUpdateForm.vue').default);
Vue.component('select-book-custom', require('./../components/Partials/SelectBookCustom.vue').default);

const app = new Vue({
    el: '#recommendation',
    data() {
        return {
            books: [{
                id: null,
                title: null
            }],
            recommendation_title: [],
        }
    },
    methods: {

    },
    created() {
        let RecommendationGetFirstURL = $('#RecommendationGetFirstURL').html();
        axios.get(RecommendationGetFirstURL).then(response => {
            this.recommendation_title = response.data.recommendation_title;
            this.books = response.data.books;
            for (let i = 0; i < 10; i++) {
                $('#book_id_' + (i + 1)).append($("<option></option>").attr("value", this.books[i].id).text(this.books[i].title));
                $('.book_ids').selectpicker('refresh');
                $('#book_id_' + (i + 1)).val(this.books[i].id);
                $('.book_ids').selectpicker('refresh');
            }
        });
    },
    mounted() {

    }
});