$('#btn').on('click', function () {
    console.log('ok');
    $.ajax({
        url: 'get.php',
        data: {
            id: $('#mynumber').val()
        }
    }).done(function (data) {
        $('.result').html(data);
    })
})