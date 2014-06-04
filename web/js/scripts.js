$(function() {
    var theHREF;

    $("#dialog-confirm").dialog({
        resizable: false,
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

});