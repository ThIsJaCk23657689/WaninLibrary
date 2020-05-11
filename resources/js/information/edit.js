Vue.component('information-update-form', require('./../components/Information/InformationUpdateForm.vue').default);

const app = new Vue({
    el: '#information',
    data() {
        return {

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