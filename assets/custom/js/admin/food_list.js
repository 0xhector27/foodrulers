var datatable;

jQuery(document).ready(function() {

    var edit_url = base_url + 'admin/food/edit_food/';

    datatable = initDatatable('#food_list', base_url + 'admin/food/get_food_list', [
        {
            field: "name",
            title: 'Food Name',
        }, {
            field: 'rest_name',
            title: 'Restaurant Name'
        }, {
            field: 'thumb_image',
            title: 'Image',
            sortable: false,
            template: function(row) {
                return '<a target="_blank" href="'+ image_path + row.thumb_image +'">\
                <img src="'+ image_path + row.thumb_image +'" alt="ThumbnailImage" width="100px" height="100px"></a>';
            }
        }, {
            field: 'type',
            title: 'Food Type'
        }, {
            field: 'rating',
            title: 'Rating'
        }, {
            field: 'price',
            title: 'Price'
        }, {
            field: 'description',
            title: 'Short Description',
            width: 300
        }, {
            field: 'created_at',
            title: 'Date Created',
            type: 'date',
            format: 'YYYY-MM-DD HH:mm:ss',
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

    $('#restaurant').on('change', function() {
        datatable.search($(this).val().toLowerCase(), 'restaurant_id');
    });

    $('#restaurant').selectpicker();

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
            $.get(base_url + 'admin/food/del_food/' + id, function (resp) {
                swal(
                    'Deleted!',
                    'Food has been deleted.',
                    'success'
                ).then(function () {
                    datatable.reload();
                });
            });
        }
    });
}