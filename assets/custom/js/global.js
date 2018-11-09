var base_url = $('#base_url').val();
var image_path = base_url + 'upload/image/';
var video_path = base_url + 'upload/video/';
var audio_path = base_url + 'upload/audio/';

// Dropzone.autoDiscover = false;

//ajax-table init
var initDatatable = function(selector, url, columns) {
	return $(selector).mDatatable({ // datasource definition
		data: {
			type: 'remote',
			source: {
				read: {
					// sample GET method
					method: 'GET',
					url: url,
					map: function (raw) {
						// sample data mapping
						var dataSet = raw;
						if (typeof raw.data !== 'undefined') {
							dataSet = raw.data;
						}
						return dataSet;
					},
				},
			},
			pageSize: 10,
			serverPaging: true,
			serverFiltering: true,
			serverSorting: true,
		},
		// layout definition
		layout: {
			scroll: false,
			footer: false
		},
		// column sorting
		sortable: true,

		pagination: true,

		toolbar: {
			// toolbar items
			items: {
				// pagination
				pagination: {
					// page size select
					pageSizeSelect: [10, 20, 30, 50, 100],
				},
			}
		},

		search: {
			input: $('#generalSearch'),
		},

		// columns definition
		columns: columns,
	});
}

var show_simple_alert = function (title, text, type) {
    swal(
        title,
        text,
        type
    );
};

var process_form_data = function (blockDiv, url, data, successCallback, errorCallback) {
    if (!blockDiv && blockDiv != '') {
        $('#' + blockDiv).prop('disabled', true);
    }
    $(document.body).css({'cursor' : 'wait'});

    var request = new XMLHttpRequest();
    request.open("POST", url);

    request.onload = function() {
        var resp;
        resp = JSON.parse(request.responseText);

        $(document.body).css({'cursor' : 'default'});
        if (!blockDiv && blockDiv != '') $('#' + blockDiv).prop('disabled', false);

        if (resp.status) {
            successCallback(resp);
        } else {
            errorCallback(resp);
        }
        return;
    };
    request.send(data);
};
