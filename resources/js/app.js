require('./bootstrap');

$('#logout').on('click', function (event) {
    event.preventDefault();
    $('#confirmation-logout').modal('show');
});