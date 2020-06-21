Vue.component('book-update-form', require('./../components/Books/BookUpdateForm.vue').default);
Vue.component('upload-images', require('./../components/Partials/UploadImages.vue').default);
Vue.component('select-donor-custom', require('./../components/Partials/SelectDonorCustom.vue').default);

const app = new Vue({
    el: '#book',
    data() {
        return {
            book: [],
            addType: null,
            status_options: [],
            isOKModifyStatus: true,
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
            }

            if (this.book.status == 2) {
                // 此書籍為借閱中
                this.isOKModifyStatus = false;
                this.status_options = [
                    { id: 2, text: '借閱中' },
                ];
            } else if (this.book.status == 3 || this.book.status == 10) {
                // 此書籍為逾期中
                this.status_options = [
                    { id: 3, text: '逾期中' },
                    { id: 10, text: '無歸還' },
                ];
            } else {
                // 其他狀態可以修改
                this.status_options = [
                    { id: 1, text: '可借閱' },
                    { id: 4, text: '庫藏待上架' },
                    { id: 5, text: '已淘汰' },
                    { id: 6, text: '已轉贈' },
                    { id: 7, text: '可供免費索取' },
                    { id: 8, text: '已被索取' },
                    { id: 9, text: '無外借' },
                ];
            }
        });
    },
    mounted() {
        console.log('edit.js mounted');
        console.log($('#category'));
    }
});