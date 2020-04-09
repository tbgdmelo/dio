/**
 * Passa os dados do fabricante para o Modal, e atualiza o link para exclusão
 */
$('#delete-modal-fabfiltro').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);
    var id_fabfiltro = button.data('fabricantefiltro');

    var modal = $(this);
    modal.find('.modal-title').text('Excluir Fabricante #' + id_fabfiltro);
    modal.find('#confirm').attr('href', 'delete.php?id_fabfiltro=' + id_fabfiltro);
})
