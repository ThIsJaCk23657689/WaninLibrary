Vue.component('user-update-form', require('./../components/Users/UserUpdateForm.vue').default);

const app = new Vue({
    el: '#user',
    data() {
        return {
            user: [],
        }
    },
    methods: {

    },
    created() {
        $.showLoadingModal();
        let UsersGetOneURL = $('#UsersGetOneURL').html();
        axios.get(UsersGetOneURL).then(response => {
            this.user = response.data.user;

            // 地址
            $('#address_twzipcode').twzipcode({
                'readonly': false,
                'zipcodeSel': this.user.address_zipcode,
                'county': this.user.address_county,
                'district': this.user.address_district,
                'zipcode': this.user.address_zipcode
            });
            $.closeModal();
        });
    },
    mounted() {

    }
});
