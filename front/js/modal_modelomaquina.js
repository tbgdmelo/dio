$('#delete-modal-modelo').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);
    var id = button.data('modelo');

    var modal = $(this);
    modal.find('.modal-title').text('Excluir Modelo #' + id);
    modal.find('#confirm').attr('href', 'delete.php?id_modelo=' + id);
})
