/**
 * Created by yevhen1992 on 04/12/2016.
 */
$(document).on('ready', function() {

    $("#formuploadajax").on("submit", function (e) {
        e.preventDefault();
        var f = $(this);
        //get form data
        var formData = new FormData(document.getElementById("formuploadajax"));
        //send form data
        $.ajax({
            url: "http://localhost:9898/startbootstrap-clean-blog/controller/PostController.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function (data) {
                $("#sendPost").html('<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a> <strong>Success!</strong>request has been sent</div>');
                $("#title, #message, #file1").val('');

            }).fail(function (data) {
            $("#sendPost").html('<div class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a> <strong>Wrong!</strong> not successfuly </div>');

        });
    });
});