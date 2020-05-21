<template>
<v-select
    label="id" v-model="selectValue"
    :id="'book_test_' + selectIndex"
    :filterable="false"
    :options="options"
    :reduce="option => option.id"
    @search="onSearch"
    @input="onChange">
    <template slot="no-options">
        {{ placeholder }}
    </template>
    <template slot="option" slot-scope="option">
        <div class="d-center">
            <img :src='option.showCoverImage'/>
            {{ option.showTitle }}
        </div>
    </template>
        <template slot="selected-option" slot-scope="option">
            <div class="selected d-center">
                <img :src='option.showCoverImage'/>
                {{ option.showTitle }}
            </div>
    </template>
</v-select>
</template>

<script>
export default {
    props: ['placeholder', 'selectIndex'],
    data(){
        return {
            selectValue: null,
            options: []
        }
    },
    methods: {
        onSearch(search, loading){
            this.$emit('search', search, loading, this.selectIndex);
        },
        onChange(){
            this.$emit('update-value', this.selectValue, this.selectIndex);
        },
        changeOptions(options){
            this.options = options;
        }
    },
    created(){

    },
    mounted(){

    }
}
</script>

<style>
</style>
