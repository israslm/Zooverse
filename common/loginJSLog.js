$(document).ready(function () {
    $('#submit_button').click(function () {
        let email = $('#email').val()
        let password = $('#password').val()
        $.ajax('//dsagdullin.alwaysdata.net/loginPages/verification.php', {
            type: 'GET',
            data: 'email=' + email + '&password=' + password,
            success: function (data, textStatus, jqXHR) {
                console.log(jqXHR.status)
            },
            error: function (xhr, status, error) {
                console.log(xhr.status)
            },
        })
    })
})
