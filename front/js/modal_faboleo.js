/**
 * Passa os dados do fabricante para o Modal, e atualiza o link para exclusão
 */
$('#delete-modal-faboleo').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);
    var id = button.data('faboleo');

    var modal = $(this);
    modal.find('.modal-title').text('Excluir Fabricante #' + id);
    modal.find('#confirm').attr('href', 'delete.php?id_faboleo=' + id);
})
