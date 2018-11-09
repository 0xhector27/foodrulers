jQuery(document).ready(function(){
    $('#start_time, #end_time').datetimepicker({
        todayHighlight: true,
        autoclose: true,
        pickerPosition: 'bottom-left',
        format: 'yyyy-mm-dd hh:ii'
    });

    $('#save_btn').click(function() {
        handleValidation();
        var form = $('#edit_form');
        form.ajaxSubmit({
            url: base_url + 'admin/challenge/update_challenge',
            success: function() {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'Challenge has been updated',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    location.href = base_url + 'admin/challenge/challenge_list';
                });
            }
        });

        return false;
    })
});

var handleValidation = function(){
    $("#add_form").validate({
        rules: {
            name:{
                required: true
            },
            reward_point:{
                required: true
            },
            max_num:{
                required: true
            },
            start_time:{
                required: true
            },
            end_time:{
                required: true
            }
        },
    });
}