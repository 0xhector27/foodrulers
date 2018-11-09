var datatable;

jQuery(document).ready(function() {

    var accept_url = base_url + 'admin/request/approve_trip/';

    datatable = initDatatable('#request_mission', base_url + 'admin/request/get_request_mission', [
        {
            field: "f_name",
            title: 'Member Name',
        }, {
            field: "mission_name",
            title: 'Mission Name',
        }, {
            field: "trip_name",
            title: 'Trip Name',
        }, {
            field: "food_name",
            title: 'Food Name',
        }, {
            field: "rating",
            title: 'Rating',
        }, {
            field: "message",
            title: 'Message',
        }, {
            field: 'image',
            title: 'Image',
            sortable: false,
            template: function(row) {
                return '<a target="_blank" href="'+ image_path + row.image +'">\
                <img src="'+ image_path + row.image +'" alt="ThumbnailImage" width="100px" height="100px"></a>';
            }
        }, {
            field: 'video',
            title: 'Video',
            width: 200,
            sortable: false,
            template: function(row) {
                return '<video width="200px" height="150px" controls><source src="'+ video_path + row.video +'"></video>';
            }
        }, {
            field: 'voice',
            title: 'Voice',
            sortable: false,
            template: function(row) {
                return '<audio controls><source src="'+ audio_path + row.voice +'"></audio>';
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

    $('#mission_status').on('change', function() {
        datatable.search($(this).val().toLowerCase(), 'a.status');
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