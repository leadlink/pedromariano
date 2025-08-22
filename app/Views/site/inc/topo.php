
    <header class="topo-pages">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 hidden-mobile ma ma-left ps-1">
					<ul class="menu-desk">
						<li>
                            <a href="#whatsapp" data-bs-toggle="modal" title="WhatsApp">
                                <?php include caminho_fisico()."assets/site/img/wpp.svg"; ?>
                                <span><?php echo $config->whatsapp; ?></span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo base_url(); ?>trabalhe-conosco/" title="Trabalhe Conosco">
                                <?php include caminho_fisico()."assets/site/img/trabalhe.svg"; ?>
                                <span>Trabalhe Conosco</span>
                            </a>
                        </li>
						<li>
                            <a href="<?php echo base_url(); ?>empresa/" title="Empresa">
                                <?php include caminho_fisico()."assets/site/img/empresa.svg"; ?>
                                <span>Empresa</span>
                            </a>
                        </li>
					</ul>
				</div>
				<div class="col-lg-2 col-5 logo">
					<a href="<?php echo base_url().Origem(); ?>" title="<?php echo $config->titulo; ?>">
                        <img src="<?php echo base_url()."uploads/".$config->logo; ?>" alt="<?php echo $config->titulo; ?>" width="180">
                    </a>
				</div>

				<div class="col-lg-5 col-7 ma">
					<ul class="menu-desk hidden-mobile">
						<li>
                            <a href="<?php echo base_url(); ?>anuncie-seu-imovel/" title="Anuncie seu Imóvel">
                                <?php include caminho_fisico()."assets/site/img/tag.svg"; ?>
                                <span>Anunciar Imóvel</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>avaliar-imovel-gratis/" title="Avalie imóvel Grátis">
                                <?php include caminho_fisico()."assets/site/img/tag.svg"; ?>
                                <span>Avalie imóvel Grátis</span>
                            </a>
                        </li>
					</ul>

					<?php $menu_favs = service('session')->get('FrP41me_favoritos'); ?>
                    <a href="<?php echo base_url(); ?>favoritos/" title="Imóveis Favoritos" class="bt-fav link-favoritos<?php echo (!empty($menu_favs))?'':' leadlink'; ?>">
                        <?php include caminho_fisico()."assets/site/img/fav.svg"; ?>
                        <small><?php echo (!empty($menu_favs))?count($menu_favs):''; ?></small>
                    </a>

					<div class="menu">
						<button title="Menu" id="abre-menu-mobile">
                            <?php include caminho_fisico()."assets/site/img/menu.svg"; ?>
                        </button>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="menu-mobile" id="menu-mobile">
		<div class="filtro-back"></div>
		<div class="modal-content">
			<div class="header-menu">
				<a href="<?php echo base_url().Origem(); ?>" title="<?php echo $config->titulo; ?>">
                    <img src="<?php echo base_url()."uploads/".$config->logo2; ?>" alt="<?php echo $config->titulo; ?>">
                </a>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <?php include caminho_fisico()."assets/site/img/fechar.svg"; ?>
                </button>
			</div>
			<div class="menu-content">
				<ul class="mt-5">
					<li class="title">SOLUÇÕES IMOBILIÁRIAS</li>
                    <li><a href="<?php echo base_url().Origem(); ?>" title="Página Inicial">Página Inicial</a></li>
                    <li><a href="<?php echo base_url(); ?>anuncie-seu-imovel/" title="Anuncie seu Imóvel">Anuncie seu Imóvel</a></li>
                    <li><a href="<?php echo base_url(); ?>avaliar-imovel-gratis/" title="Avaliar Imóvel Grátis">Avaliar Imóvel Grátis</a></li>
                    <li><a href="<?php echo base_url(); ?>empresa/" title="Empresa">Empresa</a></li>
                    <li><a href="<?php echo base_url(); ?>fale-conosco/" title="Fale Conosco">Fale Conosco</a></li>
                    <li><a href="<?php echo base_url(); ?>trabalhe-conosco/" title="Trabalhe Conosco">Trabalhe Conosco</a></li>
                    <li><a href="<?php echo base_url(); ?>financiamento/" title="Financiamento de Imóveis">Financiamento de Imóveis</a></li>
                    <li><a href="<?php echo base_url(); ?>servicos/" title="Serviços">Serviços</a></li>
                    <li><a href="<?php echo base_url(); ?>" title="Blog" target="_blank">Blog</a></li>

                    <li class="title mt-4">Siga-nos</li>
                    <?php if( !empty($config->instagram) ){ ?><li><a href="<?php echo $config->instagram; ?>" target="_blank" title="Instagram">Instagram</a></li><?php } ?>
                    <?php if( !empty($config->youtube) ){ ?><li><a href="<?php echo $config->youtube; ?>" target="_blank" title="Youtube">Youtube</a></li><?php } ?>
                    <?php if( !empty($config->pinterest) ){ ?><li><a href="<?php echo $config->pinterest; ?>" target="_blank" title="Pinterest">Pinterest</a></li><?php } ?>
                    <?php if( !empty($config->tiktok) ){ ?><li><a href="<?php echo $config->tiktok; ?>" target="_blank" title="TikTok">TikTok</a></li><?php } ?>
                    <?php if( !empty($config->twitter) ){ ?><li><a href="<?php echo $config->twitter; ?>" target="_blank" title="Twitter">Twitter</a></li><?php } ?>
                    <?php if( !empty($config->facebook) ){ ?><li><a href="<?php echo $config->facebook; ?>" target="_blank" title="Facebook">Facebook</a></li><?php } ?>
                    <?php if( !empty($config->linkedin) ){ ?><li><a href="<?php echo $config->linkedin; ?>" target="_blank" title="LinkedIn">LinkedIn</a></li><?php } ?>
				</ul>
			</div>
		</div>
	</div>