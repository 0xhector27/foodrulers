$(document).ready(function(){
	$("#country_id").on('change', function(){
		var country_code = $(this).children("option:selected").data('code');
		$(".country_code").text("+" + country_code);
		$("#country_code").val(country_code);
	});
    // phone number format
    $("#phone_number").inputmask("mask", {
        "mask": "(999) 999-9999"
    });
    /*
	* add new admin
	*/
	handleValidation();
	$("#save_btn").click(function(){
		if($("#add_form").valid()){
			$.ajax({
				'url': base_url + 'admin/account/save_admin',
				'type': 'POST',
				'data': $("#add_form").serializeArray(),
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
			})
		}
	});
	$("#reset_btn").click(function(){
		$("$add_form").trigger("reset");
	})
})
var handleValidation = function(){
	$("#add_form").validate({
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
    		password:{
    			required: true,
    			minlength: 6
    		},
    		password_confirm:{
    			required: true,
    			minlength: 6,
    			equalTo: "#password"
    		},
    		country_id:{
    			required: true
    		},
    		group_id:{
    			required: true
    		}
    	},   
    }) 	
}