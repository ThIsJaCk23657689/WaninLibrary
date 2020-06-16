<template>
    <!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			使用者登入日誌
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table id="LoginLogsDataTable" class="table table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>使用者姓名</th>
                            <th>登入時間</th>
                            <th>登出時間</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                </table>
			</div>
		</div>
	</div>
</template>

<script>
export default {
    props: ['loginlogs', 'loginlogsjson'],
    data(){
        return {

        }
    },
    methods: {

    },
    created(){

    },
    mounted(){






    }
}
</script>

<style>
</style>
