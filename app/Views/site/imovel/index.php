<?php echo view('site/inc/head'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    <?php echo view('site/inc/topo'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    <section class="fleft100 ficha">
        <div class="container">
            <div class="row">
                <ul class="col-lg-10 col-sm-8 brands mb-3">
                    <li><a href="<?php echo base_url().Origem(); ?>" title="Página Inicial">Início</a></li>
                    <?php
                    ############################################
                    ############################################
                    unset($flags);
                    $flags = array();

                    if( $imovel->mobiliado == 'S' ){
                        array_push($flags,'Mobiliado');
                    }
                    if( $imovel->exclusivo == 'S' ){
                        array_push($flags,'Exclusivo');
                    }
                    if( $imovel->permuta == 'S' && ($imovel->modo == 'V' || $modo == 'V') ){
                        array_push($flags,'Aceita Permuta');
                    }
                    if( $imovel->financiamento == 'S' && ($imovel->modo == 'V' || $modo == 'V') ){
                        array_push($flags,'Aceita Financiamento');
                    }
                    ############################################
                    ############################################
                    $bc = array();
                    $bc_link = array();
                    array_push($bc_link,$bc_modo);
                    array_push($bc_link,'cidade/'.URLizer($imovel->cidade));
                    array_push($bc_link,'bairros/'.URLizer($imovel->bairro));
                    $bc_categoria = $SiteModel->getRegistro('tb_imoveis_tipos','categoria_id',$imovel->tipo);
                    array_push($bc_link,'categorias/'.$bc_categoria->categoria_slug);
                    $migalha = base_url().'busca/'.implode('/',$bc_link).'/1/';

                    array_push($bc,$modo);
                    array_push($bc,$imovel->cidade);
                    array_push($bc,$imovel->bairro);
                    array_push($bc,$imovel->categoria);
                    if( !empty($imovel->dormitorios) ){
                        array_push($bc,$imovel->dormitorios.' '.ucfirst(Dormitorios($imovel->dormitorios)));
                    }
                    array_push($bc,'Código '.$imovel->codigo);
                    ############################################
                    ############################################
                    ?>
                    <?php foreach( $bc as $row ){ ?>
                    <li><a href="<?php echo $migalha; ?>" title="<?php echo $row; ?>"><?php echo $row; ?></a></li>
                    <?php } ?>
                </ul>
                <div class="col-lg-2 col-sm-4 bt-favs mb-3">
                    <a href="#favoritos" title="<?php echo Favorito($imovel->codigo,$imovel->modo,false); ?>" class="imo_<?php echo $imovel->referencia.'_'.$imovel->modo; ?> fav<?php echo Favorito($imovel->referencia,$imovel->modo); ?>" id="<?php echo $imovel->referencia.'_'.$imovel->modo; ?>" data-codigo="<?php echo $imovel->referencia; ?>">
                        Favoritos <?php include caminho_fisico()."assets/site/img/fav.svg"; ?>
                    </a>
                </div>

                <ul class="col-12 thumbs">
                    <li class="item-1">
                        <figure>
                            <a href="<?php echo Foto($imovel->foto,'original'); ?>" title="<?php echo Titulo($imovel); ?> - Foto 1" class="link" data-fancybox="fotos">
                                <img src="<?php echo Foto($imovel->foto,'800x600'); ?>" alt="<?php echo Titulo($imovel); ?> - Foto 1" class="lazy-cover">
                                <?php if( count($flags) > 0 ){ ?>
                                <div class="flags">
                                    <?php
                                    uasort($flags, 'compareASCII');
                                    foreach( $flags as $f ){
                                    ?>
                                    <span><?php echo $f; ?></span>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                            </a>
                        </figure>
                    </li>
                    <?php
					############################################
					############################################
					$f = 2;
					############################################
					############################################
					?>
					<?php if( $galeria1->getNumRows() > 0 ){ ?>
					<?php foreach( $galeria1->getResult() as $foto ){ ?>
                    <li>
                        <figure>
                            <a href="<?php echo Foto($foto->foto,'original'); ?>" title="<?php echo Titulo($imovel); ?> - Foto <?php echo $f; ?>" data-fancybox="fotos">
                                <img src="<?php echo Foto($foto->foto,'400x300'); ?>" alt="<?php echo Titulo($imovel); ?> - Foto <?php echo $f; ?>" class="lazy-cover">
                            </a>
                        </figure>
                    </li>
                    <?php $f++; ?>
                    <?php } ?>
                    <?php } ?>
                    <?php if( $galeria2->getNumRows() > 0 ){ ?>
					<?php foreach( $galeria2->getResult() as $foto ){ ?>
                    <li class="leadlink">
                        <figure>
                            <a href="<?php echo Foto($foto->foto,'original'); ?>" title="<?php echo Titulo($imovel); ?> - Foto <?php echo $f; ?>" data-fancybox="fotos">
                                <img src="<?php echo Foto($foto->foto,'400x300'); ?>" alt="<?php echo Titulo($imovel); ?> - Foto <?php echo $f; ?>" class="lazy-cover">
                            </a>
                        </figure>
                    </li>
                    <?php $f++; ?>
                    <?php } ?>
                    <?php } ?>
                </ul>

                <div class="col-lg-8 col-12 mt-4 mb-4">
                    <ul class="bts-ficha">
                        <?php if( $galeria2->getNumRows() > 0 ){ ?>
                        <li>
                            <a href="#fotos-6" title="Mais Fotos" data-fancybox-trigger="fotos-6">
                                <?php include caminho_fisico()."assets/site/img/fotos.svg"; ?>
                                + <?php echo $galeria2->getNumRows(); ?> fotos
                            </a>
                        </li>
                        <?php } ?>
                        <?php if( !empty($imovel->video) ){ ?>
                        <li>
                            <a href="<?php echo $imovel->video; ?>" title="Vídeo do Youtube" data-fancybox="video">
                               <?php include caminho_fisico()."assets/site/img/video.svg"; ?> Vídeo
                            </a>
                        </li>
                        <?php } ?>
                        <?php
                        /*
                        <li>
                            <a href="https://www.youtube.com/watch?v=BXJL_HGaLj4" data-fancybox="tour">
                               <?php include caminho_fisico()."assets/site/img/tour.svg"; ?> Tour Virtual
                            </a>
                        </li>
                        */
                        ?>
                    </ul>

                    <span class="codigo-ficha">CÓD <?php echo $imovel->codigo; ?></span>
                    <h1><?php echo (!empty($imovel->titulo))?ConvertCase($imovel->titulo):Titulo($imovel); ?></h1>

                    <?php if( count($flags) > 0 ){ ?>
                    <ul class="tags">
                        <?php
                        uasort($flags, 'compareASCII');
                        foreach( $flags as $f ){
                        ?>
                        <li><?php echo $f; ?></li>
                        <?php } ?>
                    </ul>
                    <?php } ?>

                    <ul class="va-itens">
                        <?php
                        #############################################
                        #############################################
                        unset($valores);
                        $valores = array();

                        if( $imovel->modo == 'A' || $modo == 'A' ){
                            array_push($valores,Dinheiro($imovel->valorlocacao));
                        }elseif( $imovel->modo == 'V' || $modo == 'V' ){
                            array_push($valores,Dinheiro($imovel->valorvenda));
                        }else{
                            if( !empty($imovel->valorlocacao) ){
                                array_push($valores,Dinheiro($imovel->valorlocacao));
                            }
                            if( !empty($imovel->valorvenda) ){
                                array_push($valores,Dinheiro($imovel->valorvenda));
                            }
                        }
                        #############################################
                        #############################################
                        unset($infos);
                        $infos = array();

                        if( !empty($imovel->dormitorios) ){
                            array_push($infos,'<li>'.$imovel->dormitorios.' '.Dormitorios($imovel->dormitorios).'</li>'.PHP_EOL);
                        }
                        ####################
                        if( !empty($imovel->suites) ){
                            array_push($infos,'<li>'.$imovel->suites.' '.Suites($imovel->suites).'</li>'.PHP_EOL);
                        }
                        ####################
                        if( !empty($imovel->areaprivativa) && $imovel->tipo != '19' ){
                            array_push($infos,'<li>'.Area($imovel->areaprivativa).'m² privativo</li>'.PHP_EOL);
                        }
                        if( !empty($imovel->areatotal) && $imovel->areatotal != $imovel->areaprivativa ){
                            array_push($infos,'<li>'.Area($imovel->areatotal).'m² total</li>'.PHP_EOL);
                        }
                        if( (!empty($imovel->areaterreno) && ($imovel->areaterreno != $imovel->areaprivativa && $imovel->areaterreno != $imovel->areatotal)) || (!empty($imovel->areaterreno) && $imovel->tipo == '19') ){
                            array_push($infos,'<li>'.Area($imovel->areaterreno).'m² terreno</li>'.PHP_EOL);
                        }
                        ####################
                        if( !empty($imovel->vagas) ){
                            array_push($infos,'<li>'.$imovel->vagas.' '.Vagas($imovel->vagas).'</li>'.PHP_EOL);
                        }
                        ####################
                        if( !empty($imovel->banheiros) ){
                            array_push($infos,'<li>'.$imovel->banheiros.' '.Banheiros($imovel->banheiros).'</li>'.PHP_EOL);
                        }
                        ####################
                        if( !empty($imovel->condominio) ){
                            array_push($infos,'<li><strong>Condomínio:</strong>'.Dinheiro($imovel->condominio).'/mês</li>'.PHP_EOL);
                        }
                        if( !empty($imovel->iptu) ){
                            array_push($infos,'<li><strong>IPTU:</strong>'.Dinheiro($imovel->iptu).'/mês</li>'.PHP_EOL);
                        }
                        #############################################
                        #############################################
                        ?>
                        <li><?php echo implode(' / ',$valores); ?></li>
                        <?php echo implode('',$infos); ?>
                    </ul>

                    <div class="tex">
                        <p>
                            <?php echo nl2br($imovel->descricao); ?>
                        </p>
                    </div>

                    <?php if( !empty($imovel->caracteristicas) ){ ?>
                    <div class="infra">
                        <h2 class="h2-ficha">Características</h2>
                        <ul class="lista-seta mt-3">
                            <?php
                            $caracteristicas = explode(';',$imovel->caracteristicas);
                            foreach( $caracteristicas as $c ){
                            ?>
                            <li><?php echo $c; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>

                    <?php if( !empty($imovel->infraestrutura) ){ ?>
                    <div class="infra">
                        <h2 class="h2-ficha">Infraestrutura</h2>
                        <ul class="lista-seta mt-3">
                            <?php
                            $infraestrutura = explode(';',$imovel->infraestrutura);
                            foreach( $infraestrutura as $c ){
                            ?>
                            <li><?php echo $c; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>

                    <div class="mapa-ficha">
                        <div class="ads">
                            <h2>
                                <?php include caminho_fisico()."assets/site/img/maps.svg"; ?> Localização
                            </h2>
                            <address><?php echo $imovel->endereco; ?> - <?php echo $imovel->bairro; ?> - <?php echo $imovel->cidade; ?>/<?php echo $imovel->uf; ?></address>
                        </div>
                        <iframe class="mapa" title="Google Maps" src="https://maps.google.com/maps?q=<?php echo urlencode($imovel->endereco.' - '.$imovel->bairro.', '.$imovel->cidade.', '.$imovel->uf); ?>&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="col-lg-4 col-12 ps-lg-5 mt-4 mb-4">
                    <div class="stiky-side">
                        <div class="box-infos">
                            <h2>Quero <b>mais informações</b></h2>
                            <ul>
                                <li>
                                    <a href="#informacoes" title="Mais Informações" data-bs-toggle="modal" class="bt-primary">
                                        Mais Informações
                                        <svg width="22" height="22" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.5 16.5H9.5V20.5L13.5 16.5H17.5C18.6046 16.5 19.5 15.6046 19.5 14.5V8.5C19.5 7.39543 18.6046 6.5 17.5 6.5H7.5C6.39543 6.5 5.5 7.39543 5.5 8.5V14.5C5.5 15.6046 6.39543 16.5 7.5 16.5Z" stroke="#121923" stroke-width="1.2"/></svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#visita" title="Agendar Visita" data-bs-toggle="modal" class="bt-border">
                                        Agendar Visita
                                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12Z" stroke="#eebf60" stroke-width="1.5"/><path d="M7 4V2.5" stroke="#eebf60" stroke-width="1.5" stroke-linecap="round"/><path d="M17 4V2.5" stroke="#eebf60" stroke-width="1.5" stroke-linecap="round"/><path d="M2.5 9H21.5" stroke="#eebf60" stroke-width="1.5" stroke-linecap="round"/></svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#whatsapp" title="Enviar WhatsApp" data-bs-toggle="modal" class="bt-border bt-wpp">
                                        Enviar WhatsApp
                                        <?php include caminho_fisico()."assets/site/img/wpp.svg"; ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <?php
                        /*
                        <a href="" class="nao">Não encontrou o que procurava? <b>Solicite aqui.</b></a>
                        */
                        ?>
                    </div>
                </div>
            </div>

            <div class="row sem gutter-x3 mt-5">
                <?php if( $semelhantes->getNumRows() > 0 ){ ?>
                <div class="col-12">
                    <h2 class="h2-ficha">Imóveis Semelhantes</h2>
                </div>

                <?php foreach( $semelhantes->getResult() as $reg ){ ?>
                <div class="col-lg-3 col-md-6 col-12 mb-4">
                    <?php
                    #############################################
                    #############################################
                    $imov['lazy'] = true;
                    $imov['slide'] = true;
                    $imov['imo'] = $reg;
                    #############################################
                    #############################################
                    echo view('site/busca/imovel',$imov);
                    #############################################
                    #############################################
                    ?>
                </div>
                <?php } ?>
                <?php } ?>

                <?php if( $banner->getNumRows() > 0 ){ ?>
                <picture class="col-12 banner-busca mt-4">
                    <source media="(max-width: 767px)" data-srcset="<?php echo base_url().'uploads/arquivos/'.$banner->getRow()->mobile; ?>">
                    <source media="(min-width: 768px)" data-srcset="<?php echo base_url().'uploads/arquivos/'.$banner->getRow()->imagem; ?>">
                    <a href="<?php echo $banner->getRow()->url; ?>" title="<?php echo $banner->getRow()->titulo; ?>">
                        <img data-src="<?php echo base_url().'uploads/arquivos/'.$banner->getRow()->imagem; ?>" alt="<?php echo $banner->getRow()->titulo; ?>" class="lazy lazy-contain">
                    </a>
                </picture>
                <?php } ?>
            </div>

        </div>
    </section>
    <!-- ################################ -->
    <!-- ################################ -->
<?php echo view('site/inc/rodape'); ?>