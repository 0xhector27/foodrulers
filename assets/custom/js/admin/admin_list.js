$(document).ready(function(){
    handleValidation();
	/*
	* js for admin list datatable
	*/
	var datatable = $('#admin_list').mDatatable({
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
	    }
	});

    $("#country_id").on('change', function(){
        var country_code = $(this).children("option:selected").data('code');
        $(".country_code").text("+" + country_code);
        $("#country_code").value(country_code);
    });
    // phone number format
    $("#phone_number").inputmask("mask", {
        "mask": "(999) 999-9999"
    });

    $("#update_btn").click(function(){
        if($("#edit_form").valid()){
           $.ajax({
                'url': base_url + 'admin/account/update_admin',
                'type': 'POST',
                'data': $("#edit_form").serializeArray(),
                'dataType': 'json',
                success: function(resp){
                    if(resp.status){
                        swal({
                            title: resp.msg,
                            text: '',
                            type: 'success'
                        }).then(function(){
                            window.location.href = base_url + 'admin/account/admin_list';
                        });
                    }
                }
            }); 
        }
        return;
    }); 	
})

function edit_admin(id){
    $.ajax({
        'url': base_url + 'admin/account/get_admin',
        'type': 'POST',
        'data': {id: id},
        'dataType': 'json',
        success: function(resp){
            $("#id").val(resp.data['id']);
            $("#f_name").val(resp.data['f_name']);
            $("#l_name").val(resp.data['l_name']);
            $("#user_id").val(resp.data['user_id']);
            $("#email").val(resp.data['email']);
            $("#country_id").val(resp.data['cid']);
            $("#country_code").val(resp.data['code']);
            $("#phone_number").val(resp.data['phone_number']);
            $("#city").val(resp.data['city']);
            $("#address").val(resp.data['address']);
            $("#group_id").val(resp.data['gid']);
            $("#edit_modal").modal('show');
        }
    })
}

function del_admin(id){
    var del_id = id;
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
                'url': base_url + 'admin/account/del_admin',
                'type': 'POST',
                'data': {id: del_id},
                'dataType': 'json',
                success: function(resp){
                    swal({
                        title: resp.msg,
                        text: '',
                        type: 'success'
                    }).then(function(){
                        window.location.href = base_url + 'admin/account/admin_list';
                    });
                }
            })
        }
        return;
    });
}

var handleValidation = function(){
    $("#edit_form").validate({
        rules: {
            f_name:{
                required: true
            },
            l_name:{
                required: true
            },
            user_id:{
                required: true
            },
            email:{
                required: true,
                email: true,
            },
            country_id:{
                required: true,
            },
            group_id:{
                required: true
            }
        }
    })      
}