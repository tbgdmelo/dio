
$('#delete-modal-lub').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);
    var id = button.data('lub');

    var modal = $(this);
    modal.find('.modal-title').text('Excluir Lubrificação #' + id);
    modal.find('#confirm').attr('href', 'delete.php?id_lubrificacao=' + id);
})
