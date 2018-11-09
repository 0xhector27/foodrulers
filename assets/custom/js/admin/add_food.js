
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

        if($("#food_form").valid()){

            var formData = new FormData();
            var form = $('#food_form')[0];

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
                base_url + 'admin/food/save_food',
                formData,
                function(resp) {
                    swal({
                        title: resp.msg,
                        text: '',
                        type: 'success'
                    }).then(function(){
                        window.location.href = base_url + 'admin/food';
                    });
                },
                function() {
                    swal({
                        title: 'Failed to save food.',
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
    $("#food_form").validate({
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

function add_to_dz(input)
{
    var file = input.files[0];
    console.log(input.files[0]);
    // console.log(dz_multi.emit('addedFile', input.files[0]));
    dz_multi.files.push(file);

    file.status = Dropzone.ADDED;

    dz_multi.emit("addedfile", file);

    dz_multi._enqueueThumbnail(file);
}