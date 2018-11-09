var datatable;

jQuery(document).ready(function() {

    var edit_url = base_url + 'admin/mission/edit_mission/';

    datatable = initDatatable('#mission_list', base_url + 'admin/mission/get_missions', [
        {
            field: "name",
            title: 'Name',
        }, {
            field: 'image',
            title: 'Image',
            sortable: false,
            template: function(row) {
                try {
                    var json_data = $.parseJSON(row.image);
                    if ( json_data.length > 0 )
                        return '<a target="_blank" href="' + image_path + json_data[0] + '">\
                        <img src="' + image_path + json_data[0] + '" alt="ThumbnailImage" width="100px" height="100px"></a>';
                    else
                        return '';
                } catch ( e )
                {
                    return '';
                }
            }
        }, {
            field: 'video',
            title: 'Video',
            width: 200,
            sortable: false,
            template: function(row) {
                try {
                    var json_data = $.parseJSON(row.video);
                    if ( json_data.length > 0 )
                        return '<video width="200px" height="150px" controls><source src="'+ video_path + json_data[0] +'"></video>';
                    else
                        return '';
                } catch (e) {
                    return '';
                }
            }
        }, {
            field: 'description',
            title: 'Short Description',
            sortable: false
        }, {
            field: 'reward_point',
            title: 'Reward Point'
        }, {
            field: 'max_num',
            title: 'Max Number'
        }, {
            field: 'start_time',
            title: 'Start Time',
            type: 'date',
            format: 'yyyy-mm-dd hh:ii',
        }, {
            field: 'end_time',
            title: 'End Time',
            type: 'date',
            format: 'yyyy-mm-dd hh:ii',
        }, {
            field: 'status',
            title: 'Status',
            width: 80,
            template: function(row) {
                var status = {
                    0: {'title': 'New', 'class': ' m-badge--danger'},
                    1: {'title': 'Half', 'class': ' m-badge--primary'},
                    2: {'title': 'Completed', 'class': ' m-badge--success'}
                };
                return '<span class="m-badge ' + status[row.status].class + ' m-badge--wide">' + status[row.status].title + '</span>';
            }

        }, {
            field: "actions",
            title: "Actions",
            sortable: false,
            overflow: 'visible',
            template: function (row, index, datatable) {
                var template = '<a href="'+edit_url + row.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View details">\
                    <i class="la la-edit"></i>\
                </a>\
                <a href="#" onclick="delete_mission('+row.id+')" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">\
                    <i class="la la-trash"></i>\
                </a>\
                ';
                return template;
            }
        }]
    );

    datatable.columns('video').visible(false);

    $('#mission_status').on('change', function() {
        datatable.search($(this).val().toLowerCase(), 'status');
    });

    $('#mission_status').selectpicker();

});

function delete_mission(id) {
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
            $.get(base_url + 'admin/mission/delete_mission/' + id, function (resp) {
                swal(
                    'Deleted!',
                    'Mission has been deleted.',
                    'success'
                ).then(function () {
                    datatable.reload();
                });
            });
        }
    });
}