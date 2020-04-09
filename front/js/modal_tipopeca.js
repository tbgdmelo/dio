
$('#delete-modal-tipo').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);
    var id = button.data('tipopeca');

    var modal = $(this);
    modal.find('.modal-title').text('Excluir Tipo de Peça #' + id);
    modal.find('#confirm').attr('href', 'delete.php?id_tipo=' + id);
})
