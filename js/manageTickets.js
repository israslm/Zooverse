$(document).ready(function () {
    $('#select_ticket_id').change(function () {
        $.ajax('//dsagdullin.alwaysdata.net/ticketPages/partials/searchTicketPart.php', {
            method: 'POST',
            data: {
                select_ticket_id: $('#select_ticket_id').val(),
            },
            success: function (resultat) {
                $('#manageTicketPart').html(resultat)
            },
        })
    })
})
