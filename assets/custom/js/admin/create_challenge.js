var dropzone_images = null;
var dropzone_video = null;

Dropzone.options.challengeImage = {
    paramName: "image", // The name that will be used to transfer the file
    maxFiles: 5,
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    acceptedFiles: "image/*",
    init: function() {
        dropzone_images = this;
    },
};
// video upload
Dropzone.options.challengeVideo = {
    paramName: "video", // The name that will be used to transfer the file
    maxFiles: 1,
    maxFilesize: 20, // MB
    addRemoveLinks: true,
    acceptedFiles: ".mp4, .avi, .3gp",
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
        console.log('save');
        if($('#challenge_add_form').valid()){

            var formData = new FormData();
            var form = $('#challenge_add_form')[0];

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
                base_url + 'admin/challenge/save_challenge',
                formData,
                function(resp) {
                    swal({
                        title: resp.msg,
                        text: '',
                        type: 'success'
                    }).then(function(){
                        window.location.href = base_url + 'admin/challenge/challenge_list';
                    });
                },
                function() {
                    swal({
                        title: 'Failed to save challenge.',
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
    $("#challenge_add_form").validate({
        rules: {
            name:{
                required: true
            },
            reward_point:{
                required: true
            },
            reward_num:{
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