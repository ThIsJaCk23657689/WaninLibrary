const { default: Axios } = require('axios');

Vue.component('activity-container', require('../../components/Frontend/Activities/ActivityContainer.vue').default);
Vue.component('activity-card', require('../../components/Frontend/Activities/ActivityCard.vue').default);
Vue.component('content-paginate', require('../../components/Frontend/Partials/ContentPaginate.vue').default);

const app = new Vue({
    el: '#content-activity',
    data() {
        return {
            activities: [],
            totalcount: 0,

            current_page: 1,
        }
    },
    methods: {
        getActivities() {
            let url = $('#GetActivitiesList').text();
            axios.get(url, {
                params: {
                    skip: (this.current_page - 1) * 4,
                }
            }).then(response => {
                console.log(response.data);
                this.activities = response.data.activities;
                this.totalcount = response.data.totalcount;
            }).catch(error => {
                console.log('抓取活動清單時錯誤。');
            });
        }
    },
    created() {
        this.getActivities();
    },
    mounted() {

    }
});