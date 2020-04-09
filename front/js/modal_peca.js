$('#delete-modal-peca').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);
    var id = button.data('peca');

    var modal = $(this);
    modal.find('.modal-title').text('Excluir Peça #' + id);
    modal.find('#confirm').attr('href', 'delete.php?id_peca=' + id);
})
