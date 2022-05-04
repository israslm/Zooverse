$('#modify_ticket_button').click(function () {
    $.ajax('//dsagdullin.alwaysdata.net/ticketPages/partials/modifyTicketPart.php', {
        method: 'POST',
        data: {
            select_ticket_id: $('#select_ticket_id').val(),
        },
        success: function (resultat) {
            $('#manageTicketPart').html(resultat)
        },
    })
})
