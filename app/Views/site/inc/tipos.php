<?php
###############################################
###############################################
$tr = explode("_",$busca->categorias);
###############################################
###############################################
?>
<!-- Tipos -->
<div class="modal" id="tipos">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        <div class="col-12 title">
            <h2>Tipos de Imóveis</h2>
        </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row px-3 checkboxs checks-tipo">
            <div class="col-md-6 col-12 px-2 mb-2">
                <label for="crd" class="checkbox todos">
                    <input type="checkbox" id="crd" class="todos">Residenciais
                </label>
                <?php
				$residenciais = $SiteModel->getRegs('tb_imoveis_tipos',array(
                    'order_by' => array(
                        'key' => 'categoria',
                        'dir' => 'asc'
                    ),
                    'tipo' => 'R'
                    ))->getResult();

                foreach( $residenciais as $row ){
                ?>
                <div class="checkbox ps-3">
                    <input type="checkbox" class="crd" id="c_<?php echo $row->categoria_slug; ?>" name="categorias[]" value="<?php echo $row->categoria_slug; ?>" <?php echo (in_array($row->categoria_slug,$tr))?'checked="checked"':''; ?>>
                    <label for="c_<?php echo $row->categoria_slug; ?>"><?php echo $row->categoria; ?></label>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-6 col-12 px-2 mb-2">
                <label for="ccd" class="checkbox todos">
                    <input type="checkbox" id="ccd" class="todos">Comerciais
                </label>
                <?php
				$comerciais = $SiteModel->getRegs('tb_imoveis_tipos',array(
                    'order_by' => array(
                        'key' => 'categoria',
                        'dir' => 'asc'
                    ),
                    'tipo' => 'C'
                    ))->getResult();

                foreach( $comerciais as $row ){
                ?>
                <div class="checkbox ps-3">
                    <input type="checkbox" class="ccd" id="c_<?php echo $row->categoria_slug; ?>" name="categorias[]" value="<?php echo $row->categoria_slug; ?>" <?php echo (in_array($row->categoria_slug,$tr))?'checked="checked"':''; ?>>
                    <label for="c_<?php echo $row->categoria_slug; ?>"><?php echo $row->categoria; ?></label>
                </div>
                <?php } ?>
            </div>
		</div>
      </div>
      <div class="footer-modal">
        <div class="row">
            <div class="col-md-5 col-5 my-auto py-2">
                <input onclick="LimpaTipos();return false;" type="reset" value="LIMPAR">
            </div>
            <div class="col-md-7 col-7 bts-modal">
                <button onclick="buscar();" type="button" class="bt-modais" data-bs-dismiss="modal">APLICAR</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>