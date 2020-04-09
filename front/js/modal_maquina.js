$('#delete-modal-maq').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);
    var id = button.data('maquina');

    var modal = $(this);
    modal.find('.modal-title').text('Excluir Máquina #' + id);
    modal.find('#confirm').attr('href', 'delete.php?snum=' + id);
})
