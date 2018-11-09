
var dz_thumbnail = null;
var dz_multi = null;

Dropzone.options.thumbnailDropzone = {
    paramName: "file", // The name that will be used to transfer the file
    acceptedFiles: 'image/*',
    maxFiles: 1,
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    dictRemoveFile: "Remove file",
    autoProcessQueue: false,
    init: function() {
        dz_thumbnail = this;
    },
};

// video upload
Dropzone.options.multiDropzone = {
    paramName: "file", // The name that will be used to transfer the file
    acceptedFiles: 'image/*',
    maxFiles: 5,
    maxFilesize: 20, // MB
    addRemoveLinks: true,
    dictRemoveFile: "Remove file",
    autoProcessQueue: false,
    init: function() {
        dz_multi = this;
    },
};

$(document).ready(function(){

    handleValidation();
    $("#save_btn").click(function(){

        if($("#restaurant_form").valid()){

            var formData = new FormData();
            var form = $('#restaurant_form')[0];

            for (var i=0; i<form.length; i++) {
                formData.append(form[i].name, form[i].value);
            }

            for (var i=0; i<dz_thumbnail.files.length; i++)
            {
                formData.append('thumb_image[]', dz_thumbnail.files[i]);
            }

            for (var i=0; i<dz_multi.files.length; i++)
            {
                formData.append('images[]', dz_multi.files[i]);
            }

            process_form_data(
                '',
                base_url + 'admin/restaurant/save_restaurant',
                formData,
                function(resp) {
                    swal({
                        title: resp.msg,
                        text: '',
                        type: 'success'
                    }).then(function(){
                        window.location.href = base_url + 'admin/restaurant';
                    });
                },
                function() {
                    swal({
                        title: 'Failed to save restaurant.',
                        text: '',
                        type: 'error'
                    });
                }
            );
        }
        return false;
    });
});

var handleValidation = function(){
    $("#restaurant_form").validate({
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
    })
}