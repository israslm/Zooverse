$(document).ready(function () {
    $('#submit_signup_button').click(function () {
        var email = $('#email').val()
        var password = $('password').val()
        console.log('Simple var log : ' + email)

        class User {
            constructor(login, password) {
                this.login = login
                this.password = password
            }
        }
        let user = new User(email, password)
        console.log('User class email attribute log : ' + user.login)

        sessionStorage.setItem('User', JSON.stringify(user))
        var user_json = sessionStorage.getItem('User')
        var user_object = JSON.parse(user_json)
        console.log('User class email attribute from sessionStorage : ' + user_object.login)

        swal({
            title: 'Are you sure?',
            text: 'You try to sign in as : ' + email,
            icon: 'warning',
            buttons: true,
        }).then((willContinue) => {
            if (willContinue) {
                $('#form').submit()
            }
        })

        $.ajax('//dsagdullin.alwaysdata.net/signupPages/verificationSignup.php', {
            success: function (data, textStatus, jqXHR) {
                console.log(jqXHR.status)
            },
            error: function (xhr, status, error) {
                console.log(xhr.status)
            },
        })
    })
})
