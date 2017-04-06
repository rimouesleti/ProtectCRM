


$(document).ready(function () {

    $("#crm_pagesbundle_todos_startDate").datetimepicker();
    $("#crm_pagesbundle_todos_dueDate").datetimepicker();
    //*************************************************************


    var $note = $(".summernote");
    $note.summernote({
        oninit: function () {
            if ($note.code() == "" || $note.code().replace(/(<([^>]+)>)/ig, "") == "") {
                $note.code($note.attr("placeholder"));
            }
        }, onfocus: function (e) {
            if ($note.code() == $note.attr("placeholder")) {
                $note.code("");
            }
        }, onblur: function (e) {
            if ($note.code() == "" || $note.code().replace(/(<([^>]+)>)/ig, "") == "") {
                $note.code($note.attr("placeholder"));
            }
        }, onkeyup: function (e) {
            $("span[for='noteEditor']").remove();
        },
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']]
        ]
    });

});

$("#crm_pagesbundle_todos_entity").select2();

//***********************************************************
//$('.selectpicker').selectpicker();


$("select[name='crm_pagesbundle_todos[user]']").val(1);
$('#crm_pagesbundle_todos_user').selectpicker('refresh');

$("#crm_pagesbundle_todos_status option").each(function (index, value) {
    var option = $(this);
    if (option.val() === "completed") {
        option.attr('data-content', "<span class='label label-success'>completed</span>");
    }
    else if (option.val() === "planned") {
        option.attr('data-content', "<span class='label label-info'>planned</span>");
    }
    else if (option.val() === "cancelled") {
        option.attr('data-content', "<span class='label label-danger'>cancelled</span>");
    }
    else if (option.val() === "held") {
        option.attr('data-content', "<span class='label label-warning'>held</span>");
    }

});


