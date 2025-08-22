<?php echo view('site/inc/head'); ?>

<section class="fleft100 busca-home busca" style="background:url(<?php echo Foto(base_url().'uploads/arquivos/'.$config->fundo,'original'); ?>);">
	<?php echo view('site/inc/topo'); ?>

	<div class="fleft100">
		<div class="container">
			<form action="<?php echo base_url(); ?>busca/" method="POST" name="form_busca" id="form_busca" class="row">
				<!-- ################################ -->
				<!-- ################################ -->
				<?php echo view('site/inc/bairros'); ?>
				<?php echo view('site/inc/tipos'); ?>
				<!-- ################################ -->
				<!-- ################################ -->
				<div class="col-xl-7 col-lg-10 col-12 title-home">
					<h1>Os melhores imóveis para <br>comprar ou alugar estão aqui.</h1>
				</div>

				<div class="col-xl-7 col-lg-10 col-11 checks-home">
					<ul class="check-radio">
						<li>
							<input type="radio" id="md-comprar" name="modo" value="comprar" checked="checked">
							<label for="md-comprar">Comprar</label>
						</li>
						<li>
							<input type="radio" id="md-alugar" name="modo" value="alugar">
							<label for="md-alugar">Alugar</label>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>busca/comprar/cidade/volta-redonda/1/" title="Investir">Investir</a>
						</li>
					</ul>
				</div>

				<div class="col-xl-7 col-lg-10 col-12 box-busca">
					<div class="itens-busca">
						<div class="row m-0">
							<div class="col-bts px-0 my-auto">
								<div class="row m-0">
									<div class="col-lg-4 col-12 px-1 drop-small my-2 b">
										<a href="#tipos" class="btn" data-bs-toggle="modal" title="Tipos">
											<span class="multiselect">
												<?php include caminho_fisico()."assets/site/img/tipos.svg"; ?>
												<span class="s">
													<small id="count-tipos" class="se">Tipos</small>
												</span>
											</span>
										</a>
									</div>

									<div class="col-lg-4 col-12 px-1 my-2 b">
										<a href="#bairros" class="btn" data-bs-toggle="modal" title="Localização">
											<span class="multiselect">
												<?php include caminho_fisico()."assets/site/img/maps.svg"; ?>
												<span class="s">
													<small id="count-bairros" class="se">Localização</small>
												</span>
											</span>
										</a>
									</div>

									<div class="col-lg-4 col-12 px-1 my-2">
										<div class="dropdown">
											<a href="#valores" class="btn" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
												<span class="multiselect">
													<?php include caminho_fisico()."assets/site/img/valor.svg"; ?>
													<span class="s">
														<small id="count-bairros" class="se">Valor</small>
													</span>
												</span>
											</a>
											<div class="dropdown-menu drop-valor" aria-labelledby="dropdownMenuLink" id="valores">
												<select name="valor_de" class="valor-sel" aria-label="Valor De">
													<?php echo view('site/inc/valor_de'); ?>
												</select>
												<select name="valor_ate" class="valor-sel" aria-label="Valor Até">
													<?php echo view('site/inc/valor_ate'); ?>
												</select>

												<span class="xdrop">OK</span>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-bt px-1 my-1">
								<button class="bt-busca" name="frm_submit" title="Buscar">
									<?php include caminho_fisico()."assets/site/img/lupa.svg"; ?>
								</button>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-7 col-lg-10 col-12 co-home">
					<div class="form-codigo">
						<input type="text" name="codigo" id="codigo" placeholder="Busca por Código" class="ph-white">
						<button name="frm_submit2" title="Buscar"><?php include caminho_fisico()."assets/site/img/lupa.svg"; ?></button>
					</div>

					<a href="<?php echo base_url(); ?>busca/comprar/cidade/volta-redonda/1/" title="Mais Filtros">Mais Filtros <?php include caminho_fisico()."assets/site/img/filtros.svg"; ?></a>
				</div>
			</form>
		</div>
	</div>
</section>

<section class="fleft100 home">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 title-sc-home col-12">
				<h2 class="h2-home">Atuação Imobiliária</h2>
				<span class="sub-title"><span></span> Imóveis para compra, aluguel, investimento e consórcio com suporte completo.</span>
			</div>
			<div class="col-lg-2 col-12 text-right text-left-mobile mt-3 my-lg-auto">
				<a href="<?php echo base_url(); ?>busca/comprar/1/" title="Buscar Imóveis" class="bt-seta">
					Buscar Imóveis <?php include caminho_fisico()."assets/site/img/seta_up.svg"; ?>
				</a>
			</div>
		</div>

		<?php if( $chamadas->getNumRows() > 0 ){ ?>
		<div class="row gutter-x3 mt-lg-5 mt-3">
			<?php foreach( $chamadas->getResult() as $reg ){ ?>
			<div class="col-lg-3 col-md-4 col-sm-6 col-12 my-4">
				<figure class="card-atuacao">
					<img data-src="<?php echo Foto(base_url().'uploads/arquivos/'.$reg->imagem,'300x420'); ?>" alt="<?php echo $reg->titulo; ?>" class="lazy lazy-cover">
					<a href="<?php echo $reg->url; ?>" title="<?php echo $reg->titulo; ?>">
						<span class="tex-bt">
							<span>
								<h3><?php echo $reg->titulo; ?></h3>
								<p><?php echo Redutor($reg->descricao,70); ?></p>
							</span>
						</span>
						<span class="svg-seta">
							<?php include caminho_fisico()."assets/site/img/seta_up.svg"; ?>
						</span>
					</a>
				</figure>
			</div>
			<?php } ?>
		</div>
		<?php } ?>

		<?php if( $banners->getNumRows() > 0 ){ ?>
		<div class="row sl-home mt-4">
			<div class="col-12">
				<div class="owl-home-single owl-carousel">
					<?php foreach( $banners->getResult() as $reg ){ ?>
					<figure class="item">
						<a href="<?php echo $reg->url; ?>" title="<?php echo $reg->titulo; ?>">
							<img data-src="<?php echo Foto(base_url().'uploads/arquivos/'.$reg->imagem,'1200x400'); ?>" alt="<?php echo $reg->titulo; ?>" class="lazy lazy-cover">
						</a>
					</figure>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php } ?>

		<div class="row mt-5 gutter-x3 home-acessados">
			<div class="title-sc-home col-12 mb-4">
				<h2 class="h2-home">Imóveis mais acessados</h2>
				<ul class="nav-cards">
					<?php if( $imoveis_venda->getNumRows() > 0 ){ ?>
				    <li><a href="#tab-comprar" title="Para Comprar" class="ativo">Para Comprar</a></li>
					<?php } ?>
					<?php if( $imoveis_locacao->getNumRows() > 0 ){ ?>
				    <li><a href="#tab-alugar" title="Para Alugar">Para Alugar</a></li>
					<?php } ?>
					<?php if( $imoveis_investir->getNumRows() > 0 ){ ?>
				    <li><a href="#tab-investir" title="Para Investir">Para Investir</a></li>
					<?php } ?>
				    <li>
						<a href="<?php echo base_url(); ?>busca/comprar/1/" title="Buscar Imóveis">
							Buscar Imóveis <?php include caminho_fisico()."assets/site/img/seta_up.svg"; ?>
						</a>
					</li>
			  	</ul>
			</div>

			<?php if( $imoveis_venda->getNumRows() > 0 ){ ?>
			<div class="col-12 tab-navs ativo" id="tab-comprar">
				<div class="row gutter-x3">
					<?php foreach( $imoveis_venda->getResult() as $reg ){ ?>
					<div class="col-lg-3 col-sm-6 col-12 my-4">
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

			<?php if( $imoveis_locacao->getNumRows() > 0 ){ ?>
			<div class="col-12 tab-navs" id="tab-alugar">
				<div class="row gutter-x3">
					<?php foreach( $imoveis_locacao->getResult() as $reg ){ ?>
					<div class="col-lg-3 col-sm-6 col-12 my-4">
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

			<?php if( $imoveis_investir->getNumRows() > 0 ){ ?>
			<div class="col-12 tab-navs" id="tab-investir">
				<div class="row gutter-x3">
					<?php foreach( $imoveis_investir->getResult() as $reg ){ ?>
					<div class="col-lg-3 col-sm-6 col-12 my-4">
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
		</div>

		<div class="row anuncio-home mt-4 gutter-x3">
			<div class="col-lg-3 col-md-4 col-12 my-4">
				<figure class="card-atuacao">
					<img data-src="<?php echo base_url(); ?>assets/site/img/anuncie-home.jpg" alt="Anuncie seu Imóvel" class="lazy lazy-cover">
					<a href="<?php echo base_url(); ?>anuncie-seu-imovel/" title="Anuncie seu Imóvel">
						<span class="tex-bt">
							<span>
								<h3>Anuncie <br>seu Imóvel</h3>
								<p>Venda ou alugue com agilidade, segurança e visibilidade máxima.</p>
							</span>
						</span>
						<span class="svg-seta">
							<?php include caminho_fisico()."assets/site/img/seta_up.svg"; ?>
						</span>
					</a>
				</figure>
			</div>

			<div class="col-lg-9 col-md-8 col-12 my-4">
				<div class="sobre-home">
					<figure>
						<img data-src="<?php echo base_url(); ?>assets/site/img/sobre.jpg" alt="Sobre a FR Prime" class="lazy lazy-cover">
					</figure>
					<div class="texto-sobre">
						<h2>Sobre a <span>FR Prime</span></h2>
						<p>A FR Prime não surgiu por acaso — surgiu com um propósito claro: <br><br>Enquanto muitas imobiliárias em Volta Redonda ou São Paulo seguem focadas apenas em números, a gente decidiu fazer diferente: olhar primeiro para as pessoas e só depois para os imóveis. <br><br>Oferecemos mais que intermediação. <br>Somos uma consultoria imobiliária especializada em compra, venda e investimento com foco em resultado.</p>
						<a href="<?php echo base_url(); ?>empresa/" title="Sobre a FR Prime" class="bt-seta">
							Continuar lendo <?php include caminho_fisico()."assets/site/img/seta_up.svg"; ?>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-4 gutter-x3">
			<div class="col-lg-10 title-sc-home col-12 mb-3">
				<h2 class="h2-home">Unidades FR Prime</h2>
				<span class="sub-title"><span></span> Atuação forte no Sul Fluminense e nas regiões mais valorizadas de SP.</span>
			</div>

			<div class="col-md-6 col-12 mt-4">
				<div class="card-prime">
					<figure><img data-src="<?php echo base_url(); ?>assets/site/img/a4.jpg" class="lazy lazy-cover" alt=""></figure>
					<div class="texto-prime">
						<h3><small>IMOBILIÁRIA EM</small> ALPHAVILLE/SP</h3>
						<a href="" class="bt-seta">Conheça <svg fill="#e6b85d" width="14" height="14" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg"><path d="M200,64V168a8,8,0,0,1-16,0V83.314L69.65674,197.65723a8.00018,8.00018,0,0,1-11.31348-11.31446L172.686,72H88a8,8,0,0,1,0-16H192A8.00039,8.00039,0,0,1,200,64Z"/></svg></a>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-12 mt-4">
				<div class="card-prime">
					<figure><img data-src="<?php echo base_url(); ?>assets/site/img/a4.jpg" class="lazy lazy-cover" alt=""></figure>
					<div class="texto-prime">
						<h3><small>IMOBILIÁRIA EM</small> VOLTA REDONDA/RJ</h3>
						<a href="" class="bt-seta">Conheça <svg fill="#e6b85d" width="14" height="14" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg"><path d="M200,64V168a8,8,0,0,1-16,0V83.314L69.65674,197.65723a8.00018,8.00018,0,0,1-11.31348-11.31446L172.686,72H88a8,8,0,0,1,0-16H192A8.00039,8.00039,0,0,1,200,64Z"/></svg></a>
					</div>
				</div>
			</div>
		</div>

		<?php if( $depoimentos->getNumRows() > 0 ){ ?>
		<div class="row mt-5 gutter-x3">
			<div class="col-lg-10 title-sc-home col-12 mb-3">
				<h2 class="h2-home">O que dizem sobre a FR Prime?</h2>
				<span class="sub-title"><span></span> Confiança que se constrói com resultado.</span>
			</div>

			<?php foreach( $depoimentos->getResult() as $reg ){ ?>
			<div class="col-lg-4 col-md-6 col-12 mt-4">
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
		</div>
		<?php } ?>

		<div class="row mt-5 gutter-x3">
			<div class="col-lg-10 title-sc-home col-12 mb-3">
				<h2 class="h2-home">Blog da Prime</h2>
				<span class="sub-title"><span></span> Entenda mais. Decida melhor</span>
			</div>

			<div class="col-lg-3 col-sm-6 col-12 my-4">
				<a href="" class="card-imovel card-blog">
					<figure>
						<img data-src="<?php echo base_url(); ?>assets/site/img/a1.jpg" class="lazy lazy-cover" alt="Titulo">
					</figure>

					<small class="flag">Estética</small>

					<h3>Titulo do post em até 2 linhas titulo do post em até 2 linhas titulo do post em até 2 linha.</h3>

					<span class="bt-seta">Continuar lendo <svg fill="#000" width="14" height="14" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg"><path d="M200,64V168a8,8,0,0,1-16,0V83.314L69.65674,197.65723a8.00018,8.00018,0,0,1-11.31348-11.31446L172.686,72H88a8,8,0,0,1,0-16H192A8.00039,8.00039,0,0,1,200,64Z"/></svg></span>
				</a>
			</div>

			<div class="col-lg-3 col-sm-6 col-12 my-4">
				<a href="" class="card-imovel card-blog">
					<figure>
						<img data-src="<?php echo base_url(); ?>assets/site/img/a1.jpg" class="lazy lazy-cover" alt="Titulo">
					</figure>

					<small class="flag">Infraestrutura</small>

					<h3>Titulo do post em até 2 linhas titulo do post em até 2 linhas titulo do post em até 2 linha.</h3>

					<span class="bt-seta">Continuar lendo <svg fill="#000" width="14" height="14" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg"><path d="M200,64V168a8,8,0,0,1-16,0V83.314L69.65674,197.65723a8.00018,8.00018,0,0,1-11.31348-11.31446L172.686,72H88a8,8,0,0,1,0-16H192A8.00039,8.00039,0,0,1,200,64Z"/></svg></span>
				</a>
			</div>

			<div class="col-lg-3 col-sm-6 col-12 my-4">
				<a href="" class="card-imovel card-blog">
					<figure>
						<img data-src="<?php echo base_url(); ?>assets/site/img/a1.jpg" class="lazy lazy-cover" alt="Titulo">
					</figure>

					<small class="flag">Segurança</small>

					<h3>Titulo do post em até 2 linhas titulo do post em até 2 linhas titulo do post em até 2 linha.</h3>

					<span class="bt-seta">Continuar lendo <svg fill="#000" width="14" height="14" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg"><path d="M200,64V168a8,8,0,0,1-16,0V83.314L69.65674,197.65723a8.00018,8.00018,0,0,1-11.31348-11.31446L172.686,72H88a8,8,0,0,1,0-16H192A8.00039,8.00039,0,0,1,200,64Z"/></svg></span>
				</a>
			</div>

			<div class="col-lg-3 col-sm-6 col-12 my-4">
				<a href="" class="card-imovel card-blog">
					<figure>
						<img data-src="<?php echo base_url(); ?>assets/site/img/a1.jpg" class="lazy lazy-cover" alt="Titulo">
					</figure>

					<small class="flag">Categoria</small>

					<h3>Titulo do post em até 2 linhas titulo do post em até 2 linhas titulo do post em até 2 linha.</h3>

					<span class="bt-seta">Continuar lendo <svg fill="#000" width="14" height="14" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg"><path d="M200,64V168a8,8,0,0,1-16,0V83.314L69.65674,197.65723a8.00018,8.00018,0,0,1-11.31348-11.31446L172.686,72H88a8,8,0,0,1,0-16H192A8.00039,8.00039,0,0,1,200,64Z"/></svg></span>
				</a>
			</div>

			<div class="col-12 my-4"><hr class="line"></div>
		</div>

		<div class="row gutter-x3">
			<div class="col-lg-10 title-sc-home col-12 mb-3">
				<h2 class="h2-home">Como podemos te ajudar?</h2>
			</div>

			<div class="col-lg-4 col-sm-6 col-12 my-3">
				<a href="" class="card-ajuda">
					<span class="title">
						<h3><svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 8.5H10.5M13.75 14H17.25M13.75 16.5H17.25M6.75 15.25H10.75M8.75 17.25V13.25M14.1001 7L16.9285 9.82843M14.1001 9.82861L16.9285 7.00019M6 4H18C19.1046 4 20 4.89543 20 6V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4Z" stroke="#eebf60" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg> Financiamentos</h3>
						<span class="seta-circle">
							<svg fill="#fff" width="15" height="15" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg"><path d="M200,64V168a8,8,0,0,1-16,0V83.314L69.65674,197.65723a8.00018,8.00018,0,0,1-11.31348-11.31446L172.686,72H88a8,8,0,0,1,0-16H192A8.00039,8.00039,0,0,1,200,64Z"/></svg>
						</span>
					</span>
					<p>
						Facilitamos o acesso ao crédito imobiliário com as melhores taxas e menos burocracia. Cuidamos de tudo — da simulação à aprovação, para que você conquiste seu imóvel com segurança.
					</p>
				</a>
			</div>

			<div class="col-lg-4 col-sm-6 col-12 my-3">
				<a href="" class="card-ajuda">
					<span class="title">
						<h3><svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 8.5H10.5M13.75 14H17.25M13.75 16.5H17.25M6.75 15.25H10.75M8.75 17.25V13.25M14.1001 7L16.9285 9.82843M14.1001 9.82861L16.9285 7.00019M6 4H18C19.1046 4 20 4.89543 20 6V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4Z" stroke="#eebf60" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg> Consórcio</h3>
						<span class="seta-circle">
							<svg fill="#fff" width="15" height="15" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg"><path d="M200,64V168a8,8,0,0,1-16,0V83.314L69.65674,197.65723a8.00018,8.00018,0,0,1-11.31348-11.31446L172.686,72H88a8,8,0,0,1,0-16H192A8.00039,8.00039,0,0,1,200,64Z"/></svg>
						</span>
					</span>
					<p>
						Sem entrada, sem juros. O consórcio imobiliário é uma forma estratégica e planejada de comprar seu imóvel ou levantar capital com tranquilidade e autonomia.
					</p>
				</a>
			</div>

			<div class="col-lg-4 col-sm-6 col-12 my-3">
				<a href="" class="card-ajuda">
					<span class="title">
						<h3><svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 8.5H10.5M13.75 14H17.25M13.75 16.5H17.25M6.75 15.25H10.75M8.75 17.25V13.25M14.1001 7L16.9285 9.82843M14.1001 9.82861L16.9285 7.00019M6 4H18C19.1046 4 20 4.89543 20 6V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4Z" stroke="#eebf60" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg> Regularização de imóvel</h3>
						<span class="seta-circle">
							<svg fill="#fff" width="15" height="15" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg"><path d="M200,64V168a8,8,0,0,1-16,0V83.314L69.65674,197.65723a8.00018,8.00018,0,0,1-11.31348-11.31446L172.686,72H88a8,8,0,0,1,0-16H192A8.00039,8.00039,0,0,1,200,64Z"/></svg>
						</span>
					</span>
					<p>
						Esqueça dores de cabeça. Regularizamos sua documentação imobiliária para que você venda, alugue ou financie seu imóvel com segurança e dentro da lei.
					</p>
				</a>
			</div>

			<div class="col-lg-4 col-sm-6 col-12 my-3">
				<a href="" class="card-ajuda">
					<span class="title">
						<h3><svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 8.5H10.5M13.75 14H17.25M13.75 16.5H17.25M6.75 15.25H10.75M8.75 17.25V13.25M14.1001 7L16.9285 9.82843M14.1001 9.82861L16.9285 7.00019M6 4H18C19.1046 4 20 4.89543 20 6V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4Z" stroke="#eebf60" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg> Investimentos imobiliários</h3>
						<span class="seta-circle">
							<svg fill="#fff" width="15" height="15" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg"><path d="M200,64V168a8,8,0,0,1-16,0V83.314L69.65674,197.65723a8.00018,8.00018,0,0,1-11.31348-11.31446L172.686,72H88a8,8,0,0,1,0-16H192A8.00039,8.00039,0,0,1,200,64Z"/></svg>
						</span>
					</span>
					<p>
						Identificamos as melhores oportunidades de investimento em São Paulo, Alphaville e Sul Fluminense. Gere renda passiva e construa patrimônio com segurança e estratégia.
					</p>
				</a>
			</div>

			<div class="col-lg-4 col-sm-6 col-12 my-3">
				<a href="" class="card-ajuda">
					<span class="title">
						<h3><svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 8.5H10.5M13.75 14H17.25M13.75 16.5H17.25M6.75 15.25H10.75M8.75 17.25V13.25M14.1001 7L16.9285 9.82843M14.1001 9.82861L16.9285 7.00019M6 4H18C19.1046 4 20 4.89543 20 6V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4Z" stroke="#eebf60" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg> Avaliar imóvel grátis</h3>
						<span class="seta-circle">
							<svg fill="#fff" width="15" height="15" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg"><path d="M200,64V168a8,8,0,0,1-16,0V83.314L69.65674,197.65723a8.00018,8.00018,0,0,1-11.31348-11.31446L172.686,72H88a8,8,0,0,1,0-16H192A8.00039,8.00039,0,0,1,200,64Z"/></svg>
						</span>
					</span>
					<p>
						Use nossa ferramenta com inteligência artificial e descubra na hora o valor atualizado do seu imóvel. Ideal para quem quer vender, alugar ou apenas acompanhar o mercado.
					</p>
				</a>
			</div>

			<div class="col-lg-4 col-sm-6 col-12 my-3">
				<a href="" class="card-ajuda">
					<span class="title">
						<h3><svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 8.5H10.5M13.75 14H17.25M13.75 16.5H17.25M6.75 15.25H10.75M8.75 17.25V13.25M14.1001 7L16.9285 9.82843M14.1001 9.82861L16.9285 7.00019M6 4H18C19.1046 4 20 4.89543 20 6V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4Z" stroke="#eebf60" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg> Locação temporada</h3>
						<span class="seta-circle">
							<svg fill="#fff" width="15" height="15" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg"><path d="M200,64V168a8,8,0,0,1-16,0V83.314L69.65674,197.65723a8.00018,8.00018,0,0,1-11.31348-11.31446L172.686,72H88a8,8,0,0,1,0-16H192A8.00039,8.00039,0,0,1,200,64Z"/></svg>
						</span>
					</span>
					<p>
						Ganhe mais com seu imóvel no modelo short stay. Cuidamos da gestão completa para você lucrar com Airbnb e Booking, sem precisar se preocupar com operação ou hóspedes.
					</p>
				</a>
			</div>
		</div>

		<?php if( $links_maisbuscados->getNumRows() > 0 ){ ?>
		<div class="row gutter-x3 mt-5">
			<div class="title-sc-home col-12">
				<h2 class="h2-home">Imóveis mais buscados</h2>
			</div>
			<?php
			/*
			<div class="col-lg-2 col-12 text-right text-left-mobile mt-3 my-lg-auto">
				<a href="<?php echo base_url(); ?>busca/comprar/1/" title="Buscar Imóveis" class="bt-seta no-border">Buscar imóveis <?php include caminho_fisico()."assets/site/img/seta_up.svg"; ?></a>
			</div>
			*/
			?>

			<ul class="col-12 mais-buscados mt-4 pt-3">
				<?php foreach( $links_maisbuscados->getResult() as $reg ){ ?>
				<li><a href="<?php echo $reg->url; ?>" title="<?php echo $reg->titulo; ?>"><?php echo $reg->titulo; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>

		<?php if( $bairros_maisbuscados->getNumRows() > 0 ){ ?>
		<div class="row gutter-x3 mt-5">
			<div class="title-sc-home col-12 mt-3">
				<h2 class="h2-home">Bairros mais populares</h2>
			</div>
			<?php
			/*
			<div class="col-lg-2 col-12 text-right text-left-mobile mt-3 my-lg-auto">
				<a href="<?php echo base_url(); ?>busca/comprar/1/" title="Buscar Imóveis" class="bt-seta no-border">Buscar imóveis <?php include caminho_fisico()."assets/site/img/seta_up.svg"; ?></a>
			</div>
			*/
			?>

			<ul class="col-12 mais-buscados mt-4 pt-3">
				<?php foreach( $bairros_maisbuscados->getResult() as $reg ){ ?>
				<li><a href="<?php echo $reg->url; ?>" title="<?php echo $reg->titulo; ?>"><?php echo $reg->titulo; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>

		<?php if( $condominios_populares->getNumRows() > 0 ){ ?>
		<div class="row gutter-x3 mt-5">
			<div class="title-sc-home col-12 mt-3">
				<h2 class="h2-home">Condomínios mais populares</h2>
			</div>
			<?php
			/*
			<div class="col-lg-2 col-12 text-right text-left-mobile mt-3 my-lg-auto">
				<a href="" class="bt-seta no-border">Buscar imóveis <svg fill="#000000" width="14" height="14" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg"><path d="M200,64V168a8,8,0,0,1-16,0V83.314L69.65674,197.65723a8.00018,8.00018,0,0,1-11.31348-11.31446L172.686,72H88a8,8,0,0,1,0-16H192A8.00039,8.00039,0,0,1,200,64Z"/></svg></a>
			</div>
			*/
			?>

			<ul class="col-12 mais-buscados mt-4 pt-3">
				<?php foreach( $condominios_populares->getResult() as $reg ){ ?>
				<li><a href="<?php echo base_url(); ?>busca/comprar/condominio/<?php echo $reg->codigo; ?>/1/" title="<?php echo $reg->empreendimento; ?>"><?php echo $reg->empreendimento; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>

		<div class="row gutter-x3">
			<div class="col-12 mt-5"><hr class="line"></div>
			<div class="col-lg-10 title-sc-home col-12 mb-4 mt-4">
				<h2 class="h2-home">Perguntas frequentes</h2>
				<p class="mt-0 w-100">Aqui você encontra respostas diretas sobre a FR Prime, o mercado imobiliário e como comprar, alugar ou investir com segurança.</p>
			</div>

			<div class="col-lg-4 col-md-6 col-12 mt-4 faqs">
				<h3><svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11 20H21V10C21 8.89543 20.1046 8 19 8H15M11 16H11.01M17 16H17.01M7 16H7.01M11 12H11.01M17 12H17.01M7 12H7.01M11 8H11.01M7 8H7.01M15 20V6C15 4.89543 14.1046 4 13 4H5C3.89543 4 3 4.89543 3 6V20H15Z" stroke="#eebf60" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg> Sobre a FR Prime</h3>

				<ul class="card-acordion">
					<li>
						<h4>Quais tipos de imóveis a FR Prime trabalha?</h4>
						<p class="acordion-texto">Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Sequi, voluptate magnam facilis dolore magni. Dolorem cumque id explicabo fugiat eum assumenda error. Temporibus aperiam labore adipisci dignissimos sint voluptatibus harum. Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Reprehenderit, adipisci? Consectetur error deleniti sit eius quaerat? Dolore aliquid, vero quaerat fuga ut nulla, unde? Cum quibusdam nulla praesentium tempore molestiae.</p>
					</li>
					<li>
						<h4>Quais tipos de imóveis a FR Prime trabalha?</h4>
						<p class="acordion-texto">Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Sequi, voluptate magnam facilis dolore magni. Dolorem cumque id explicabo fugiat eum assumenda error. Temporibus aperiam labore adipisci dignissimos sint voluptatibus harum. Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Reprehenderit, adipisci? Consectetur error deleniti sit eius quaerat? Dolore aliquid, vero quaerat fuga ut nulla, unde? Cum quibusdam nulla praesentium tempore molestiae.</p>
					</li>
					<li>
						<h4>Quais tipos de imóveis a FR Prime trabalha?</h4>
						<p class="acordion-texto">Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Sequi, voluptate magnam facilis dolore magni. Dolorem cumque id explicabo fugiat eum assumenda error. Temporibus aperiam labore adipisci dignissimos sint voluptatibus harum. Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Reprehenderit, adipisci? Consectetur error deleniti sit eius quaerat? Dolore aliquid, vero quaerat fuga ut nulla, unde? Cum quibusdam nulla praesentium tempore molestiae.</p>
					</li>
				</ul>
			</div>

			<div class="col-lg-4 col-md-6 col-12 mt-4 faqs">
				<h3><svg width="25" height="25" fill="#eebf60" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M31.772 16.043l-15.012-15.724c-0.189-0.197-0.449-0.307-0.721-0.307s-0.533 0.111-0.722 0.307l-15.089 15.724c-0.383 0.398-0.369 1.031 0.029 1.414 0.399 0.382 1.031 0.371 1.414-0.029l1.344-1.401v14.963c0 0.552 0.448 1 1 1h6.986c0.551 0 0.998-0.445 1-0.997l0.031-9.989h7.969v9.986c0 0.552 0.448 1 1 1h6.983c0.552 0 1-0.448 1-1v-14.968l1.343 1.407c0.197 0.204 0.459 0.308 0.722 0.308 0.249 0 0.499-0.092 0.692-0.279 0.398-0.382 0.411-1.015 0.029-1.413zM26.985 14.213v15.776h-4.983v-9.986c0-0.552-0.448-1-1-1h-9.965c-0.551 0-0.998 0.445-1 0.997l-0.031 9.989h-4.989v-15.777c0-0.082-0.013-0.162-0.032-0.239l11.055-11.52 10.982 11.507c-0.021 0.081-0.036 0.165-0.036 0.252z"></path></svg> Comprar um imóvel</h3>

				<ul class="card-acordion">
					<li>
						<h4>Quais tipos de imóveis a FR Prime trabalha?</h4>
						<p class="acordion-texto">Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Sequi, voluptate magnam facilis dolore magni. Dolorem cumque id explicabo fugiat eum assumenda error. Temporibus aperiam labore adipisci dignissimos sint voluptatibus harum. Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Reprehenderit, adipisci? Consectetur error deleniti sit eius quaerat? Dolore aliquid, vero quaerat fuga ut nulla, unde? Cum quibusdam nulla praesentium tempore molestiae.</p>
					</li>
					<li>
						<h4>Quais tipos de imóveis a FR Prime trabalha?</h4>
						<p class="acordion-texto">Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Sequi, voluptate magnam facilis dolore magni. Dolorem cumque id explicabo fugiat eum assumenda error. Temporibus aperiam labore adipisci dignissimos sint voluptatibus harum. Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Reprehenderit, adipisci? Consectetur error deleniti sit eius quaerat? Dolore aliquid, vero quaerat fuga ut nulla, unde? Cum quibusdam nulla praesentium tempore molestiae.</p>
					</li>
					<li>
						<h4>Quais tipos de imóveis a FR Prime trabalha?</h4>
						<p class="acordion-texto">Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Sequi, voluptate magnam facilis dolore magni. Dolorem cumque id explicabo fugiat eum assumenda error. Temporibus aperiam labore adipisci dignissimos sint voluptatibus harum. Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Reprehenderit, adipisci? Consectetur error deleniti sit eius quaerat? Dolore aliquid, vero quaerat fuga ut nulla, unde? Cum quibusdam nulla praesentium tempore molestiae.</p>
					</li>
				</ul>
			</div>

			<div class="col-lg-4 col-md-6 col-12 mt-4 faqs">
				<h3><svg fill="#eebf60" height="25" width="25" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 481 481" xml:space="preserve"><g><g><path d="M256.7,301.9h-27.5c-10,0-18.1-8.1-18.1-18.1s8.1-18.1,18.1-18.1h48.4c6.6,0,12-5.4,12-12c0-6.6-5.4-12-12-12h-22.7V225 c0-6.6-5.4-12-12-12s-12,5.4-12,12v16.7h-1.7c-23.2,0-42.1,18.9-42.1,42.1s18.9,42.1,42.1,42.1h27.5c10,0,18.1,8.1,18.1,18.1 s-8.1,18.1-18.1,18.1h-49.3c-6.6,0-12,5.4-12,12c0,6.6,5.4,12,12,12H231v17.1c0,6.6,5.4,12,12,12c6.6,0,12-5.4,12-12v-17.1h2 c0.1,0,0.2,0,0.3,0c23-0.3,41.5-19.1,41.5-42.1C298.8,320.8,279.9,301.9,256.7,301.9z"/><path d="M423.3,274.7c-12.6-29-30-57.1-52-83.4c-26.6-32-53.1-53.4-66.6-63.3l51-94.6c2.5-4.7,1.7-10.5-2.2-14.2 C340.3,6.3,326.3,0,310.7,0c-14.3,0-27.4,5.4-38.8,10.2c-9,3.7-17.5,7.3-24.4,7.3c-2.1,0-3.9-0.3-5.7-1C218,7.8,199.7,2.4,182,2.4 c-22.4,0-41.5,9-60.2,28.2c-3.9,4-4.5,10.3-1.4,15l55,83.1c-13.6,10.1-39.6,31.3-65.7,62.6c-21.9,26.3-39.4,54.4-52,83.4 c-15.8,36.5-23.8,74.6-23.8,113.2c0,51.3,41.8,93.1,93.1,93.1h227c51.3,0,93.1-41.8,93.1-93.1 C447.1,349.3,439.1,311.2,423.3,274.7z M146,40.6c11.6-10,22.7-14.4,36-14.4c14.2,0,30.2,4.8,51.5,12.7c4.4,1.6,9.1,2.4,13.9,2.4 c11.7,0,22.9-4.6,33.6-9.1c10.3-4.3,20.1-8.4,29.6-8.4c4.6,0,11.1,0.8,19.3,6.6l-48,89.2h-83.6L146,40.6z M354,457H127 c-38.1,0-69.1-31-69.1-69.1c0-64.1,23.5-124.9,69.7-180.7c29.2-35.3,58.9-57.2,67.9-63.6h89.8c9.1,6.3,38.7,28.3,67.9,63.6 c46.3,55.8,69.7,116.5,69.7,180.7C423.1,426,392.1,457,354,457z"/></g></g></svg> Sobre o Mercado Imobiliário</h3>

				<ul class="card-acordion">
					<li>
						<h4>Quais tipos de imóveis a FR Prime trabalha?</h4>
						<p class="acordion-texto">Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Sequi, voluptate magnam facilis dolore magni. Dolorem cumque id explicabo fugiat eum assumenda error. Temporibus aperiam labore adipisci dignissimos sint voluptatibus harum. Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Reprehenderit, adipisci? Consectetur error deleniti sit eius quaerat? Dolore aliquid, vero quaerat fuga ut nulla, unde? Cum quibusdam nulla praesentium tempore molestiae.</p>
					</li>
					<li>
						<h4>Quais tipos de imóveis a FR Prime trabalha?</h4>
						<p class="acordion-texto">Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Sequi, voluptate magnam facilis dolore magni. Dolorem cumque id explicabo fugiat eum assumenda error. Temporibus aperiam labore adipisci dignissimos sint voluptatibus harum. Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Reprehenderit, adipisci? Consectetur error deleniti sit eius quaerat? Dolore aliquid, vero quaerat fuga ut nulla, unde? Cum quibusdam nulla praesentium tempore molestiae.</p>
					</li>
					<li>
						<h4>Quais tipos de imóveis a FR Prime trabalha?</h4>
						<p class="acordion-texto">Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Sequi, voluptate magnam facilis dolore magni. Dolorem cumque id explicabo fugiat eum assumenda error. Temporibus aperiam labore adipisci dignissimos sint voluptatibus harum. Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Reprehenderit, adipisci? Consectetur error deleniti sit eius quaerat? Dolore aliquid, vero quaerat fuga ut nulla, unde? Cum quibusdam nulla praesentium tempore molestiae.</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<?php echo view('site/inc/rodape'); ?>