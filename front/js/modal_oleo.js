$('#delete-modal-oleo').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);
    var id = button.data('oleo');

    var modal = $(this);
    modal.find('.modal-title').text('Excluir Oleo #' + id);
    modal.find('#confirm').attr('href', 'delete.php?id_oleo=' + id);
})
