$(document).ready(function () {
    $(".preview-comment").hide();

    $("#preview").click(function () {


        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();

        var date = new Date();
        var strDate = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate()
            + ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();

        $("#preview-name").html(name);
        $("#preview-email").html(email);
        $("#preview-date").html(strDate);
        $("#preview-message").html(message);

        $(".message-form").hide();
        $(".preview-comment").show();
    });

    $("#back-button").click(function(){
        $(".preview-comment").hide();
        $(".message-form").show();
    });
});