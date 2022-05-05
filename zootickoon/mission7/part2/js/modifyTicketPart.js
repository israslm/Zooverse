$('#update_ticket_button').click(function () {
    $.ajax('//dsagdullin.alwaysdata.net/ticketPages/partials/updateticketPart.php', {
        method: 'POST',
        data: {
            select_new_status: $('#select_new_status').find(':selected').text(),
            select_ticket_id: $('#select_ticket_id').val(),
        },
        success: function (resultat) {
            $('#buttonToUpdateTicket').html(resultat)
        },
    })
})
