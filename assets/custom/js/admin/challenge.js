var datatable;

jQuery(document).ready(function() {

    var accept_url = base_url + 'admin/request/accept_challenge/';

    datatable = initDatatable('#request_challenge', base_url + 'admin/request/get_request_challenge', [
        {
            field: "f_name",
            title: 'Member Name',
        }, {
            field: "challenge_name",
            title: 'Challenge Name',
        }, {
            field: 'video_review',
            title: 'Video Review',
            width: 200,
            sortable: false,
            template: function(row) {
                return '<video width="200px" height="150px" controls><source src="'+ video_path + row.video_review +'"></video>';
            }
        }, {
            field: 'created_at',
            title: 'Date Created',
            type: 'date',
            format: 'yyyy-mm-dd hh:ii',
        }, {
            field: 'status',
            title: 'Status',
            template: function(row) {
                var status = {
                    0: {'title': 'Request', 'state': 'primary'},
                    1: {'title': 'Accept', 'state': 'success'},
                    2: {'title': 'Reject', 'state': 'danger'}
                };
                return '<span class="m-badge m-badge--' + status[row.status].state + ' m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-' + status[row.status].state + '">' +
                    status[row.status].title + '</span>';
            }

        }, {
            field: "actions",
            title: "Actions",
            sortable: false,
            overflow: 'visible',
            template: function (row, index, datatable) {
                var template = '<a style="color:white" onclick="accept_trip('+row.id+')" class="btn m-btn--pill m-btn--air btn-success" role="button">Accept</a>\
                <br><a style="color:white" onclick="reject_trip('+row.id+')" class="btn m-btn--pill m-btn--air  btn-danger m--margin-top-10" role="button">Reject</a>';
                return template;
            }
        }]
    );

    $('#challenge_status').on('change', function() {
        datatable.search($(this).val().toLowerCase(), 'a.status');
    });

    $('#challenge_status').selectpicker();

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
            $.get(base_url + 'admin/member/delete_member/' + id, function (resp) {
                swal(
                    'Deleted!',
                    'Member has been deleted.',
                    'success'
                ).then(function () {
                    location.href = base_url + 'admin/member/member_list';
                });
            });
        }
    });
}