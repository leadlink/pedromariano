<?php echo view('site/inc/head'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    <?php echo view('site/inc/topo'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    <section class="fleft100 depoimentos internas">
        <div class="container">
            <div class="row gutter-x3">
                <div class="col-12 title-sc-home mt-3 mb-4">
                    <h1 class="h2-home">O que dizem sobre a FR Prime?</h1>
                    <span class="sub-title"><span></span> Confiança que constrói com resultado.</span>
                </div>

                <?php if( $depoimentos->getNumRows() > 0 ){ ?>
                <?php foreach( $depoimentos->getResult() as $reg ){ ?>
                <div class="col-lg-4 col-md-6 col-12 my-4">
                    <?php
                    #############################################
                    #############################################
                    $dep['reg'] = $reg;
                    #############################################
                    #############################################
                    echo view('site/depoimentos/depoimento',$dep);
                    #############################################
                    #############################################
                    ?>
                </div>
                <?php } ?>
                <?php } ?>

            </div>
        </div>
    </section>
    <!-- ################################ -->
    <!-- ################################ -->
<?php echo view('site/inc/rodape'); ?>