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
        let UsersGetOneURL = $('#UsersGetOneURL').html();
        axios.get(UsersGetOneURL).then(response => {
            this.user = response.data.user;

            // 地址
            $('#address_twzipcode').twzipcode({
                'zipcodeSel': response.data.user.address_zipcode
            });
        });
    },
    mounted() {

    }
});
