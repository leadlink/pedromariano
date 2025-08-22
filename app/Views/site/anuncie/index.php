<?php echo view('site/inc/head'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    <?php echo view('site/inc/topo'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    <section class="fleft100 empresa anunciar internas">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 title-sc-home mb-4">
                    <h1 class="h2-home"><?php echo $secao->titulo; ?></h1>
                    <span class="sub-title"><span></span> Quer vender ou alugar seu imóvel sem dor de cabeça?</span>
                </div>

                <div class="col-lg-9 col-12 mt-5 tex-anunciar">
                    <div class="row">
                        <div class="col-lg-6 col-12 pe-lg-5 mb-4">
                            <h2 class="mb-4">Chega de promessas vazias e resultados que nunca chegam.</h2>
                            <p>Na FR Prime, transformamos seu imóvel em uma oportunidade real de negócio — com estratégia, agilidade, visibilidade e <b>respaldo jurídico completo</b>. <br><br>Não importa se o seu imóvel está parado há meses ou se você nem sabe por onde começar. <br><br>A gente cuida de tudo.</p>

                            <a href="#formulario" title="Quero anunciar meu imóvel" class="bt-primary deslize mt-4">Quero anunciar meu imóvel  <svg fill="#000000" width="14" height="14" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg"><path d="M200,64V168a8,8,0,0,1-16,0V83.314L69.65674,197.65723a8.00018,8.00018,0,0,1-11.31348-11.31446L172.686,72H88a8,8,0,0,1,0-16H192A8.00039,8.00039,0,0,1,200,64Z"></path></svg></a>
                        </div>
                        <figure class="col-lg-6 col-12 mb-4"><img src="<?php echo Foto(base_url().'uploads/arquivos/'.$secao->imagem,'original'); ?>" alt="<?php echo $secao->titulo; ?>" class="lazy-cover"></figure>
                    </div>
                </div>

                <div class="col-lg-9 col-12 my-5">
                    <hr class="line">
                </div>

                <div class="col-lg-9 col-12">
                    <h2 class="mb-4">Por que anunciar com a FR Prime?</h2>

                    <ul class="avaliar mt-3">
                        <li>
                            <figure><img data-src="<?php echo base_url(); ?>assets/site/img/aa1.png" class="lazy" alt=""></figure>
                            <div>
                                <span>Avaliação inteligente e estratégica</span>
                                <p>Nada de achismo. Usamos dados reais e leitura de mercado para precificar seu imóvel com precisão — valorizando seu patrimônio e atraindo o comprador certo.</p>
                            </div>
                        </li>
                        <li>
                            <figure><img data-src="<?php echo base_url(); ?>assets/site/img/aa2.png" class="lazy" alt=""></figure>
                            <div>
                                <span>Seu imóvel com cara de oportunidade</span>
                                <p>Fotos profissionais. Descrições que vendem. Anúncios que se destacam. Sim, apresentação importa — e a gente faz isso bem.</p>
                            </div>
                        </li>
                        <li>
                            <figure><img data-src="<?php echo base_url(); ?>assets/site/img/aa3.png" class="lazy" alt=""></figure>
                            <div>
                                <span>Divulgação nos lugares certos</span>
                                <p>Portais, redes sociais, campanhas digitais e um banco de dados com compradores reais. Seu imóvel ganha visibilidade — e resultado.</p>
                            </div>
                        </li>
                        <li>
                            <figure><img data-src="<?php echo base_url(); ?>assets/site/img/aa4.png" class="lazy" alt=""></figure>
                            <div>
                                <span>Suporte jurídico completo</span>
                                <p>Do contrato à escritura, da locação à venda: segurança e conformidade em todas as etapas. Sem sustos, sem riscos.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-9 col-12 mt-4 mb-5">
                    <hr class="line">
                </div>

                <div class="col-lg-9 col-12">
                    <h2 class="mb-4">Para quem é essa oportunidade?</h2>

                    <ul class="oportunidade mt-5">
                        <li>
                            <h3>Para o proprietário que quer vender</h3>
                            <hr>
                            <p>Você tem um imóvel parado ou quer se desfazer de um bem? Nós criamos a estratégia certa para vender com velocidade e valorização real.</p>
                        </li>
                        <li>
                            <h3>Para quem quer alugar sem dor de cabeça</h3>
                            <hr>
                            <p>Receba sua renda sem se preocupar com inadimplência, contratos ou manutenção. A FR Prime cuida de tudo, da locação ao repasse.</p>
                        </li>
                        <li>
                            <h3>Para quem já tentou e se frustrou</h3>
                            <hr>
                            <p>Se outra imobiliária prometeu e não entregou, você está no lugar certo. Aqui, palavra e resultado andam juntos.</p>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-9 col-12 mt-5">
                    <h2 class="mb-4">Chega de tentar <br>sozinho</h2>
                    <ul class="avaliar mt-3">
                        <li>
                            <div>
                                <span>Anuncie seu imóvel com quem sabe o que faz — e cuida de tudo por você.</span>
                                <p class="mt-4">Preencha o formulário abaixo e fale com um especialista da FR Prime. <br>A gente avalia seu imóvel, monta a estratégia e vai atrás do resultado — com inteligência, presença e seriedade.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-10 col-12 my-5">
                    <div class="box-nivo" id="formulario">
                        <form action="<?php echo base_url(); ?>envio/anuncie/" method="post" id="form_anuncie" name="form_anuncie" class="row form validacao">
                            <input type="hidden" name="imovel" value="<?php echo CurrentURL(); ?>">
                            <input type="hidden" name="redirect" value="<?php echo CurrentURL(); ?>" />
                            <input type="hidden" name="origem" value="<?php echo service('session')->get('FrP41me_origem'); ?>" />

                            <input type="hidden" name="utm_source" value="<?php echo (!empty($_GET['utm_source']))?$_GET['utm_source']:''; ?>" />
                            <input type="hidden" name="utm_medium" value="<?php echo (!empty($_GET['utm_medium']))?$_GET['utm_medium']:''; ?>" />
                            <input type="hidden" name="utm_campaign" value="<?php echo (!empty($_GET['utm_campaign']))?$_GET['utm_campaign']:''; ?>" />
                            <input type="hidden" name="utm_content" value="<?php echo (!empty($_GET['utm_content']))?$_GET['utm_content']:''; ?>" />
                            <input type="hidden" name="utm_term" value="<?php echo (!empty($_GET['utm_term']))?$_GET['utm_term']:''; ?>" />
                            <div class="col-12 title-form">
                                <h2>Quero anunciar meu imóvel com a FR Prime</h2>
                            </div>
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

                            <div class="col-lg-4 col-sm-6 col-12 my-2">
                                <label>
                                    <small>ENDEREÇO DO IMÓVEL</small>
                                    <input type="text" name="endereco" placeholder="Preencha o Endereço Completo" required="required">
                                </label>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-12 my-2">
                                <label>
                                    <small>BAIRRO</small>
                                    <input type="text" name="bairro" placeholder="Preencha o Bairro" required="required">
                                </label>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-12 my-2">
                                <label>
                                    <small>CIDADE</small>
                                    <input type="text" name="cidade" placeholder="Preencha a Cidade" required="required">
                                </label>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-12 my-2">
                                <label>
                                    <small>LOCAÇÃO OU VENDA?</small>
                                    <select name="modo" required="required" aria-label="Finalidade do Imóvel">
                                        <option value="" selected="selected">Selecione</option>
                                        <option value="Venda">Venda</option>
                                        <option value="Locação">Locação</option>
                                        <option value="Locação e Venda">Locação e Venda</option>
                                    </select>
                                </label>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-12 my-2">
                                <label>
                                    <small>VALOR</small>
                                    <input type="text" name="valor" placeholder="Preencha o Valor Desejado" class="valor" required="required">
                                </label>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-12 my-2">
                                <label>
                                    <small>ÁREA M²</small>
                                    <input type="text" name="area" placeholder="Preencha a Área do Imóvel" class="area" required="required">
                                </label>
                            </div>

                            <div class="col-12 my-2">
                                <label>
                                    <small>MENSAGEM</small>
                                    <textarea name="mensagem" placeholder="Descreva brevemente o imóvel" rows="4"></textarea>
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

                <div class="col-lg-9 col-12 mt-5 faqs-anunciar">
                    <h2 class="mb-4">Perguntas frequentes</h2>
                    <ul class="card-acordion">
                        <li>
                            <h4 class="active">Posso anunciar com vocês mesmo não estando na cidade?</h4>
                            <p class="acordion-texto open">Sim! Atuamos com imoveis em Volta Redonda, no Sul Fluminense e tambem em Sao Paulo. Se o imóvel está dentro da nossa área de atuação, cuidamos de tudo - mesmo que você esteja longe.</p>
                        </li>
                        <li>
                            <h4 class="active">Quanto custa para anunciar com a FR Prime?</h4>
                            <p class="acordion-texto open">Você só paga <b>se a gente vender ou alugar seu imóvel</b>. <br>Nossa remuneração é feita por comissão, no modelo de sucesso. Ou seja, se não vender, <b>você não paga nada</b>.</p>
                        </li>
                        <li>
                            <h4 class="active">Vocês ajudam com a parte de documentação e contrato?</h4>
                            <p class="acordion-texto open">Sim. Nossa equipe oferece <b>suporte jurídico completo</b>. <br>Cuidamos de toda a parte burocrática, com contratos personalizados, análise documental e acompanhamento até a assinatura.</p>
                        </li>
                        <li>
                            <h4 class="active">Preciso preparar o imóvel antes de anunciar</h4>
                            <p class="acordion-texto open">Se necessário, indicamos melhorias simples que podem aumentar o valor percebido e acelerar a venda ou locação. Também oferecemos <b>serviços de fotos profissionais</b>.</p>
                        </li>
                        <li>
                            <h4 class="active">Vocês também fazem locação por temporada ou Airbnb?</h4>
                            <p class="acordion-texto open">Sim. Atuamos com <b>short stay</b> (locações de curta duração) em imóveis selecionados, especialmente em São Paulo. Avaliamos o perfil do seu imóvel e, se fizer sentido, estruturamos tudo pra gerar renda passiva com alta rotatividade.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ################################ -->
    <!-- ################################ -->
<?php echo view('site/inc/rodape'); ?>