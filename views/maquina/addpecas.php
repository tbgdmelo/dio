<?php 
  require_once('../../src/maquina/functions.php'); 
  addPecas();
  listPecas();
?>
<h2>Adicionar Peças na Máquina <?php echo $maquina['snum']; ?></h2>

<form action="addpecas.php" method="post" enctype="multipart/form-data">
  <!-- area de campos do form -->
  <hr />
  <input type="text" class="form-control" value="KOH1050" name="peca_maquina['serial_maquina']" hidden="true">
    <div class="form-group col-md-3">
        <label for="campo2">Peças:</label>
            <select class="form-control" name="peca_maquina['id_peca']">
                <option onfocus="true">Selecione...</option>
                <?php if ($pecas) : ?>
                    <?php foreach ($pecas as $peca) : ?>
                        <option value="<?php echo $peca['id_peca']; ?>"><?php echo $peca['nome']; ?></option>
                    <?php endforeach; ?>
                <?php else : ?>
                    <option>Nenhum registro encontrado.</option>
                <?php endif; ?>
            </select>
    </div>



    <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>
