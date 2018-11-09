var datatable;

jQuery(document).ready(function() {

    var edit_url = base_url + 'admin/restaurant/edit_restaurant/';

    datatable = initDatatable('#restaurant_list', base_url + 'admin/restaurant/get_restaurant_list', [
        {
            field: "rest_name",
            title: 'Name',
        }, {
            field: "f_name",
            title: 'Owner',
        }, {
            field: 'thumb_image',
            title: 'Image',
            sortable: false,
            template: function(row) {
                return '<a target="_blank" href="'+ image_path + row.thumb_image +'">\
                <img src="'+ image_path + row.thumb_image +'" alt="ThumbnailImage" width="100px" height="100px"></a>';
            }
        }, {
            field: 'description',
            title: 'Short Description',
            width: 300
        }, {
            field: 'address',
            title: 'Address',
            width: 200
        }, {
            field: 'website_url',
            title: 'Website URL',
            width: 200
        }, {
            field: 'phone_number',
            title: 'Phone Number'
        }, {
            field: 'average_rating',
            title: 'Rating',
        }, {
            field: '',
            title: 'Location',
            template: function(row){
                return row.latitude + " , " + row.longitude;
            }
        }, {
            field: "actions",
            title: "Actions",
            width: 80,
            sortable: false,
            overflow: 'visible',
            template: function (row, index, datatable) {
                var template = '<a href="'+edit_url + row.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View details">\
                    <i class="la la-edit"></i>\
                </a>\
                <a href="#" onclick="delete_restaurant('+row.id+')" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">\
                    <i class="la la-trash"></i>\
                </a>\
                ';
                return template;
            }
        }]
    );
});

function delete_restaurant(id) {
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
            $.post(base_url + 'admin/restaurant/delete_restaurant/' + id, function (resp) {
                datatable.reload();
                swal(
                    'Deleted!',
                    'Restaurant has been deleted.',
                    'success'
                ).then(function () {
                });
            });
        }
    });
}