<?php echo view('site/inc/head'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    <?php echo view('site/inc/topo'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    <section class="fleft100 empresa contato internas">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 title-sc-home mb-4">
                    <h1 class="h2-home"><?php echo $secao->titulo; ?></h1>
                    <span class="sub-title"><span></span> Gerencie seus imóveis favoritos salvos no site.</span>
                </div>
            </div>
        </div>
    </section>

    <section class="fleft100">
        <div class="container">
            <div class="row">
                <?php if( $totalvenda > 0 || $totallocacao > 0 ){ ?>
                    <?php if( $totalvenda > 0 ){ ?>
                    <div class="col-12">
                        <h2>Seus Imóveis Favoritos para Comprar</h2>
                    </div>
                    <div class="col-12 mb-5">
                        <div class="row gutter-x3">
                            <?php foreach( $venda as $reg ){ ?>
                            <div class="col-lg-3 col-sm-6 col-12 my-4" id="favorito_<?php echo $reg->referencia.'_'.$reg->modo; ?>">
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
                        </div>
                    </div>
                    <?php } ?>

                    <?php if( $totallocacao > 0 ){ ?>
                    <div class="col-12">
                        <h2>Seus Imóveis Favoritos para Alugar</h2>
                    </div>
                    <div class="col-12 mb-5">
                        <div class="row gutter-x3">
                            <?php foreach( $locacao as $reg ){ ?>
                            <div class="col-lg-3 col-sm-6 col-12 my-4" id="favorito_<?php echo $reg->referencia.'_'.$reg->modo; ?>">
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
                        </div>
                    </div>
                    <?php } ?>
                <?php }else{ ?>
                <div class="col-12 my-5 py-5">
                <h2 class="text-center py-5 mb-5">Você não possui imóveis favoritos.</h2>
                <div>
                    <h2 class="ft-zero"><?php echo $secao->titulo; ?></h2>
                    <p class="ft-zero">
                        <?php echo $secao->descricao; ?>
                        <br />
                        <?php echo nl2br($config->descricao); ?>
                    </p>
                </div>
            </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- ################################ -->
    <!-- ################################ -->
<?php echo view('site/inc/rodape'); ?>