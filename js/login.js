$(document).ready(function () {
    $('#submit_login_button').click(function () {
        $.ajax('//dsagdullin.alwaysdata.net/loginPages/verificationLogin.php', {
            success: function (data, textStatus, jqXHR) {
                console.log(jqXHR.status)
            },
            error: function (xhr, status, error) {
                console.log(xhr.status)
            },
        })
    })
})
