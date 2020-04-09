$('#delete-modal-plano').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);
    var id = button.data('plano');

    var modal = $(this);
    modal.find('.modal-title').text('Excluir Plano #' + id);
    modal.find('#confirm').attr('href', 'delete.php?id_plano=' + id);
})
