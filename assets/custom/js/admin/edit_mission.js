jQuery(document).ready(function(){
	$('#edit_mission').mDatatable({
        data: {
            saveState: {cookie: false},
        },
        search: {
            input: $('#generalSearch'),
        },
        columns: [
            {
              field: 'Date Created',
              type: 'date',
              format: 'YYYY-MM-DD HH:mm:ss',
            }, {
              field: 'Status',
              title: 'Status',
              // callback function support for column rendering
              template: function(row) {
                var status = {
                  0: {'title': 'Active', 'class': ' m-badge--primary'},
                  1: {'title': 'Completed', 'class': ' m-badge--danger'},
                };
                return '<span class="m-badge ' + status[row.Status].class + ' m-badge--wide">' + status[row.Status].title + '</span>';
              },
            }
        ],
    });

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
            url: base_url + 'admin/mission/update_mission',
            success: function() {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'Mission has been updated',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    location.href = base_url + 'admin/mission/mission_list';
                });
            }
        });
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