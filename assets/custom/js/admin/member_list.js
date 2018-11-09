var datatable;

jQuery(document).ready(function () {

    datatable = initDatatable('#member_list', base_url + 'admin/member/get_members', [
    {
        field: "f_name",
        title: 'First Name',
    }, {
        field: 'l_name',
        title: 'Last Name',
    }, {
        field: 'user_id',
        title: 'User ID'
    }, {
        field: 'email',
        title: 'Email',
        sortable: false
    }, {
        field: 'created_at',
        title: 'Date Created',
        type: 'date',
        format: 'YYYY-MM-DD HH:mm:ss',
    }, {
        field: 'is_login',
        title: 'Is Login',
        template: function(row) {
            var status = {
                0: {'title': 'Logout', 'class': ' m-badge--primary'},
                1: {'title': 'Login', 'class': ' m-badge--danger'}
            };
            return '<span class="m-badge ' + status[row.is_login].class + ' m-badge--wide">' + status[row.is_login].title + '</span>';
        }

    }, {
            field: 'is_block',
            title: 'Status',
            template: function(row) {
                var status = {
                    0: {'title': 'Normal', 'class': ' m-badge--primary'},
                    1: {'title': 'Time-Blocked', 'class': ' m-badge--danger'},
                    2: {'title': 'Blocked', 'class': ' m-badge--warning'}
                };
                return '<span class="m-badge ' + status[row.is_block].class + ' m-badge--wide">' + status[row.is_block].title + '</span>';
            }

        }, {
        field: "actions",
        title: "Actions",
        sortable: false,
        overflow: 'visible',
        template: function (row, index, datatable) {
            var template = '<a href="#" onclick="edit_member('+row.id+')" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Details">\
                <i class="la la-edit"></i>\
            </a>\
            <a href="#" onclick="block_member('+row.id+')" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="Block">\
                <i class="la la-ban"></i>\
            </a>\
            <a href="#" onclick="delete_member('+row.id+')" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">\
                <i class="la la-trash"></i>\
            </a>\
            ';
            return template;
        }

    }]);
    
    $('#account_status').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'status');
    });

    $('#account_status').selectpicker();

    handleValidation();

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
                'url': base_url + 'admin/member/update_member',
                'type': 'POST',
                'data': $("#edit_form").serializeArray(),
                'dataType': 'json',
                success: function(resp){
                    if(resp.status){
                        $('#edit_modal').modal('hide');
                        swal({
                            title: resp.msg,
                            text: '',
                            type: 'success'
                        }).then(function(){
                            datatable.reload();
                        });
                    }
                }
            });
        }
        return;
    });

});

function delete_member (id) {
    swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                'url': base_url + 'admin/member/del_member',
                'type': 'POST',
                'data': {id: id},
                'dataType': 'json',
                success: function(resp){
                    swal({
                        title: resp.msg,
                        text: '',
                        type: 'success'
                    }).then(function(){
                        datatable.reload();
                    });
                }
            })
        }
    });
}

function block_member (id) {
    swal({
        title: "Blocking Type",
        text: "Choose your blocking type",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Time-Blocked',
        cancelButtonText: 'Blocked',
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                'url': base_url + 'admin/member/block_member',
                'type': 'POST',
                'data': {id: id, type: 1},
                'dataType': 'json',
                success: function(resp){
                    swal({
                        title: resp.msg,
                        text: '',
                        type: 'success'
                    }).then(function(){
                        datatable.reload();
                    });
                }
            })
        } else if ( result.dismiss == "cancel" )
        {
            $.ajax({
                'url': base_url + 'admin/member/block_member',
                'type': 'POST',
                'data': {id: id, type: 2},
                'dataType': 'json',
                success: function(resp){
                    swal({
                        title: resp.msg,
                        text: '',
                        type: 'success'
                    }).then(function(){
                        datatable.reload();
                    });
                }
            })
        }
    });
}

function edit_member(id){
    $.ajax({
        'url': base_url + 'admin/member/get_member',
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
            $("#edit_modal").modal('show');
        }
    })
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