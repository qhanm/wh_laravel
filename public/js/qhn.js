$(document).on('ready pjax:end', function(event) {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
    });

    $('.select2').select2();
})


$(document).on('submit', 'form[data-pjax]', function(event) {
    event.preventDefault();

    let pjax = $(this).parent();

    $.pjax.submit(event, '#' + $(pjax).attr('id'));
})
