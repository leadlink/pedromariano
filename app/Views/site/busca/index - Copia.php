<?php echo view('site/inc/head'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    <?php echo view('site/inc/topo'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    <section class="fleft100 resultados">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-12 title-busca">
                    <h1 id="titulo-busca"><?php echo $busca->titulobusca; ?></h1>
                </div>

                <div class="col-lg-2 col-12 order">
                    <select id="order" name="order" class="order" aria-label="Ordenar por">
                        <option value="data/desc"<?php echo ($busca->ordem=='3')?' selected="selected"':''; ?>>Mais Recentes</option>
                        <option value="vlr/desc"<?php echo ($busca->ordem=='2')?' selected="selected"':''; ?>>Maior Valor</option>
                        <option value="vlr/asc"<?php echo ($busca->ordem=='1')?' selected="selected"':''; ?>>Menor Valor</option>
                    </select>
                </div>

                <div class="col-12 mt-4 mb-3">
                    <hr class="line">
                </div>

                <?php
                ###############################################
                ###############################################
                $tr = explode("_",urldecode($busca->busca->categorias));
                $ir = explode("_",urldecode($busca->busca->caracteristicas));
                ###############################################
                ###############################################
                ?>

                <form action="<?php echo base_url(); ?>busca/" id="busca" name="form_busca" method="post" class="col-xl-3 col-lg-4 col-sm-5 col-12 mt-4 pe-lg-5 busca-ajax">
                    <!-- ################################ -->
                    <!-- ################################ -->
                    <?php echo view('site/inc/bairros'); ?>
                    <!-- ################################ -->
                    <!-- ################################ -->
                    <div class="side-busca">
                        <h2>Buscar Imóveis</h2>

                        <div id="co-finalidade" class="show">
                            <ul class="check-radio check-quartos">
                                <li>
                                    <input type="radio" id="md-comprar" name="modo" value="comprar"<?php echo ($busca->busca->busca == 'comprar' || empty($busca->busca->busca))?' checked="checked"':''; ?>>
                                    <label for="md-comprar">Comprar</label>
                                </li>
                                <li>
                                    <input type="radio" id="md-alugar" name="modo" value="alugar"<?php echo ($busca->busca->busca == 'alugar')?' checked="checked"':''; ?>>
                                    <label for="md-alugar">Alugar</label>
                                </li>
                            </ul>
                        </div>

                        <hr class="line">

                        <h3 class="sub-title-busca">RESIDENCIAL</h3>

                        <ul class="check-radio check-tipos">
                            <?php foreach( $residenciais as $row ){ ?>
                            <li class="text-uppercase">
                                <input type="checkbox" id="c_<?php echo $row->categoria_slug; ?>" name="categorias[]" value="<?php echo $row->categoria_slug; ?>"<?php echo (in_array($row->categoria_slug,$tr))?' checked="checked"':''; ?>>
                                <label for="c_<?php echo $row->categoria_slug; ?>"><?php echo $row->categoria; ?></label>
                            </li>
                            <?php } ?>
                        </ul>

                        <h3 class="sub-title-busca mt-4">COMERCIAL</h3>

                        <ul class="check-radio check-tipos">
                            <?php foreach( $comerciais as $row ){ ?>
                            <li class="text-uppercase">
                                <input type="checkbox" id="c_<?php echo $row->categoria_slug; ?>" name="categorias[]" value="<?php echo $row->categoria_slug; ?>"<?php echo (in_array($row->categoria_slug,$tr))?' checked="checked"':''; ?>>
                                <label for="c_<?php echo $row->categoria_slug; ?>"><?php echo $row->categoria; ?></label>
                            </li>
                            <?php } ?>
                        </ul>

                        <hr class="line">

                        <h3 class="sub-title-busca">LOCALIZAÇÃO</h3>
                        <div class="d-flex">
                            <a href="#bairros" class="btns" data-bs-toggle="modal" title="Localização">
                                <span class="multiselect">
                                    <span class="s">
                                        <small id="count-bairros" class="se">Selecione</small>
                                    </span>
                                </span>
                            </a>
                        </div>

                        <hr class="line">

                        <h3 class="sub-title-busca collapse-title<?php echo (!empty($busca->busca->valor_de) || !empty($busca->busca->valor_ate))?' active':''; ?>" id="valor">VALOR</h3>
                        <div id="co-valor" class="collapse<?php echo (!empty($busca->busca->valor_de) || !empty($busca->busca->valor_ate))?' show':''; ?>">
                            <div class="row">
                                <div class="col-6 lb-content pe-1">
                                    <select name="valor_de" class="valor-sel" aria-label="Valor De">
                                        <?php echo view('site/inc/valor_de'); ?>
                                    </select>
                                </div>
                                <div class="col-6 lb-content ps-1">
                                    <select name="valor_ate" class="valor-sel" aria-label="Valor Até">
                                        <?php echo view('site/inc/valor_ate'); ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr class="line">

                        <h3 class="sub-title-busca collapse-title<?php echo (!empty($busca->busca->area))?' active':''; ?>" id="areaminima">ÁREA MÍNIMA</h3>
                        <div id="co-areaminima" class="collapse<?php echo (!empty($busca->busca->area))?' active':''; ?>">
                            <div class="row">
                                <div class="col-12 lb-content">
                                    <select name="area" aria-label="Área Mínima">
                                        <option class="vazio" value="">Selecione</option>
                                        <option value="0"<?php echo ($busca->busca->area == '5000')?' selected="selected"':''; ?>>0m²</option>
                                        <option value="40"<?php echo ($busca->busca->area == '40')?' selected="selected"':''; ?>>40m²</option>
                                        <option value="70"<?php echo ($busca->busca->area == '70')?' selected="selected"':''; ?>>70m²</option>
                                        <option value="100"<?php echo ($busca->busca->area == '100')?' selected="selected"':''; ?>>100m²</option>
                                        <option value="150"<?php echo ($busca->busca->area == '150')?' selected="selected"':''; ?>>150m²</option>
                                        <option value="200"<?php echo ($busca->busca->area == '200')?' selected="selected"':''; ?>>200m²</option>
                                        <option value="250"<?php echo ($busca->busca->area == '250')?' selected="selected"':''; ?>>+ de 250m²</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr class="line">

                        <h3 class="sub-title-busca collapse-title<?php echo (!empty($busca->busca->quartos))?' active':''; ?>" id="quartos">QUARTOS</h3>
                        <div id="co-quartos" class="collapse<?php echo (!empty($busca->busca->quartos))?' active':''; ?>">
                            <ul class="check-radio check-quartos">
                                <li>
                                    <input type="radio" id="1_dorm" name="quartos" value="1"<?php echo ($busca->busca->quartos == '1')?' checked="checked"':''; ?>>
                                    <label for="1_dorm">1+</label>
                                </li>
                                <li>
                                    <input type="radio" id="2_dorm" name="quartos" value="2"<?php echo ($busca->busca->quartos == '2')?' checked="checked"':''; ?>>
                                    <label for="2_dorm">2+</label>
                                </li>
                                <li>
                                    <input type="radio" id="3_dorm" name="quartos" value="3"<?php echo ($busca->busca->quartos == '3')?' checked="checked"':''; ?>>
                                    <label for="3_dorm">3+</label>
                                </li>
                                <li>
                                    <input type="radio" id="4_dorm" name="quartos" value="4"<?php echo ($busca->busca->quartos == '4')?' checked="checked"':''; ?>>
                                    <label for="4_dorm">4+</label>
                                </li>
                            </ul>
                        </div>

                        <hr class="line">

                        <h3 class="sub-title-busca collapse-title<?php echo (!empty($busca->busca->vagas))?' active':''; ?>" id="vagas">VAGAS</h3>
                        <div id="co-vagas" class="collapse<?php echo (!empty($busca->busca->vagas))?' active':''; ?>">
                            <ul class="check-radio check-quartos">
                                <li>
                                    <input type="radio" id="1_vaga" name="vagas" value="1"<?php echo ($busca->busca->vagas == '1')?' checked="checked"':''; ?>>
                                    <label for="1_vaga">1+</label>
                                </li>
                                <li>
                                    <input type="radio" id="2_vaga" name="vagas" value="2"<?php echo ($busca->busca->vagas == '2')?' checked="checked"':''; ?>>
                                    <label for="2_vaga">2+</label>
                                </li>
                                <li>
                                    <input type="radio" id="3_vaga" name="vagas" value="3"<?php echo ($busca->busca->vagas == '3')?' checked="checked"':''; ?>>
                                    <label for="3_vaga">3+</label>
                                </li>
                                <li>
                                    <input type="radio" id="4_vaga" name="vagas" value="4"<?php echo ($busca->busca->vagas == '4')?' checked="checked"':''; ?>>
                                    <label for="4_vaga">4+</label>
                                </li>
                            </ul>
                        </div>

                        <hr class="line">

                        <h3 class="sub-title-busca collapse-title<?php echo (!empty($busca->busca->banheiros))?' active':''; ?>" id="banheiros">BANHEIROS</h3>
                        <div id="co-banheiros" class="collapse<?php echo (!empty($busca->busca->banheiros))?' active':''; ?>">
                            <ul class="check-radio check-quartos">
                                <li>
                                    <input type="radio" id="1_banheiro" name="banheiros" value="1"<?php echo ($busca->busca->banheiros == '1')?' checked="checked"':''; ?>>
                                    <label for="1_banheiro">1+</label>
                                </li>
                                <li>
                                    <input type="radio" id="2_banheiro" name="banheiros" value="2"<?php echo ($busca->busca->banheiros == '2')?' checked="checked"':''; ?>>
                                    <label for="2_banheiro">2+</label>
                                </li>
                                <li>
                                    <input type="radio" id="3_banheiro" name="banheiros" value="3"<?php echo ($busca->busca->banheiros == '3')?' checked="checked"':''; ?>>
                                    <label for="3_banheiro">3+</label>
                                </li>
                                <li>
                                    <input type="radio" id="4_banheiro" name="banheiros" value="4"<?php echo ($busca->busca->banheiros == '4')?' checked="checked"':''; ?>>
                                    <label for="4_banheiro">4+</label>
                                </li>
                            </ul>
                        </div>

                        <hr class="line">

                        <h3 class="sub-title-busca collapse-title<?php echo (!empty($busca->busca->caracteristicas))?' active':''; ?>" id="caracteristicas">CARACTERÍSTICAS</h3>
                        <div id="co-caracteristicas" class="collapse<?php echo (!empty($busca->busca->caracteristicas))?' active':''; ?>">
                            <ul class="check-radio check-tipos">
                                <?php foreach( $caracteristicas as $row ){ ?>
                                <li>
                                    <input type="checkbox" id="irc_<?php echo $row->slug; ?>" name="caracteristicas[]" value="<?php echo $row->slug; ?>"<?php echo (in_array($row->slug,$ir))?' checked="checked"':''; ?>>
                                    <label for="irc_<?php echo $row->slug; ?>"><?php echo $row->nome; ?></label>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>

                        <hr class="line">

                        <label class="form-check form-switch" for="mobiliados">
                            <span class="form-check-label">MOBILIADOS</span>
                            <input class="form-check-input" type="checkbox" id="mobiliados" name="mobiliados" value="s"<?php echo ($busca->busca->mobiliados == 's')?' checked="checked"':''; ?>>
                        </label>

                        <?php
                        /*
                        <label class="form-check form-switch" for="lancamento">
                            <span class="form-check-label">LANÇAMENTOS</span>
                            <input class="form-check-input" type="checkbox" id="lancamento" name="lancamentos" value="s"<?php echo ($busca->busca->lancamentos == 's')?' checked="checked"':''; ?>>
                        </label>
                        */
                        ?>

                        <hr class="line">

                        <input type="text" class="codigo ph-secondary" placeholder="CÓDIGO" name="codigo" value="<?php echo urldecode($busca->busca->codigo); ?>">

                        <hr class="line">
                        <div class="row">
                            <div class="col-8 align-center">
                                <input type="button" class="bt-limpar" value="LIMPAR FILTROS" id="limpa-busca">
                            </div>
                            <div class="col-4 align-center">
                                <button class="bt-busca" name="frm_submit" title="Buscar" onclick="buscar();return false;">
									<?php include caminho_fisico()."assets/site/img/lupa.svg"; ?>
								</button>
                            </div>
                        </div>
                    </div>
                    <!-- ################################ -->
                    <!-- ################################ -->
                    <?php if( !empty($busca->busca->destaques) ){ ?>
                    <input type="hidden" name="destaques" value="<?php echo $busca->busca->destaques; ?>" />
                    <?php } ?>
                    <?php if( !empty($busca->busca->condominio) ){ ?>
                    <input type="hidden" name="condominio" value="<?php echo $busca->busca->condominio; ?>" />
                    <?php } ?>
                    <?php if( !empty($busca->busca->exclusivos) ){ ?>
                    <input type="hidden" name="exclusivos" value="<?php echo $busca->busca->exclusivos; ?>" />
                    <?php } ?>
                    <?php if( !empty($busca->busca->codigos) ){ ?>
                    <input type="hidden" name="codigos" value="<?php echo $busca->busca->codigos; ?>" />
                    <?php } ?>
                    <?php if( !empty($busca->busca->origem) ){ ?>
                    <input type="hidden" name="origem" value="<?php echo $busca->busca->origem; ?>" />
                    <?php } ?>
                    <?php if( !empty($origem) ){ ?>
                    <input type="hidden" name="origem" value="<?php echo $origem; ?>" />
                    <?php } ?>
                    <?php if( !empty($busca->busca->corretor) ){ ?>
                    <input type="hidden" name="corretor" value="<?php echo $busca->busca->corretor; ?>" />
                    <?php } ?>
                    <input id="myorder" type="hidden" name="" value="" />
                    <!-- ################################ -->
                    <!-- ################################ -->
                </form>

                <div class="col-xl-9 col-lg-8 col-sm-7 col-12 mt-4">
                    <div class="row gutter-x3" id="resultados">
                        <!-- ################################ -->
                        <!-- ################################ -->
                        <?php echo view('site/busca/resultados'); ?>
                        <!-- ################################ -->
                        <!-- ################################ -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ################################ -->
    <!-- ################################ -->
<?php echo view('site/inc/rodape'); ?>