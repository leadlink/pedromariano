<?php echo view('site/inc/head'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    <?php echo view('site/inc/topo'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    <section class="fleft100 empresa calculadora internas">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 title-sc-home mb-4">
                    <h1 class="h2-home"><?php echo $secao->titulo; ?></h1>
                    <span class="sub-title"><span></span> Descubra o valor do seu imóvel na hora.</span>
                </div>

                <figure class="col-12 imagem-empresa">
                    <img data-src="<?php echo Foto(base_url().'uploads/arquivos/'.$secao->imagem,'original'); ?>" alt="<?php echo $secao->titulo; ?>" class="lazy lazy-cover">
                </figure>

                <div class="col-lg-9 col-12 mt-5">
                    <h2 class="mb-4">Avaliação gratuita, instantânea <br>e com inteligência artificial.</h2>
                    <p>Você quer vender, alugar ou apenas entender quanto vale seu imóvel hoje? <br>
                    Com a FR Prime, você descobre isso <b>em poucos minutos.</b>
                    <br><br>
                    Chega de esperar dias por um retorno. <br>
                    Nossa ferramenta usa <b>inteligência artificial + dados reais de mercado</b> para entregar a estimativa com agilidade, clareza e sem enrolação.</p>
                </div>

                <div class="col-lg-9 col-12 my-5">
                    <hr class="line">
                </div>

                <div class="col-lg-9 col-12">
                    <h2 class="mb-4">Por que avaliar seu imóvel agora?</h2>

                    <ul class="avaliar mt-3">
                        <li>
                            <figure><img data-src="<?php echo base_url(); ?>assets/site/img/a1.png" class="lazy" alt=""></figure>
                            <div>
                                <span>Tomar decisões inteligentes, com base em dados</span>
                                <p>Saber o valor real do seu imóvel te ajuda a planejar a venda, a locação ou até mesmo uma futura valorização.</p>
                            </div>
                        </li>
                        <li>
                            <figure><img data-src="<?php echo base_url(); ?>assets/site/img/a2.png" class="lazy" alt=""></figure>
                            <div>
                                <span>Entender se é o momento certo para negociar</span>
                                <p>Você pode descobrir que está na hora certa de vender — ou que pequenos ajustes podem aumentar o valor percebido.</p>
                            </div>
                        </li>
                        <li>
                            <figure><img data-src="<?php echo base_url(); ?>assets/site/img/a3.png" class="lazy" alt=""></figure>
                            <div>
                                <span>Evitar erros que travam a venda</span>
                                <p>Muitos imóveis ficam parados por estarem com preço fora da realidade. Uma boa precificação é o primeiro passo para uma venda rápida e lucrativa.</p>
                            </div>
                        </li>
                        <li>
                            <figure><img data-src="<?php echo base_url(); ?>assets/site/img/a4.png" class="lazy" alt=""></figure>
                            <div>
                                <span>Tecnologia de ponta + experiência de mercado real</span>
                                <p>Não é só IA. É IA com inteligência de verdade. Cruzamos dados com a visão de quem vive o mercado todos os dias.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-9 col-12 mt-4">
                    <h2 class="mb-4">Como funciona?</h2>

                    <ul class="ca-passos mt-3">
                        <li>
                            <span class="num">1</span>
                            <p>
                                Você preenche os dados do seu imóvel.
                            </p>
                        </li>
                        <li>
                            <span class="num">2</span>
                            <p>
                                Nossa ferramenta analisa em segundos
                            </p>
                        </li>
                        <li>
                            <span class="num">3</span>
                            <p>
                                Você recebe o valor estimado na hora.
                            </p>
                        </li>
                    </ul>

                    <p>Sem precisar agendar visita. Sem complicação. Sem compromisso.</p>
                </div>

                <div class="col-lg-9 col-12 my-5">
                    <hr class="line">
                </div>

                <div class="col-lg-9 col-12">
                    <h2 class="h2-icone mb-4">Avalie seu imóvel agora mesmo</h2>
                    <p>Preencha os dados abaixo e descubra quanto seu imóvel vale hoje — em menos de 2 minutos.</p>	
                </div>

                <div class="col-lg-10 col-12 my-5">
                    <div class="box-nivo">
                        Embed nivo
                    </div>	
                </div>

                <div class="col-lg-9 col-12 mb-5">
                    <h2 class="h2-icone mb-4">E depois da avaliação?</h2>
                    
                    <ul class="lista-seta">
                        <li>Preparar seu imóvel para o mercado</li>
                        <li>Atender, negociar e fechar com segurança</li>
                        <li>Anunciar nos canais certos</li>
                        <li>Cuidar de toda a parte jurídica e burocrática</li>
                    </ul>

                    <p>Com o suporte completo da FR Prime — a imobiliária que entrega estratégia, resultado e respeito pela sua história.</p>	
                </div>			
            </div>
        </div>
    </section>
    <!-- ################################ -->
    <!-- ################################ -->
<?php echo view('site/inc/rodape'); ?>