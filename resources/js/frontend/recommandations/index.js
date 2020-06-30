Vue.component('recommandation-container', require('../../components/Frontend/Recommandations/RecommandationContainer.vue').default);
Vue.component('recommandation-card', require('../../components/Frontend/Recommandations/RecommandationCard.vue').default);
Vue.component('content-paginate', require('../../components/Frontend/Partials/ContentPaginate.vue').default);

const app = new Vue({
    el: '#content-recommandations',
    data() {
        return {
            recommandations: [],
            totalcount: 0,

            currentPage: 1,
            totalPage: 0,
        }
    },
    methods: {
        getRecommandations() {
            $.showLoadingModal();

            let url = $('#GetActivitiesList').text();
            axios.get(url, {
                params: {
                    skip: (this.currentPage - 1) * 4,
                    type: 2
                }
            }).then(response => {
                console.log(response.data);
                this.recommandations = response.data.activities;
                this.totalcount = response.data.totalcount;
                this.totalPage = Math.ceil(this.totalcount / 4);
                $.closeModal();
            }).catch(error => {
                console.log('抓取主題書單時錯誤。');
                $.showErrorModal(error);
            });
        },
        chagePage(value) {
            this.currentPage = value;
            this.getRecommandations();
            $('html, body').animate({
                scrollTop: 200
            }, 500);
        }
    },
    created() {
        this.getRecommandations();
    },
    mounted() {

    }
});