Vue.component('book-update-form', require('./../components/Books/BookUpdateForm.vue').default);
Vue.component('upload-images', require('./../components/Partials/UploadImages.vue').default);
Vue.component('select-donor-custom', require('./../components/Partials/SelectDonorCustom.vue').default);

const app = new Vue({
    el: '#book',
    data() {
        return {
            book: [],
            addType: null,
        }
    },
    methods: {
        updateAddType(value) {
            console.log('changeAddType:' + value);
            this.addType = value;
        }
    },
    created() {
        let BooksGetOneURL = $('#BooksGetOneURL').html();
        axios.get(BooksGetOneURL).then(response => {
            this.book = response.data.book;
            if (this.book.donor_id) {
                // 捐贈
                this.addType = 1;
            } else {
                // 採購
                this.addType = 2;
                $('#donor_id').prop('disabled', true);
                $('#donor_id_required_star').fadeOut();
                $('#price').val('0').prop('disabled', false).attr('required', true);
            }

        });
    },
    mounted() {
        console.log('edit.js mounted');
        console.log($('#category'));
    }
});