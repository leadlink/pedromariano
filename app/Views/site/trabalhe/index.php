<?php echo view('site/inc/head'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    <?php echo view('site/inc/topo'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    	<section class="fleft100 avalie">
		<div class="container">
		<div class="row justify-content-center">
				<div class="col-lg-7 col-12 pe-lg-5">
					<h2 class="h2-traco">
						<span>Por que trabalhar na <br>Pedro Mariano Imóveis?</span>
						<hr>
					</h2>

					<p class="texto-internas">
						Poderíamos tentar explicar o que significa, para nós, valorizar e cuidar das nossas pessoas.
						<br><br>
						Mas preferimos que você sinta isso.
						<br><br>
						Sinta no ambiente colaborativo, na confiança que construímos juntos, no respeito pelas individualidades e no reconhecimento pelo trabalho bem-feito.
						<br><br>
						A Pedro Mariano Imóveis é mais do que um lugar para trabalhar é um espaço onde você se desenvolve, cresce e tem voz.
					</p>
				</div>

				<figure class="col-lg-5 col-12 img-avalie">
					<img src="<?php echo base_url(); ?>assets/site/img/bg-trabalhe.jpg" class="lazy-cover radius-20"  alt="">
				</figure>

				<div class="col-xl-4 col-lg-5 col-12 my-5">
					<div class="frase">
						Na Pedro Mariano Imóveis, acreditamos em um ambiente de acolhimento e segurança  onde cada pessoa possa ser, se expressar e se orgulhar de quem é.
					</div>
				</div>

				<div class="col-12">
					<div class="texto-internas texto-trabalhe">
						Aqui, equidade, representatividade e respeito às diferenças não são apenas valores: são parte viva da nossa cultura. Promovemos diariamente um espaço onde todos se sintam respeitados, valorizados e livres para serem autênticos.
						<br><br>
						Por meio do Juntos, abrimos espaço para o diálogo, para as diferenças e para a construção de relações mais humanas e equilibradas.
						<br><br>
						Buscamos, assim, evoluir continuamente como empresa, equilibrando vida pessoal e profissional e reforçando o nosso compromisso com um ambiente de trabalho genuinamente acolhedor e ético.
						<br><br>
						<strong>Venha trabalhar com a Pedro Mariano Imóveis!</strong>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="fleft100 form-section mb-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10 col-12">
					<div class="row">
						<div class="col-lg-5 col-12 pe-lg-5 mb-4">
							<p>Faça parte de uma equipe consolidada, com tradição no mercado e foco em inovação, crescimento e resultados. <br>Aqui, você encontra:</p>
						</div>
						<ul class="col-lg-5 col-12 checks">
							<li>Estrutura completa de apoio</li>
							<li>Tecnologia de ponta para facilitar sua rotina</li>
							<li>Ambiente colaborativo e profissional</li>
							<li>Oportunidades reais de crescimento</li>
							<li><b>Se você é movido por desafios e busca reconhecimento, o seu lugar é com a gente!</b></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-10 col-12 mt-5">
					<div class="box-destaque">
						<form action="" class="row form">
							<div class="col-12 title-form">
								<h2>Formulário</h2>
							</div>

							<div class="col-12 form-inputs">
								<div class="row">
									<div class="col-12 title">
										<h3><img data-src="<?php echo base_url(); ?>assets/site/img/lapis.png" class="lazy" alt="Preencha alguns dados"> Preencha alguns dados</h3>
									</div>

									<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
										<label>
											<small>NOME*</small>
											<input type="text" name="nome" placeholder="Digite">
										</label>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
										<label>
											<small>E-MAIL*</small>
											<input type="text" name="nome" placeholder="Digite">
										</label>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
										<label>
											<small>TELEFONE*</small>
											<input type="text" name="nome" placeholder="Digite">
										</label>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
										<label>
											<small>CIDADE*</small>
											<select name="cidade">
												<option value="">Selecione</option>
											</select>
										</label>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
										<label>
											<small>DATA DE NASCIMENTO</small>
											<input type="text" name="nome" placeholder="">
										</label>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
										<label>
											<small>ENDEREÇO COMPLETO</small>
											<input type="text" name="nome" placeholder="Digite">
										</label>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
										<label>
											<small>BAIRRO</small>
											<input type="text" name="nome" placeholder="Digite">
										</label>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
										<label>
											<small>VAGA</small>
											<select name="cidade">
												<option value="">Selecione</option>
											</select>
										</label>
									</div>

									<div class="col-12 mb-4 mt-2"><hr class="line"></div>

									<div class="col-12 title">
										<h3><img data-src="<?php echo base_url(); ?>assets/site/img/msg.png" class="lazy" alt=""> Mensagem</h3>
									</div>

									<div class="col-12 mb-3">
										<textarea name="mensagem" placeholder="Digite livremente" rows="4"></textarea>
									</div>

									<div class="col-lg-10 col-12 my-auto">
										<label class="anexo">
											<input type="file">
											<span>Anexar currículo <small>Selecione</small></span>
										</label>
									</div>

									<div class="col-lg-2 col-12 mt-3">
										<input type="submit" value="Enviar">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- ################################ -->
    <!-- ################################ -->
<?php echo view('site/inc/rodape'); ?>