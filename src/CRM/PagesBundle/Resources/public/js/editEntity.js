
//*************************************************************
$("#uploadBTN").bind("click", function(event) {
    event.stopPropagation();
    event.preventDefault();
    $("#crm_pagesbundle_entities_file").click();
});

//*************************************************************
var $note = $(".summernote");
$note.summernote({
    oninit: function() {
        if ($note.code() == "" || $note.code().replace(/(<([^>]+)>)/ig, "") == "") {
            $note.code($note.attr("placeholder"));
        }
    }, onfocus: function(e) {
        if ($note.code() == $note.attr("placeholder")) {
            $note.code("");
        }
    }, onblur: function(e) {
        if ($note.code() == "" || $note.code().replace(/(<([^>]+)>)/ig, "") == "") {
            $note.code($note.attr("placeholder"));
        }
    }, onkeyup: function(e) {
        $("span[for='noteEditor']").remove();
    },
    toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['link', 'table']]
    ]
});

//*************************************************************

$("#crm_pagesbundle_entities_speciality").select2();

//************************************************************
$("#crm_pagesbundle_contact_gender").select2();
$("#crm_pagesbundle_contact_function").select2();
$("#crm_pagesbundle_contact_entity").select2();
$("#crm_pagesbundle_entities_contact").select2();