    <header class="topo-pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-5 logo">
                    <a href="<?php echo base_url().Origem(); ?>" title="<?php echo $config->titulo; ?>">
                        <img src="<?php echo base_url()."uploads/".$config->logo; ?>" alt="<?php echo $config->titulo; ?>" width="180">
                    </a>
                </div>

                <div class="col-lg-4 col-3 bts-cits">
                    <?php
                    /*
                    <a href="<?php echo base_url(); ?>" class="ativo">Volta Redonda/RJ</a>
                    <a href="<?php echo base_url(); ?>">Alphaville/SP</a>
                    */
                    ?>
                </div>

                <div class="col-lg-4 col-7 ma">
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
                    <img src="<?php echo base_url()."uploads/".$config->logo; ?>" alt="<?php echo $config->titulo; ?>" width="150">
                </a>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <?php include caminho_fisico()."assets/site/img/fechar.svg"; ?>
                </button>
            </div>
            <div class="menu-content">
                <ul class="mt-5">
                    <li class="title">SOLUÇÕES IMOBILIÁRIAS</li>
                    <li><a href="<?php echo base_url(); ?>busca/comprar/cidade/volta-redonda/1/" title="Comprar Imóvel">Comprar Imóvel</a></li>
                    <li><a href="<?php echo base_url(); ?>busca/alugar/cidade/volta-redonda/1/" title="Alugar Imóvel">Alugar Imóvel</a></li>
                    <li><a href="<?php echo base_url(); ?>anuncie-seu-imovel/" title="Anuncie seu Imóvel">Anuncie seu Imóvel</a></li>
                    <li><a href="<?php echo base_url(); ?>avaliar-imovel-gratis/" title="Calculadora de Valor de Imóvel">Calculadora de Valor de Imóvel</a></li>
                    <li><a href="<?php echo base_url(); ?>" title="Regularização de Imóveis">Regularização de Imóveis</a></li>
                    <li><a href="<?php echo base_url(); ?>" title="Construção Sob Medida">Construção Sob Medida</a></li>
                    <li><a href="<?php echo base_url(); ?>" title="Minha Casa Minha Vida (Primeiro Imóvel)">Minha Casa Minha Vida (Primeiro Imóvel)</a></li>

                    <li class="mt-4">
                        <a href="<?php echo base_url(); ?>anuncie-seu-imovel/" title="Anuncie seu Imóvel">
                            <strong>ANUNCIE SEU IMÓVEL</strong>
                        </a>
                    </li>

                    <li class="title mt-4">INVESTIDOR</li>
                    <li><a href="<?php echo base_url(); ?>" title="Investir em São Paulo">Investir em São Paulo</a></li>
                    <li><a href="<?php echo base_url(); ?>" title="Investir e Airbnb">Investir e Airbnb</a></li>
                    <li><a href="<?php echo base_url(); ?>" title="Leilões de Imóveis">Leilões de Imóveis</a></li>
                    <li><a href="<?php echo base_url(); ?>" title="Consultoria Imoiliária para Investidores">Consultoria Imoiliária para Investidores</a></li>

                    <li class="title mt-4">FINANCIAMENTO E CONSÓRCIO</li>
                    <li><a href="<?php echo base_url(); ?>" title="Consórcio Imobiliário">Consórcio Imobiliário</a></li>
                    <li><a href="<?php echo base_url(); ?>" title="Financiamento Imobiliário">Financiamento Imobiliário</a></li>
                    <li><a href="<?php echo base_url(); ?>" title="Crédito com Garania de Imóvel">Crédito com Garania de Imóvel</a></li>

                    <li class="title mt-4">LOCAÇÃO POR TEMPORADA</li>
                    <li><a href="<?php echo base_url(); ?>busca/alugar/cidade/volta-redonda/1/" title="Alugue">Alugue</a></li>
                    <li><a href="<?php echo base_url(); ?>anuncie-seu-imovel/" title="Anuncie">Anuncie</a></li>

                    <li class="mt-4">
                        <a href="https://blog.frprimeimoveis.com.br/" title="Blog da Prime">
                            <strong>BLOG DA PRIME</strong>
                        </a>
                    </li>

                    <li class="mt-4">
                        <a href="<?php echo base_url(); ?>" title="Loja da Prime">
                            <strong>LOJA DA PRIME</strong>
                        </a>
                    </li>

                    <li class="title mt-4">INSTITUCIONAL</li>
                    <li><a href="<?php echo base_url(); ?>empresa/" title="Sobre a FR Prime">Sobre a FR Prime</a></li>
                    <li><a href="<?php echo base_url(); ?>empresa/" title="Nosso Fundador">Nosso Fundador</a></li>
                    <li><a href="<?php echo base_url(); ?>fale-conosco/" title="Trabalhe Conosco">Trabalhe Conosco</a></li>
                    <li><a href="<?php echo base_url(); ?>" title="Na Mídia">Na Mídia</a></li>
                    <li><a href="<?php echo base_url(); ?>depoimentos/" title="Depoimentos">Depoimentos</a></li>
                    <li><a href="<?php echo base_url(); ?>fale-conosco/" title="Ouvidoria">Ouvidoria</a></li>

                    <li class="title mt-4">SOCIAL</li>
                    <li><a href="<?php echo base_url(); ?>" title="Projeto 1C5C">Projeto 1C5C</a></li>
                    <li><a href="<?php echo base_url(); ?>" title="Programa de Indicações">Programa de Indicações</a></li>

                    <li class="title mt-4">Siga-nos</li>
                    <?php if( !empty($config->instagram) ){ ?><li><a href="<?php echo $config->instagram; ?>" target="_blank" title="Instagram">Instagram</a></li><?php } ?>
                    <?php if( !empty($config->youtube) ){ ?><li><a href="<?php echo $config->youtube; ?>" target="_blank" title="Youtube">Youtube</a></li><?php } ?>
                    <?php if( !empty($config->facebook) ){ ?><li><a href="<?php echo $config->facebook; ?>" target="_blank" title="Facebook">Facebook</a></li><?php } ?>
                    <?php if( !empty($config->linkedin) ){ ?><li><a href="<?php echo $config->linkedin; ?>" target="_blank" title="LinkedIn">LinkedIn</a></li><?php } ?>
                </ul>
            </div>
        </div>
    </div>