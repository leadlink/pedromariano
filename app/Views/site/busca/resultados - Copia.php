    <?php if( empty($busca->total) ){ ?>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <div class="col-12 my-5 py-5">
        <h3 class="text-center py-5 mb-5">Não localizamos nenhum imóvel com seus filtros.</h3>
        <div>
            <h2 class="ft-zero"><?php echo $busca->seotitle; ?></h2>
            <p class="ft-zero">
                <?php echo $busca->seodesc; ?>
                <br />
                <?php echo nl2br($config->descricao); ?>
            </p>
        </div>
    </div>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <?php }else{ ?>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <?php foreach( $imoveis as $reg ){ ?>
    <div class="col-lg-4 col-md-6 col-12 mb-4">
        <?php
        #############################################
        #############################################
        $imov['slide'] = true;
        $imov['imo'] = $reg;
        #############################################
        #############################################
        echo view('site/busca/imovel',$imov);
        #############################################
        #############################################
        ?>
    </div>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <?php } ?>
    <?php if( $busca->paginacao ){ ?>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <div class="col-12 pg">
        <?php echo $busca->paginacao; ?>
    </div>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <?php } ?>
        <?php if( !empty($busca->existe_banner) ){ ?>
        <!-- ####################################################################### -->
        <!-- ####################################################################### -->
        <picture class="col-12 banner-busca mt-5">
            <source media="(max-width: 767px)" data-srcset="<?php echo base_url().'uploads/arquivos/'.$busca->banner->mobile; ?>">
            <source media="(min-width: 768px)" data-srcset="<?php echo base_url().'uploads/arquivos/'.$busca->banner->imagem; ?>">
            <a href="<?php echo $busca->banner->url; ?>" title="<?php echo $busca->banner->titulo; ?>">
                <img src="<?php echo base_url().'uploads/arquivos/'.$busca->banner->imagem; ?>" alt="<?php echo $busca->banner->titulo; ?>" class="lazy-contain">
            </a>
        </picture>
        <!-- ####################################################################### -->
        <!-- ####################################################################### -->
        <?php } ?>
    <?php } ?>
	<!-- ####################################################################### -->
    <!-- ####################################################################### -->
     <?php if( !empty($ajax) ){ ?>
    <script language="javascript" type="text/javascript">
		/* ############################################################### */
        /* ############################################################### */
		document.title = '<?php echo $busca->seotitle; ?>';
		$("meta[name='description']").attr('content', '<?php echo $busca->seodesc; ?>');
		$("meta[name='title']").attr('content', '<?php echo $busca->seotitle; ?>');
		$("meta[name='og:title']").attr('content', '<?php echo $busca->seotitle; ?>');
		$("meta[name='og:description']").attr('content', '<?php echo $busca->seodesc; ?>');
		$("meta[name='twitter:title']").attr('content', '<?php echo $busca->seotitle; ?>');
		$("meta[name='twitter:description']").attr('content', '<?php echo $busca->seodesc; ?>');
		$("meta[itemprop='title']").attr('content', '<?php echo $busca->seotitle; ?>');
		$("meta[itemprop='description']").attr('content', '<?php echo $busca->seodesc; ?>');
        /* ############################################################### */
        /* ############################################################### */
        $('#titulo-busca').fadeOut('slow', function() {
            $(this).html('<?php echo $busca->titulobusca; ?>').fadeIn('slow');
        });
		/* ############################################################### */
        /* ############################################################### */
        <?php include caminho_fisico()."assets/site/js/resultados.min.js"; ?>
        /* ############################################################### */
        /* ############################################################### */
    </script>
    <!-- ####################################################################### -->
    <!-- ####################################################################### -->
    <?php } ?>