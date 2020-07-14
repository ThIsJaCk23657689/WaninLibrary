Vue.component('activity-update-form', require('./../components/Activities/ActivityUpdateForm.vue').default);
Vue.component('upload-images', require('./../components/Partials/UploadImages.vue').default);

const app = new Vue({
    el: '#activity',
    data() {
        return {
            CKEditorUploadURL: $('#CKEditorUploadURL').text(),
            activity: [],
            content: null,
        }
    },
    methods: {

    },
    created() {
        let ActivitiesGetOneURL = $('#ActivitiesGetOneURL').html();
        axios.get(ActivitiesGetOneURL).then(response => {
            this.activity = response.data.activity;
            this.content = response.data.activity.content;
            // console.log('sss:' + this.content);
            CKEDITOR.replace('content', {
                filebrowserUploadUrl: this.CKEditorUploadURL,
                filebrowserUploadMethod: 'form'
            });
        });
    },
    mounted() {

    }
});