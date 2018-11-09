$(document).ready(function(){
    handleValidation();
    /*
    * js for admin list datatable
    */
    $("#update_form #country_id").on('change', function(){
        var country_code = $(this).children("option:selected").data('code');
        $(".country_code").text("+" + country_code);
        $("#country_code").value(country_code);
    });
    // phone number format
    $("#update_form #phone_number").inputmask("mask", {
        "mask": "(999) 999-9999"
    });

    $("#update_form #update_btn").click(function(){
        if($("#update_form").valid()){
           $.ajax({
                'url': base_url + 'admin/account/update_profile',
                'type': 'POST',
                'data': $("#update_form").serializeArray(),
                'dataType': 'json',
                success: function(resp){
                    if(resp.status){
                        swal({
                            title: resp.msg,
                            text: '',
                            type: 'success'
                        }).then(function(){
                            window.location.reload();
                        });
                    }
                }
            }); 
        }
        return;
    });     

    $("#password_form #update_password_btn").click(function(){
        if($("#password_form").valid()){
           $.ajax({
                'url': base_url + 'admin/account/update_password',
                'type': 'POST',
                'data': $("#password_form").serializeArray(),
                'dataType': 'json',
                success: function(resp){
                    if(resp.status){
                        swal({
                            title: resp.msg,
                            text: '',
                            type: 'success'
                        }).then(function(){
                            window.location.reload();
                        });
                    } else {
                        swal({
                            title: resp.msg,
                            text: '',
                            type: 'success'
                        }).then(function(){
                        });
                    }
                }
            }); 
        }
        return;
    });     
})

var handleValidation = function(){
    $("#update_form").validate({
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
    });
    $("#password_form").validate({
        rules: {
            old_password:{
                required: true
            },
            password:{
                required: true
            },
            password_confirm:{
                required: true
            }
        }
    });
}