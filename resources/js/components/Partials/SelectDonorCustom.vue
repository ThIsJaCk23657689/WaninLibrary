<template>
<v-select
    label="id" v-model="selectValue"
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
            {{ option.name }}
        </div>
    </template>
    <template slot="selected-option" slot-scope="option">
        <div class="selected d-center">
            {{ option.name }}
        </div>
    </template>
</v-select>
</template>

<script>
export default {
    props: ['placeholder'],
    data(){
        return {
            selectValue: null,
            options: []
        }
    },
    methods: {
        onSearch(search, loading){
            this.$emit('search', search, loading);
        },
        onChange(){
            this.$emit('update-value', this.selectValue);
        },
        changeOptions(options){
            this.options = options;
        },
        givenValue(value, options){
            this.selectValue = value;
            this.changeOptions(options);
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
