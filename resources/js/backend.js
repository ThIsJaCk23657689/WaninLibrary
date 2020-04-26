/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./../../node_modules/bootstrap-select/dist/js/bootstrap-select');
require('./../../node_modules/bootstrap-select/dist/js/i18n/defaults-zh_TW');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('option-item', require('./components/Partials/OptionItem.vue').default);
Vue.component('loading-modal', require('./components/Modals/LoadingModal.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#backend',
//     created(){

//     }
// });

// backend 通用JS函式
$(function(){
    // 表單Object 格式化
    $.fn.serializeObject = function()
    {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    // input為$()所指向的input element。
    // 檢查value是否為小數點或數字，value可以是字串、整數、浮點數。
    $.isFloatOrInt = function(input){
        let value = input.val();
        var float = /^\s*(\+|-)?((\d+(\.\d+)?)|(\.\d+))\s*$/;
        if (float.test(value)) {
            return true;
        }else {
            alert("請輸入有效的整數或浮點數。");
            input.val(0);
            return false;
        }
    }

    $.datepicker.setDefaults( $.datepicker.regional[ "zh-TW" ] );

    $.extend(true, $.fn.dataTable.defaults, {
		"language": {
			"processing":   	"處理中...",
			"loadingRecords": 	"載入中...",
			"lengthMenu":   	"顯示 _MENU_ 項結果",
			"zeroRecords":  	"沒有符合的結果",
			"info":         	"顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
			"infoEmpty":    	"顯示第 0 至 0 項結果，共 0 項",
			"infoFiltered": 	"(從 _MAX_ 項結果中過濾)",
			"infoPostFix":  	"",
			"search":       	"搜尋:",
			"paginate": {
				"first":    	"第一頁",
				"previous": 	"上一頁",
				"next":     	"下一頁",
				"last":     	"最後一頁"
			},
			"aria": {
				"sortAscending":  ": 升冪排列",
				"sortDescending": ": 降冪排列"
			}
		}
    });

    $.isUrl = function (url) {
        var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
        return regexp.test(url);
    }

    $.getCookie = function(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
    }
    
    $('#logoutBtn').click(function(){
        $('#logout_form').submit();
    });

    $('#logout_form').submit(function(e){
        e.preventDefault();

        let url = $(this).attr('action');

        $('#LogoutMsgModal_good').css({'display':'none'});
        $('#LogoutMsgModal_error').css({'display':'none'});
        $('#LogoutMsgModal_spinner').slideDown();
        $('#LogoutMsgModal_msg').html('請稍等...');
        $('#LogoutMsgModal_link').slideUp();
        $('#LogoutMsgModal_close').slideUp();
        $('#LogoutMsgModal').modal('show');
        axios.post(url).then(response => {
            $('#LogoutMsgModal_good').css({'display':'flex'});
            $('#LogoutMsgModal_spinner').css({'display':'none'});
            $('#LogoutMsgModal_msg').html('登出成功');
            $('#LogoutMsgModal_link').attr('href', response.data.url);
            $('#LogoutMsgModal_link').slideDown();
            // console.log(response.data);
        }).catch((error) => {
            console.error('登出時發生錯誤，錯誤訊息：' + error);
            $('#LogoutMsgModal_error').css({'display':'flex'});
            $('#LogoutMsgModal_spinner').css({'display':'none'});
            $('#LogoutMsgModal_msg').html('登出時發生錯誤<br>錯誤訊息：' + error + '<br>');
            $('#LogoutMsgModal_close').slideDown();
        });
    });
});