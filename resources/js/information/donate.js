Vue.component('information-donate-form', require('./../components/Information/InformationDonateForm.vue').default);
Vue.component('upload-images', require('./../components/Partials/UploadImages.vue').default);

const app = new Vue({
    el: '#information',
    data() {
        return {
            information: [],
        }
    },
    methods: {

    },
    created() {
        let InformationGetFirstURL = $('#InformationGetFirstURL').html();
        axios.get(InformationGetFirstURL).then(response => {
            this.information = response.data.information;
        });

    },
    mounted() {

    }
});