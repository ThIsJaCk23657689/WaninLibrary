Vue.component('announcement-container', require('../../components/Frontend/Announcements/AnnouncementContainer.vue').default);
Vue.component('announcement-row', require('../../components/Frontend/Announcements/AnnouncementRow.vue').default);
Vue.component('content-paginate', require('../../components/Frontend/Partials/ContentPaginate.vue').default);

const app = new Vue({
    el: '#content-announcement',
    data() {
        return {
            announcements: [],
            totalcount: 0,
            currentPage: 1,
            totalPage: 0,
        }
    },
    methods: {
        getAnnouncements() {
            $.showLoadingModal();

            let url = $('#GetAnnouncementsList').text();
            axios.get(url, {
                params: {
                    skip: (this.currentPage - 1) * 8,
                }
            }).then(response => {
                this.announcements = response.data.announcements;
                this.totalcount = response.data.totalcount;
                this.totalPage = Math.ceil(this.totalcount / 8);
                if (this.totalcount == 0) {
                    this.currentPage = 0;
                }
                $.closeModal();
            }).catch(error => {
                console.log('抓取重要訊息與公告時錯誤。');
                $.showErrorModal(error);
            });
        },
        chagePage(value) {
            this.currentPage = value;
            this.getAnnouncements();
            this.goBackToTop();
        },
        goBackToTop() {
            $('html, body').animate({
                scrollTop: 200
            }, 500);
        }
    },
    created() {
        this.getAnnouncements();
    },
    mounted() {

    }
});
