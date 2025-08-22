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
                    <span class="sub-title"><span></span> Fale com a FR Prime Imóveis</span>
                </div>

                <figure class="col-12 imagem-empresa">
                    <img data-src="<?php echo Foto(base_url().'uploads/arquivos/'.$secao->imagem,'original'); ?>" alt="<?php echo $secao->titulo; ?>" class="lazy lazy-cover">
                </figure>

                <div class="col-lg-9 col-12 mt-5">
                    <h2 class="mb-4">Imóveis com estratégia. <br>Atendimento com verdade.</h2>
                    <p>Seja para comprar, vender, investir ou anunciar, aqui você fala com quem resolve. <br><br>Nossa equipe está pronta para te atender com agilidade, clareza e visão estratégica — sem enrolação e sem linguagem de corretor automático.</p>
                </div>

                <div class="col-lg-9 col-12 mt-5">
                    <h2 class="mb-4">Chega de corretês</h2>

                    <ul class="lista-seta">
                        <li>Quer saber mais sobre um imóvel que viu no site?</li>
                        <li>Busca orientação para investir com rentabilidade real?</li>
                        <li>Precisa vender ou alugar seu imóvel com segurança e agilidade?</li>
                        <li>Tem dúvidas sobre financiamento, consórcio ou gestão de imóveis?</li>
                    </ul>

                    <h2 class="mt-5">Fale agora com um especialista da FR Prime.</h2>
                    <p>
                        É só preencher os campos abaixo ou escolher o canal de sua preferência.
                    </p>
                </div>

                <div class="col-lg-10 col-12 my-5">
                    <div class="box-nivo">
                        <form action="<?php echo base_url(); ?>envio/contato/" method="post" id="form_contato" name="form_contato" class="row form validacao">
                            <input type="hidden" name="imovel" value="<?php echo CurrentURL(); ?>">
                            <input type="hidden" name="redirect" value="<?php echo CurrentURL(); ?>" />
                            <input type="hidden" name="origem" value="<?php echo service('session')->get('FrP41me_origem'); ?>" />

                            <input type="hidden" name="utm_source" value="<?php echo (!empty($_GET['utm_source']))?$_GET['utm_source']:''; ?>" />
                            <input type="hidden" name="utm_medium" value="<?php echo (!empty($_GET['utm_medium']))?$_GET['utm_medium']:''; ?>" />
                            <input type="hidden" name="utm_campaign" value="<?php echo (!empty($_GET['utm_campaign']))?$_GET['utm_campaign']:''; ?>" />
                            <input type="hidden" name="utm_content" value="<?php echo (!empty($_GET['utm_content']))?$_GET['utm_content']:''; ?>" />
                            <input type="hidden" name="utm_term" value="<?php echo (!empty($_GET['utm_term']))?$_GET['utm_term']:''; ?>" />
                            <div class="col-lg-4 col-sm-6 col-12 my-2">
                                <label>
                                    <small>NOME</small>
                                    <input type="text" name="nome" placeholder="Preencha seu Nome" required="required" value="<?php echo service('session')->get('FrP41me_nome'); ?>">
                                </label>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-12 my-2">
                                <label>
                                    <small>E-MAIL</small>
                                    <input type="text" name="email" placeholder="Preencha seu E-mail" required="required" value="<?php echo service('session')->get('FrP41me_email'); ?>">
                                </label>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-12 my-2">
                                <label>
                                    <small>TELEFONE/WHATSAPP</small>
                                    <input type="text" name="telefone" placeholder="Preencha seu Telefone" required="required" value="<?php echo service('session')->get('FrP41me_fone'); ?>">
                                </label>
                            </div>

                            <div class="col-12 my-2">
                                <label>
                                    <small>MENSAGEM</small>
                                    <textarea name="mensagem" placeholder="Escreva sua Mensagem" rows="4"></textarea>
                                </label>
                            </div>

                            <div class="leadlink">
                                <input type="text" name="leadlink" value="">
                                <input type="text" name="linklead" value="<?php echo service('session')->get('session_id'); ?>">
                            </div>

                            <div class="col-lg-8 col-12 my-auto py-2">
                                <span class="check">Ao enviar o formulário, você concorda com a nossa <a href="<?php echo base_url(); ?>politica-de-privacidade/" title="Política de Privacidade">Política de Privacidade</a>.</span>
                            </div>

                            <div class="col-lg-4 col-12 bt-form my-2">
                                <input type="submit" value="Enviar">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-9 col-12 mb-5">
                    <h2 class="mb-2">Onde estamos</h2>
                    <p>Atendemos presencialmente e online em:</p>

                    <?php foreach( $enderecos as $endereco ){ ?>
                    <ul class="e-fone">
                        <li>
                            <h3><?php echo $endereco->local; ?> - <?php echo $endereco->estado; ?></h3>
                            <address>
                                <a href="<?php echo $endereco->maps; ?>" title="Traçar Rota" target="_blank">
                                    <?php echo $endereco->endereco; ?> - <?php echo $endereco->bairro; ?><br>
                                    <?php echo $endereco->cidade; ?>/<?php echo $endereco->estado; ?> - CEP: <?php echo $endereco->cep; ?>
                                </a>
                            </address>
                        </li>
                        <li>
                            <a href="tel:+<?php echo Telefone($endereco->telefone); ?>" title="Telefone" target="_blank">
                                <small>Telefone</small>
                                <span>
                                    <?php include caminho_fisico()."assets/site/img/fone.svg"; ?>
                                    <?php echo $endereco->telefone; ?>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#whatsapp<?php echo ($endereco->id == '2')?'-alphaville':''; ?>" data-bs-toggle="modal" title="WhatsApp">
                                <small>WhatsApp</small>
                                <span>
                                    <?php include caminho_fisico()."assets/site/img/wpp.svg"; ?>
									<?php echo $endereco->whatsapp; ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <iframe class="mapa" title="Google Maps" src="https://maps.google.com/maps?q=<?php echo urlencode($config->endereco.' - '.$endereco->bairro.', '.$endereco->cidade.', '.$endereco->estado); ?>&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <?php } ?>


                </div>
            </div>
        </div>
    </section>
    <!-- ################################ -->
    <!-- ################################ -->
<?php echo view('site/inc/rodape'); ?>