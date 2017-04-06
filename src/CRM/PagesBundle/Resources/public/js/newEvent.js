$(document).ready(function () {



    $("#crm_pagesbundle_todos_startDate").datetimepicker({
        startDate: new Date()
    });

    $("#crm_pagesbundle_todos_dueDate").datetimepicker({
        startDate: new Date()
    });


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

    //**************************************************************

});

$("#crm_pagesbundle_todos_entity").select2();

