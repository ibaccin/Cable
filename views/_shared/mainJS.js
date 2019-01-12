
$(document).ready(function(){
    $("#profile_change").click(function(){
        $("#profile_form_change").css("display","flex");
        $(this).css("display","none");
    });

    $("#submit_form").click(function(){
        $("#profile_change").css("display","flex");
        $("#profile_form_change").css("display","none");
    });

    $("#lable_change").click(function(){
        $("#input_change_file").trigger("click");
    });
});