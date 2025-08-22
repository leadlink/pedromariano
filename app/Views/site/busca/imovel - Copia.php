    <?php
	#############################################
	#############################################
	unset($infos);
	$infos = array();

	if( !empty($imo->dormitorios) ){
		array_push($infos,'<li>'.$imo->dormitorios.' '.Dormitorios($imo->dormitorios).'</li>'.PHP_EOL);
	}

	if( !empty($imo->areaprivativa) ){
		array_push($infos,'<li>'.Area($imo->areaprivativa).'m²</li>'.PHP_EOL);
	}elseif( !empty($imo->areatotal) ){
		array_push($infos,'<li>'.Area($imo->areatotal).'m²</li>'.PHP_EOL);
	}

	if( !empty($imo->vagas) ){
		array_push($infos,'<li>'.$imo->vagas.' '.Vagas($imo->vagas).'</li>'.PHP_EOL);
	}
	#############################################
	#############################################
	unset($valores);
	$valores = array();

	if( $imo->modo == 'A' || $modo == 'A' ){
		array_push($valores,Dinheiro($imo->valorlocacao));
	}elseif( $imo->modo == 'V' || $modo == 'V' ){
		array_push($valores,Dinheiro($imo->valorvenda));
	}else{
		if( !empty($imo->valorlocacao) ){
			array_push($valores,Dinheiro($imo->valorlocacao));
		}
		if( !empty($imo->valorvenda) ){
			array_push($valores,Dinheiro($imo->valorvenda));
		}
	}
	#############################################
	#############################################
    if( !empty($slide) ){
		if( $slide == true ){
			$galeria = $SiteModel->getRegs('tb_imoveis_fotos',array(
				'limit' => '3',
				'offset' => '0',
				'order_by' => array(
					'key' => 'ordem',
					'dir' => 'asc'
				),
				'imovel' => $imo->id
			));
		}
	}
	#############################################
	#############################################
	unset($flags);
	$flags = array();

	if( $imo->mobiliado == 'S' ){
		array_push($flags,'Mobiliado');
	}
	if( $imo->exclusivo == 'S' ){
		array_push($flags,'Exclusivo');
	}
	if( $imo->permuta == 'S' && ($imo->modo == 'V' || $modo == 'V') ){
		array_push($flags,'Aceita Permuta');
	}
	if( $imo->financiamento == 'S' && ($imo->modo == 'V' || $modo == 'V') ){
		array_push($flags,'Aceita Financiamento');
	}
	#############################################
	#############################################
	?>
	<div class="card-imovel">
		<div class="owl-carousel owl-busca-single owl-navs">
			<figure class="item">
				<a href="<?php echo URL($imo); ?>" title="<?php echo Titulo($imo); ?>">
					<img <?php echo (!empty($lazy))?'data-':''; ?>src="<?php echo Foto($imo->foto,'300x250'); ?>" alt="<?php echo Titulo($imo); ?>" class="<?php echo (!empty($lazy))?'lazy ':''; ?>lazy-cover">
				</a>
			</figure>
			<?php if( $slide == true ){ ?>
			<?php if( $galeria->getNumRows() > 0 ){ ?>
			<?php foreach( $galeria->getResult() as $foto ){ ?>
			<figure class="item">
				<a href="<?php echo URL($imo); ?>" title="<?php echo Titulo($imo); ?>">
					<img <?php echo (!empty($lazy))?'data-':''; ?>src="<?php echo Foto($foto->foto,'350x250'); ?>" alt="<?php echo Titulo($imo); ?>" class="<?php echo (!empty($lazy))?'lazy ':''; ?>lazy-cover">
				</a>
			</figure>
			<?php } ?>
			<?php } ?>
			<?php } ?>
		</div>
		<?php if( count($flags) > 0 ){ ?>
		<a href="<?php echo URL($imo); ?>" title="<?php echo Titulo($imo); ?>" class="flags">
			<?php 
			uasort($flags, 'compareASCII');
			foreach( $flags as $f ){
			?>
			<span><?php echo $f; ?></span>
			<?php } ?>
		</a>
		<?php } ?>
		<a href="<?php echo URL($imo); ?>" title="<?php echo Titulo($imo); ?>">
			<div class="title-fav">
				<h2><?php echo Titulo($imo,true); ?></h2>
			</div>
			<ul>
				<?php echo implode('<li>-</li>'.PHP_EOL,$infos); ?>
			</ul>
			<span class="va-code">
				<span class="va"><?php echo implode(' / ',$valores); ?></span>
				<span class="code">
					CÓD <?php echo $imo->codigo; ?> <?php include caminho_fisico()."assets/site/img/seta_up.svg"; ?>
				</span>
			</span>
		</a>
		<a href="#favoritos" title="<?php echo Favorito($imo->codigo,$imo->modo,false); ?>" class="imo_<?php echo $imo->referencia.'_'.$imo->modo; ?> fav<?php echo Favorito($imo->referencia,$imo->modo); ?>" id="<?php echo $imo->referencia.'_'.$imo->modo; ?>" data-codigo="<?php echo $imo->referencia; ?>">
			<?php include caminho_fisico()."assets/site/img/fav.svg"; ?>
		</a>
	</div>