	<option class="vazio" value=""<?php echo (empty($busca->busca->valor_de))?' selected="selected"':''; ?>><?php echo (isset($paginabusca))?'Valor De':'Valor De'; ?></option>
    <?php
	$valorde = VALORDE;
	$valorde_locacao = $valorde['locacao'];
	$valorde_venda = $valorde['venda'];

	if( count($valorde_locacao) > 0 ){
	foreach( $valorde_locacao as $v ){
	?>
    <option class="val_locacao" value="<?php echo $v; ?>" <?php echo ($busca->busca->valor_de == $v)?'selected="selected"':''; ?>><?php echo Dinheiro($v); ?></option>
    <?php } ?>
    <?php } ?>

    <?php
	if( count($valorde_venda) > 0 ){
	foreach( $valorde_venda as $v ){
	?>
    <option class="val_venda" value="<?php echo $v; ?>" <?php echo ($busca->busca->valor_de == $v)?'selected="selected"':''; ?>><?php echo Dinheiro($v); ?></option>
    <?php } ?>
    <?php } ?>