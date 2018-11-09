
var dropzone_images = null;
var dropzone_video = null;

Dropzone.options.missionImages = {
    paramName: "file", // The name that will be used to transfer the file
    acceptedFiles: 'image/*',
    maxFiles: 5,
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    dictRemoveFile: "Remove file",
    autoProcessQueue: false,
    init: function() {
        dropzone_images = this;
    },
};

// video upload
Dropzone.options.missionVideo = {
    paramName: "file", // The name that will be used to transfer the file
    acceptedFiles: '.mp4, .3gp, .avi',
    maxFiles: 5,
    maxFilesize: 20, // MB
    addRemoveLinks: true,
    dictRemoveFile: "Remove file",
    autoProcessQueue: false,
    init: function() {
        dropzone_video = this;
    },
};

$(document).ready(function(){

    // select start time and end time
    $('#start_time, #end_time').datetimepicker({
        todayHighlight: true,
        autoclose: true,
        pickerPosition: 'bottom-left',
        format: 'yyyy-mm-dd hh:ii'
    });

    handleValidation();
    $("#save_btn").click(function(){

        if($("#add_form").valid()){

            var formData = new FormData();
            var form = $('#add_form')[0];

            for (var i=0; i<form.length; i++) {
                formData.append(form[i].name, form[i].value);
            }

            for (var i=0; i<dropzone_images.files.length; i++)
            {
                formData.append('images[]', dropzone_images.files[i]);
            }

            for (var i=0; i<dropzone_video.files.length; i++)
            {
                formData.append('video[]', dropzone_video.files[i]);
            }

            process_form_data(
                '',
                base_url + 'admin/mission/save_mission',
                formData,
                function(resp) {
                    swal({
                        title: resp.msg,
                        text: '',
                        type: 'success'
                    }).then(function(){
                        window.location.href = base_url + 'admin/mission/mission_list';
                    });
                },
                function() {
                    swal({
                        title: 'Failed to save mission.',
                        text: '',
                        type: 'error'
                    });
                }
            );
        }
    });
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
    })
}