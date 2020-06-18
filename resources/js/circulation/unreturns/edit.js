Vue.component('unreturn-update-form', require('./../../components/Circulation/Unreturns/UnreturnUpdateForm.vue').default);

const app = new Vue({
    el: '#unreturn',
    data() {
        return {
            unreturn: [],
        }
    },
    methods: {

    },
    created() {
        let UnreturnGetOneURL = $('#UnreturnGetOneURL').html();

        $.showLoadingModal();
        axios.get(UnreturnGetOneURL).then(response => {
            this.unreturn = response.data.unreturn;
            $.closeModal();
        });
    },
    mounted() {

    }
});