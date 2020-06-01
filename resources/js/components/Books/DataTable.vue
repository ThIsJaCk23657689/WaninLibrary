<template>
    <table id="test-table"></table>
</template>

<script>
export default {
    prop: ['head', 'data'],
    data(){
        return {
            instance: null
        }
    },
    // watch: {
    //     data: function(newData) {
    //         if(this.instance){
    //             this.instance.clear();
    //             this.instance.rows.add(newData);
    //             this.instance.draw();
    //         }
    //     }
    // },
    mounted() {
        this.instance = $('#test-table').DataTable({
            columns: this.head,
            data: this.data
        });
    }

}
</script>

<style>

</style>