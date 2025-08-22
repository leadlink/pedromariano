    <div class="card-deps">
        <div class="pessoa">
            <figure>
                <img data-src="<?php echo Foto(base_url().'uploads/depoimentos/'.$reg->foto,'150x150'); ?>" alt="<?php echo $reg->nome; ?>" title="<?php echo $reg->nome; ?>" class="lazy lazy-cover">
            </figure>
            <div class="nome">
                <span><?php echo $reg->nome; ?></span>
                <small><?php echo $reg->profissao; ?></small>
                <ul class="star">
                    <?php for( $i = 1; $i <= $reg->nota; $i++ ){ ?>
                    <li><?php include caminho_fisico()."assets/site/img/star.svg"; ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <p class="mensagem">
            <?php echo LerMais($reg->mensagem,220); ?>
        </p>
    </div>