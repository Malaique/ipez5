$(function() {
    var theHREF;

    $("#dialog-confirm").dialog({
        resizable: false,
        height: 160,
        width: 500,
        autoOpen: false,
        modal: true,
        buttons: {
            "Oui": function() {
                $(this).dialog("close");
                window.location.href = theHREF;
            },
            "Annuler": function() {
                $(this).dialog("close");
            }
        }
    });

    $("#delete-action").click(function(e) {
        e.preventDefault();
        theHREF = $(this).attr("href");
        $("#dialog-confirm").dialog("open");
    });


    $("form input.date-picker").datepicker({
        dateFormat: 'dd/mm/yy',
        defaultDate: null,
        changeYear: true,
        yearRange: '-60:-16',
        firstDay: 1
    }).attr("readonly", "readonly");

});