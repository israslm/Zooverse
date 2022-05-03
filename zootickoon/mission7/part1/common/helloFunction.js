$(document).ready(function () {
    //click sur l'id btn
    $('#btn').click(function () {
        var user_json = sessionStorage.getItem('User')
        var user_object = JSON.parse(user_json)
        $.ajax(
            '//dsagdullin.alwaysdata.net/common/hello.php', //appel de bonjour.php sur le serveur web
            {
                type: 'GET',
                success: function (resultat) {
                    $('#result').html(resultat + user_object.login)
                },
            }
        )
    })
})
