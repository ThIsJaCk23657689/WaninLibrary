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

        $.showLoadingModal();
        axios.get(DonorsGetOneURL).then(response => {
            this.donor = response.data.donor;

            // 地址
            $('#address_twzipcode').twzipcode({
                'readonly': false,
                'zipcodeSel': response.data.donor.address_zipcode,
                'county': response.data.donor.address_county,
                'district': response.data.donor.address_district,
                'zipcode': response.data.donor.address_zipcode
            });
            $.closeModal();
        });
    },
    mounted() {

    }
});