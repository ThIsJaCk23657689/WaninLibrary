Vue.component('donor-update-form', require('./../components/Donors/DonorUpdateForm.vue').default);

const app = new Vue({
    el: '#donor',
    data() {
        return {
            donor: [],
        }
    },
    methods: {

    },
    created() {
        let DonorsGetOneURL = $('#DonorsGetOneURL').html();
        axios.get(DonorsGetOneURL).then(response => {
            this.donor = response.data.donor;

            // 地址
            $('#address_twzipcode').twzipcode({
                'zipcodeSel': response.data.donor.address_zipcode
            });
        });
    },
    mounted() {

    }
});