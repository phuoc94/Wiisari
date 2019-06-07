$(function () {
    $(".check").click(function () {
        if ($("#admin").is(":checked") || $("#reports").is(":checked") || $("#time").is(":checked")) {
            $("#password").show();
            $("#password td input").attr("required", "true");
        } else {
            $("#password").hide();
            $("#password td input").val('').removeAttr("required");
        }

        if ($("#reports").is(":checked") || $("#time").is(":checked")) {
            $(".chooseGroups").show();
        } else {
            $(".chooseGroups").hide();
        }
    });
});