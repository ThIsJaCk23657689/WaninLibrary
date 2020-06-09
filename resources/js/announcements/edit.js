Vue.component('announcement-update-form', require('./../components/Announcements/AnnouncementUpdateForm.vue').default);

const app = new Vue({
    el: '#announcement',
    data() {
        return {
            announcement: [],
            content: null,
        }
    },
    methods: {

    },
    created() {
        let AnnouncementsGetOneURL = $('#AnnouncementsGetOneURL').html();
        axios.get(AnnouncementsGetOneURL).then(response => {
            this.announcement = response.data.announcement;
            this.content = response.data.announcement.content;
            CKEDITOR.replace('content');
        });
    },
    mounted() {

    }
});