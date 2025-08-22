<?php
###############################################
###############################################
$cidades = $SiteModel->getRegs('tb_imoveis_cidades',array(
		'order_by' => array(
			'key' => 'cidade',
			'dir' => 'asc'
		),
		'groupby' => 'cidade',
	))->getResult();

$cyta = CIDADE;
$city = $busca->busca->cidade;
$br = explode("_",$busca->busca->bairros);
###############################################
###############################################
?>
<!-- Bairros -->
<div class="modal" id="bairros">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
	  	<div class="col-12 title">
			<h2>Localização</h2>
		</div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row px-3">
          <div class="col-lg-4 col-12 select-md">
            <select name="cidade" id="cidade" class="cityselect">
				<?php
				$x = 1;
                foreach($cidades as $row){
                ?>
                <option value="<?php echo $row->cidade_slug; ?>" lang="cid<?php echo $x; ?>x"<?php echo ($busca->busca->cidade == $row->cidade_slug || (empty($busca->busca->cidade) && $row->cidade == $cyta))?' selected="selected"':''; ?>><?php echo $row->cidade; ?> - <?php echo $row->uf; ?></option>
                <?php
					$x++;
                }
                ?>
            </select>
          </div>
          <div class="col-lg-4 offset-lg-4 col-12">
          	<div class="search-modal">
              <input type="text" id="search" name="search" placeholder="Filtrar por Bairro">
              <label for="search">OK</label>
            </div>
          </div>
        </div>
        <div class="row px-3 checkboxs checks-bairro mt-4">
        	<?php
			$c = 1;
			foreach($cidades as $row){
			?>
            <div class="citys" id="cid<?php echo $c; ?>x" <?php if(urldecode($busca->busca->cidade) == $row->cidade_slug || (empty($busca->busca->cidade) && $row->cidade == $cyta)){ ?>style="display:flex;"<?php }else{ ?>style="display:none;"<?php } ?>>
			<?php
			/*
			if( $row->cidade == $cyta ){ ?>
			<?php
			$zonas = $SiteModel->getRegs('view_zonas',array(
					'order_by' => array(
					'key' => 'ordem_zona',
					'dir' => 'asc'
				),
				'groupby' => 'id_zona',
				'id_zona !=' => '',
				'cidade' => $row->cidade
			));

			if( $zonas->getNumRows() > 0 ){
				foreach( $zonas->getResult() as $zona ){
					$bairros = $SiteModel->getRegs('view_zonas',array(
						'order_by' => array(
							'key' => 'bairro',
							'dir' => 'asc'
						),
						'cidade' => $zona->cidade,
						'id_zona' => $zona->id_zona
					));
				?>
				<div class="col-12">
					<label for="t<?php echo $zona->id_zona; ?>d" class="checkbox todos">
						<input type="checkbox" id="t<?php echo $zona->id_zona; ?>d" class="todos"><?php echo $zona->zona; ?>
					</label>
				</div>
				<?php
				$btotal = $bairros->getNumRows();
				$bcoluna = ceil($btotal/3);

				for($i = 0; $i < 3; $i++){
					###############################################
					$limit = $bcoluna;
					$boffset = $bcoluna*$i;
					($boffset == 0)?$boffset = 0:'';

					$page = array_slice($bairros->getResult(),$boffset,$limit);

					$zonax[$i]->id = $i;
					$zonax[$i]->bairros = $page;
					###############################################
				}
				foreach($zonax as $zone){
					if(!empty($zone->bairros)){
				?>
					<div class="col-lg-4 col-sm-6 col-12 mb-3 ps-2">
						<?php foreach($zone->bairros as $rowbairro){ ?>
						<div class="checkbox">
							<input type="checkbox" class="t<?php echo $zona->id_zona; ?>d" name="bairros[]" id="<?php echo URLizer('bairro_'.$row->cidade.'_'.$c.'_'.$r); ?>" value="<?php echo $rowbairro->bairro_slug; ?>" <?php echo (in_array($rowbairro->bairro_slug,$br) && $busca->busca->cidade == $row->cidade_slug)?'checked="checked"':''; ?>>
							<label for="<?php echo URLizer('bairro_'.$row->cidade.'_'.$c.'_'.$r); ?>" class="cl-fff"><?php echo $rowbairro->bairro; ?></label>
						</div>
						<?php
						$r++;
						}
						?>
					</div>
					<?php
							}
						}
					}
				}
			}else{
				*/
				###############################################
				###############################################
				$bairros = $SiteModel->getRegs('tb_imoveis_cidades',array(
						'order_by' => array(
							'key' => 'bairro',
							'dir' => 'asc'
						),
						'cidade_slug' => $row->cidade_slug
					));
				###############################################
				$btotal = $bairros->getNumRows();
				$bcoluna = ceil($btotal/3);
				###############################################
				if( $btotal >= 45 ){
				?>
				<div class="col-12">
					<label for="city_<?php echo $row->cidade_slug; ?>_all" class="checkbox todos">
						<input type="checkbox" id="city_<?php echo $row->cidade_slug; ?>_all" class="todos">Selecionar todos
					</label>
				</div>
				<?php
				}
				###############################################
				###############################################
				for( $i = 0; $i < 3; $i++ ){
					###############################################
					$limit = $bcoluna;
					$boffset = $bcoluna*$i;
					($boffset == 0)?$boffset = 0:'';

					$page = array_slice($bairros->getResult(),$boffset,$limit);

					$zonax[$i]['id'] = $i.'-'.URLizer($row->cidade_slug);
					$zonax[$i]['bairros'] = $page;
					###############################################
				}
				###############################################
				###############################################
				$d = 1;
				foreach( $zonax as $zone ){
					###############################################
					###############################################
					$zone = arrayToObject($zone);
					if( !empty($zone->bairros) ){
				?>
				<div class="col-lg-4 col-sm-6 col-12 px-1">
					<?php
					###############################################
					###############################################
					foreach( $zone->bairros as $rowbairro ){
					?>
					<div class="checkbox">
						<input type="checkbox" class="city_<?php echo $row->cidade_slug; ?>_all" name="bairros[]" id="<?php echo URLizer($row->cidade.$d.$rowbairro->bairro); ?>" value="<?php echo $rowbairro->bairro_slug; ?>" <?php echo (in_array($rowbairro->bairro_slug,$br) && $busca->busca->cidade == $row->cidade_slug)?'checked="checked"':''; ?>>
						<label for="<?php echo URLizer($row->cidade.$d.$rowbairro->bairro); ?>" class="cl-fff"><?php echo $rowbairro->bairro; ?></label>
					</div>
					<?php
						$d++;
					}
					###############################################
					###############################################
					?>
				</div>
				<?php
					###############################################
					###############################################
					}
				}
			//}
			?>
			</div>
			<?php
			$c++;
			}
			?>
        </div>
      </div>
      <div class="footer-modal">
		<div class="row">
            <div class="col-md-5 col-5 my-auto py-2">
                <input onclick="LimpaBairros();return false;" type="reset" value="LIMPAR">
            </div>
            <div class="col-md-7 col-7 bts-modal">
                <button onclick="buscar();" type="button" class="bt-modais" data-bs-dismiss="modal">APLICAR</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>