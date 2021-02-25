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

let qhn =
{
    openModal: function (url) {
        $.get(url, function (data) {
            let $modal = $('<div class="modal fade modal-size-large" role="dialog" aria-labelledby="" aria-hidden="true">' + data + '</div>');
            $('body').append($modal);
            $modal.modal({backdrop: 'static', keyboard: false}).on('hidden.bs.modal', function (e) {
                $modal.remove();
            });
        });
    },
}
