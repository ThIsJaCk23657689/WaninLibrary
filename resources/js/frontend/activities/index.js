Vue.component('activity-container', require('../../components/Frontend/Activities/ActivityContainer.vue').default);
Vue.component('activity-card', require('../../components/Frontend/Activities/ActivityCard.vue').default);
Vue.component('content-paginate', require('../../components/Frontend/Partials/ContentPaginate.vue').default);

const app = new Vue({
    el: '#content-activity',
    data() {
        return {
            activities: [],
            totalcount: 0,

            currentPage: 1,
            totalPage: 0,
        }
    },
    methods: {
        getActivities() {
            $.showLoadingModal();

            let url = $('#GetActivitiesList').text();
            axios.get(url, {
                params: {
                    skip: (this.currentPage - 1) * 4,
                }
            }).then(response => {
                console.log(response.data);
                this.activities = response.data.activities;
                this.totalcount = response.data.totalcount;
                this.totalPage = Math.ceil(this.totalcount / 4);
                $.closeModal();
            }).catch(error => {
                console.log('抓取活動清單時錯誤。');
                $.showErrorModal(error);
            });
        },
        chagePage(value) {
            this.currentPage = value;
            this.getActivities();
            $('html, body').animate({
                scrollTop: 200
            }, 500);
        }
    },
    created() {
        this.getActivities();
    },
    mounted() {

    }
});