$('#delete-modal-filtro').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);
    var id = button.data('filtro');

    var modal = $(this);
    modal.find('.modal-title').text('Excluir Filtro #' + id);
    modal.find('#confirm').attr('href', 'delete.php?id_filtro=' + id);
})
