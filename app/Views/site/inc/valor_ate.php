    <option class="vazio" value=""<?php echo (empty($busca->busca->valor_ate))?' selected="selected"':''; ?>><?php echo (isset($paginabusca))?'Valor Até':'Valor Até'; ?></option>
    <?php
	$valorate = VALORATE;
	$valorate_locacao = $valorate['locacao'];
	$valorate_venda = $valorate['venda'];

	if( count($valorate_locacao) > 0 ){
		foreach( $valorate_locacao as $v ){
			if( SearchStr($v,'M') ){
				$v = str_replace('M','',$v)
	?>
    <option class="val_locacao" value="<?php echo ($v*1000); ?>" <?php echo ($busca->busca->valor_ate == ($v*1000))?'selected="selected"':''; ?>>+ de <?php echo Dinheiro($v); ?></option>
    	<?php }else{ ?>
    <option class="val_locacao" value="<?php echo $v; ?>" <?php echo ($busca->busca->valor_ate == $v)?'selected="selected"':''; ?>><?php echo Dinheiro($v); ?></option>
    	<?php } ?>
	<?php } ?>
    <?php } ?>

    <?php
	if( count($valorate_venda) > 0 ){
		foreach( $valorate_venda as $v ){
			if( SearchStr($v,'M') ){
				$v = str_replace('M','',$v)
	?>
    <option class="val_venda" value="<?php echo ($v*1000); ?>" <?php echo ($busca->busca->valor_ate == ($v*1000))?'selected="selected"':''; ?>>+ de <?php echo Dinheiro($v); ?></option>
    	<?php }else{ ?>
    <option class="val_venda" value="<?php echo $v; ?>" <?php echo ($busca->busca->valor_ate == $v)?'selected="selected"':''; ?>><?php echo Dinheiro($v); ?></option>
    	<?php } ?>
	<?php } ?>
    <?php } ?>