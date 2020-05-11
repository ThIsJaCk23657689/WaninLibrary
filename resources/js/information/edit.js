Vue.component('information-update-form', require('./../components/Information/InformationUpdateForm.vue').default);

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