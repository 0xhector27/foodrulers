$(document).ready(function(){
	/*
	* js for admin list datatable
	*/
	var datatable = $('#admin_group').mDatatable({
		data: {
			saveState: {cookie: false},
		},
		search: {
			input: $('#generalSearch'),
		},
		// layout definition
	    layout: {
	        scroll: false,
	        footer: false
	    },
	    columns: [
			{
				field: 'Group Name',
				sortable: false
			},{
				field: 'Number of Admin',
				type: 'number',
				sortable: false
			},{
				field: 'Actions',
				sortable: false
			}
		]
	});
	/*
	* add new group
	*/
	$("#save_btn").click(function(){
		$("#add_form").validate({
			rules:{
				new_group: {
					required: true
				}
			}
		})
		if($("#add_form").valid()){
			$.ajax({
				'url': base_url + 'admin/account/add_group',
				'type': 'POST',
				'data': $("#add_form").serializeArray(),
				'dataType': 'json',
				success: function(resp){
					if(resp.status){
						alert_success(resp.msg);
					}
				}
			})
		}
	});
	/*
	* edit group
	*/
	$(".edit_btn").on('click', function(){
		var edit_group = $(this).data('group_name');
		var group_id = $(this).data('id');
		$("#edit_group").val(edit_group);
		$("#group_id").val(group_id);
		$("#edit_modal").modal('show');
	})

	$(".delete_btn").on('click', function(){
		var del_id = $(this).data('id');
		swal({
	        title: "Are you sure?",
	        text: "You will not be able to recover this!",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonText: "Yes",
	        cancelButtonText: "No"
		}).then(function(result) {
	        if (result.value) {
				$.ajax({
					'url': base_url + 'admin/account/delete_group',
					'type': 'POST',
					'data': {id: del_id},
					'dataType': 'json',
					success: function(resp){
						if(resp.status){
							alert_success(resp.msg);
						}
					}
				})
	        }
	        return;
	    });
	})
	$("#update_btn").click(function(){
		$("#edit_form").validate({
			rules:{
				edit_group: {
					required: true
				}
			}
		})
		if($("#edit_form").valid()){
			$.ajax({
				'url': base_url + 'admin/account/update_group',
				'type': 'POST',
				'data': $("#edit_form").serializeArray(),
				'dataType': 'json',
				success: function(resp){
					if(resp.status){
						alert_success(resp.msg);
					}
				}
			})
		}
	})
})
var alert_success = function(success_msg){
	swal({
		title: success_msg,
		text: '',
		type: 'success'
	}).then(function(){
		window.location.href = base_url + 'admin/account/admin_group';
	});
}

var alert_fail = function(error_msg){
	swal({
		title: error_msg,
		text: '',
		type: 'error'
	}).then(function(){
		return;
	});
}