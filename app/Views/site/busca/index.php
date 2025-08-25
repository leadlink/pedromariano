<?php echo view('site/inc/head'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    <?php echo view('site/inc/topo'); ?>
    <!-- ################################ -->
    <!-- ################################ -->
    <section class="fleft100 busca-interna">
		<div class="container">
			<ul class="cols-busca">
				<li class="drop-small">
					<select name="modo" id="modo">
						<option value="Comprar">Comprar</option>
						<option value="Alugar">Alugar</option>
					</select>
				</li>
				<li>
					<a href="javascript:void(0):" class="btn" data-bs-toggle="modal" data-bs-target="#tipo">
						<span class="multiselect">
							<span class="s">
								<small id="count-tipos" class="se">Tipo</small>
							</span>
						</span>
					</a>
				</li>
				<li>
					<a href="javascript:void(0):" class="btn" data-bs-toggle="modal" data-bs-target="#bairro">
						<span class="multiselect">
							<span class="s">
								<small id="count-bairros" class="se">Localização</small>
							</span>
						</span>
					</a>
				</li>
				<li>
					<div class="dropdown">
						<a href="#" class="btn" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
							<span class="multiselect">
								<span class="s">
									<small id="count-bairros" class="se">Valor</small>
								</span>
							</span>
						</a>
						<div class="dropdown-menu drop-valor" aria-labelledby="dropdownMenuLink">
							<select name="valor_de">
								<option value="R$ 100.000">R$ 100.000</option>
								<option value="R$ 200.000">R$ 200.000</option>
								<option value="R$ 300.000">R$ 300.000</option>
								<option value="R$ 400.000">R$ 400.000</option>
								<option value="R$ 500.000">R$ 500.000</option>
								<option value="R$ 600.000">R$ 600.000</option>
								<option value="R$ 700.000">R$ 700.000</option>
								<option value="R$ 800.000">R$ 800.000</option>
							</select>
							<select name="valor_ate">
								<option value="R$ 100.000">R$ 100.000</option>
								<option value="R$ 200.000">R$ 200.000</option>
								<option value="R$ 300.000">R$ 300.000</option>
								<option value="R$ 400.000">R$ 400.000</option>
								<option value="R$ 500.000">R$ 500.000</option>
								<option value="R$ 600.000">R$ 600.000</option>
								<option value="R$ 700.000">R$ 700.000</option>
								<option value="R$ 800.000">R$ 800.000</option>
							</select>

							<span class="xdrop">OK</span>
						</div>
					</div>	
				</li>
				<li class="drop-small">
					<select name="quartos" id="quartos" size="2">
						<option value="1+">1+ quartos</option>
						<option value="2+">2+ quartos</option>
						<option value="3+">3+ quartos</option>
						<option value="4+">4+ quartos</option>
					</select>
				</li>
				<li>
					<label class="form-check form-switch" for="lancamento">
						<span class="form-check-label">Lançamentos</span>
						<input class="form-check-input" type="checkbox" id="lancamento">
					</label>
				</li>
				<li>
					<label class="form-check form-switch" for="permuta">
						<span class="form-check-label">Permuta</span>
						<input class="form-check-input" type="checkbox" id="permuta">
					</label>
				</li>
				<li class="code">
					<label>
						<input type="text" placeholder="Código">
						<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="12" height="12" viewBox="0 0 22.559 22.537" enable-background="new 0 0 22.559 22.537" xml:space="preserve"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.611,15.949c-4.224,3.12-9.501,2.154-12.319-1.24 c-2.895-3.489-2.715-8.477,0.416-11.794c2.98-3.157,8.063-3.571,11.588-0.994c3.507,2.563,5.066,8.042,1.725,12.639 c0.764,0.742,1.545,1.491,2.313,2.251c1.148,1.138,2.288,2.283,3.43,3.427c0.647,0.648,0.734,1.252,0.256,1.744 c-0.48,0.493-1.103,0.417-1.742-0.221c-1.729-1.728-3.458-3.454-5.181-5.188C14.918,16.391,14.781,16.169,14.611,15.949z M9.047,15.724c3.71,0.005,6.688-2.945,6.698-6.637c0.01-3.721-2.971-6.743-6.666-6.759C5.441,2.313,2.37,5.356,2.35,8.996 C2.329,12.688,5.345,15.718,9.047,15.724z"/></svg>
					</label>
				</li>
				<li>
					<a data-bs-toggle="collapse" href="#maisfiltros" role="button" aria-expanded="false" aria-controls="maisfiltros"><svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 5L10 5M10 5C10 6.10457 10.8954 7 12 7C13.1046 7 14 6.10457 14 5M10 5C10 3.89543 10.8954 3 12 3C13.1046 3 14 3.89543 14 5M14 5L20 5M4 12L16 12M16 12C16 13.1046 16.8954 14 18 14C19.1046 14 20 13.1046 20 12C20 10.8954 19.1046 10 18 10C16.8954 10 16 10.8954 16 12ZM8 19L20 19M8 19C8 17.8954 7.10457 17 6 17C4.89543 17 4 17.8954 4 19C4 20.1046 4.89543 21 6 21C7.10457 21 8 20.1046 8 19Z" stroke="#3b3b3b" stroke-width="1" stroke-linecap="round"/></svg></a>
				</li>
			</ul>

			<ul class="cols-busca collapse mt-3" id="maisfiltros">
				<li class="drop-small">
					<select name="area" id="area" size="2">
						<option value="100 m²">100 m²</option>
						<option value="200 m²">200 m²</option>
						<option value="300 m²">300 m²</option>
						<option value="400 m²">400 m²</option>
					</select>
				</li>
				<li class="checks-busca no-border">
					<span class="title">Suítes</span>
					<ul class="check-radio check-quartos">
						<li>
							<input type="radio" id="q1" name="quartos" value="q1">
							<label for="q1">1+</label>
						</li>
						<li>
							<input type="radio" id="q2" name="quartos" value="q2">
							<label for="q2">2+</label>
						</li>
						<li>
							<input type="radio" id="q3" name="quartos" value="q3">
							<label for="q3">3+</label>
						</li>
					</ul>
				</li>
				<li class="checks-busca">
					<span class="title">Vagas</span>
					<ul class="check-radio check-quartos">
						<li>
							<input type="radio" id="q1" name="quartos" value="q1">
							<label for="q1">1+</label>
						</li>
						<li>
							<input type="radio" id="q2" name="quartos" value="q2">
							<label for="q2">2+</label>
						</li>
						<li>
							<input type="radio" id="q3" name="quartos" value="q3">
							<label for="q3">3+</label>
						</li>
					</ul>
				</li>
				<li>
					<select name="infra" id="infra" size="2">
						<option value="100 m²">100 m²</option>
						<option value="200 m²">200 m²</option>
						<option value="300 m²">300 m²</option>
						<option value="400 m²">400 m²</option>
						<option value="100 m²">100 m²</option>
						<option value="200 m²">200 m²</option>
						<option value="300 m²">300 m²</option>
						<option value="400 m²">400 m²</option>
						<option value="100 m²">100 m²</option>
						<option value="200 m²">200 m²</option>
						<option value="300 m²">300 m²</option>
						<option value="400 m²">400 m²</option>
					</select>
				</li>
				<li class="code code-emp">
					<label>
						<input type="text" placeholder="Digite o nome do empreendimento">
						<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="12" height="12" viewBox="0 0 22.559 22.537" enable-background="new 0 0 22.559 22.537" xml:space="preserve"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.611,15.949c-4.224,3.12-9.501,2.154-12.319-1.24 c-2.895-3.489-2.715-8.477,0.416-11.794c2.98-3.157,8.063-3.571,11.588-0.994c3.507,2.563,5.066,8.042,1.725,12.639 c0.764,0.742,1.545,1.491,2.313,2.251c1.148,1.138,2.288,2.283,3.43,3.427c0.647,0.648,0.734,1.252,0.256,1.744 c-0.48,0.493-1.103,0.417-1.742-0.221c-1.729-1.728-3.458-3.454-5.181-5.188C14.918,16.391,14.781,16.169,14.611,15.949z M9.047,15.724c3.71,0.005,6.688-2.945,6.698-6.637c0.01-3.721-2.971-6.743-6.666-6.759C5.441,2.313,2.37,5.356,2.35,8.996 C2.329,12.688,5.345,15.718,9.047,15.724z"/></svg>
					</label>
				</li>
			</ul>
		</div>
	</section>

	<section class="fleft100 resultados">
		<div class="container">
			<div class="row">
				<div class="col-12 order-title mb-3">
					<h1>135 imóveis à venda em <strong>São Bernardo do Campo</strong></h1>
					<div class="selct-order">
						<span class="title">Ordenar: </span>
						<select name="order" id="order">
							<option value="mais recentes">mais recentes</option>
							<option value="mais procurados">mais procurados</option>
						</select>
					</div>
					<label class="form-check form-switch" for="mapa">
						<span class="form-check-label">Mostrar mapa</span>
						<input class="form-check-input" type="checkbox" id="mapa">
					</label>
				</div>
			</div>

			<div class="row gutter-x2">
				<div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3">
					<figure class="banner-inteligente"><a href=""><img src="<?php echo base_url(); ?>assets/site/img/banner-inteligente.jpg" class="lazy-cover radius-12" alt="Banner Inteligente"></a></figure>
				</div>

				<div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3 box-imovel">
					<a href="" class="fav">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.62436 4.4241C3.96537 5.18243 2.75 6.98614 2.75 9.13701C2.75 11.3344 3.64922 13.0281 4.93829 14.4797C6.00072 15.676 7.28684 16.6675 8.54113 17.6345C8.83904 17.8642 9.13515 18.0925 9.42605 18.3218C9.95208 18.7365 10.4213 19.1004 10.8736 19.3647C11.3261 19.6292 11.6904 19.7499 12 19.7499C12.3096 19.7499 12.6739 19.6292 13.1264 19.3647C13.5787 19.1004 14.0479 18.7365 14.574 18.3218C14.8649 18.0925 15.161 17.8642 15.4589 17.6345C16.7132 16.6675 17.9993 15.676 19.0617 14.4797C20.3508 13.0281 21.25 11.3344 21.25 9.13701C21.25 6.98614 20.0346 5.18243 18.3756 4.4241C16.7639 3.68739 14.5983 3.88249 12.5404 6.02065C12.399 6.16754 12.2039 6.25054 12 6.25054C11.7961 6.25054 11.601 6.16754 11.4596 6.02065C9.40166 3.88249 7.23607 3.68739 5.62436 4.4241ZM12 4.45873C9.68795 2.39015 7.09896 2.10078 5.00076 3.05987C2.78471 4.07283 1.25 6.42494 1.25 9.13701C1.25 11.8025 2.3605 13.836 3.81672 15.4757C4.98287 16.7888 6.41022 17.8879 7.67083 18.8585C7.95659 19.0785 8.23378 19.292 8.49742 19.4998C9.00965 19.9036 9.55954 20.3342 10.1168 20.6598C10.6739 20.9853 11.3096 21.2499 12 21.2499C12.6904 21.2499 13.3261 20.9853 13.8832 20.6598C14.4405 20.3342 14.9903 19.9036 15.5026 19.4998C15.7662 19.292 16.0434 19.0785 16.3292 18.8585C17.5898 17.8879 19.0171 16.7888 20.1833 15.4757C21.6395 13.836 22.75 11.8025 22.75 9.13701C22.75 6.42494 21.2153 4.07283 18.9992 3.05987C16.901 2.10078 14.3121 2.39015 12 4.45873Z" fill="#202020"/></svg>
					</a>
					<a href="" class="card-imovel">
						<figure>
							<img data-src="<?php echo base_url(); ?>assets/site/img/imovel.jpg" class="lazy lazy-cover" alt="Titulo">
							<small class="flag">Cód. 564622</small>
						</figure>

						<span class="imovel-text">
							<h3><strong>Nova Petrópolis</strong> <span>São Bernardo do Campo</span></h3>

							<ul>
								<li>
									<svg fill="#202020" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,12.184V4a1,1,0,0,0-2,0V5H5V4A1,1,0,0,0,3,4v8.184A3,3,0,0,0,1,15v5a1,1,0,0,0,2,0V19H21v1a1,1,0,0,0,2,0V15A3,3,0,0,0,21,12.184ZM19,12H18V10a1,1,0,0,0-1-1H7a1,1,0,0,0-1,1v2H5V7H19ZM8,12V11h3v1Zm5-1h3v1H13ZM3,15a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1v2H3Z"/></svg>
									<span>3 quartos</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5605 6.75L23.0305 4.28C23.1002 4.21044 23.1555 4.12782 23.1932 4.03688C23.2309 3.94593 23.2503 3.84845 23.2503 3.75C23.2503 3.65155 23.2309 3.55407 23.1932 3.46312C23.1555 3.37218 23.1002 3.28956 23.0305 3.22L20.6709 0.860352" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.75 23.25V5.25C3.75 4.85218 3.90804 4.47064 4.18934 4.18934C4.47064 3.90804 4.85218 3.75 5.25 3.75C5.25 3.75 16.7311 3.75 23 3.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M0.75 20.561L3.22 23.03C3.28965 23.0997 3.37235 23.155 3.46338 23.1927C3.5544 23.2304 3.65197 23.2498 3.7505 23.2498C3.84903 23.2498 3.9466 23.2304 4.03762 23.1927C4.12865 23.155 4.21135 23.0997 4.281 23.03L6.75 20.56" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.75 23.25C22.1478 23.25 22.5294 23.092 22.8107 22.8107C23.092 22.5294 23.25 22.1478 23.25 21.75" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.75 23.25H17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.25 23.25H12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.75 23.25H8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 18.75V17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 14.25V12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 9.75V8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>165m²</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>2 vagas</span>
								</li>
							</ul>

							<span class="va-code">
								<span class="va">R$ 2.650.000</span>
								<span class="code">Detalhes <svg fill="#f27321" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.2928932,7 L11.5,7 C11.2238576,7 11,6.77614237 11,6.5 C11,6.22385763 11.2238576,6 11.5,6 L17.5,6 C17.7761424,6 18,6.22385763 18,6.5 L18,12.5 C18,12.7761424 17.7761424,13 17.5,13 C17.2238576,13 17,12.7761424 17,12.5 L17,7.70710678 L6.85355339,17.8535534 C6.65829124,18.0488155 6.34170876,18.0488155 6.14644661,17.8535534 C5.95118446,17.6582912 5.95118446,17.3417088 6.14644661,17.1464466 L16.2928932,7 Z"/></svg></span>
							</span>
						</span>
					</a>
				</div>

				<div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3 box-imovel">
					<a href="" class="fav">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.62436 4.4241C3.96537 5.18243 2.75 6.98614 2.75 9.13701C2.75 11.3344 3.64922 13.0281 4.93829 14.4797C6.00072 15.676 7.28684 16.6675 8.54113 17.6345C8.83904 17.8642 9.13515 18.0925 9.42605 18.3218C9.95208 18.7365 10.4213 19.1004 10.8736 19.3647C11.3261 19.6292 11.6904 19.7499 12 19.7499C12.3096 19.7499 12.6739 19.6292 13.1264 19.3647C13.5787 19.1004 14.0479 18.7365 14.574 18.3218C14.8649 18.0925 15.161 17.8642 15.4589 17.6345C16.7132 16.6675 17.9993 15.676 19.0617 14.4797C20.3508 13.0281 21.25 11.3344 21.25 9.13701C21.25 6.98614 20.0346 5.18243 18.3756 4.4241C16.7639 3.68739 14.5983 3.88249 12.5404 6.02065C12.399 6.16754 12.2039 6.25054 12 6.25054C11.7961 6.25054 11.601 6.16754 11.4596 6.02065C9.40166 3.88249 7.23607 3.68739 5.62436 4.4241ZM12 4.45873C9.68795 2.39015 7.09896 2.10078 5.00076 3.05987C2.78471 4.07283 1.25 6.42494 1.25 9.13701C1.25 11.8025 2.3605 13.836 3.81672 15.4757C4.98287 16.7888 6.41022 17.8879 7.67083 18.8585C7.95659 19.0785 8.23378 19.292 8.49742 19.4998C9.00965 19.9036 9.55954 20.3342 10.1168 20.6598C10.6739 20.9853 11.3096 21.2499 12 21.2499C12.6904 21.2499 13.3261 20.9853 13.8832 20.6598C14.4405 20.3342 14.9903 19.9036 15.5026 19.4998C15.7662 19.292 16.0434 19.0785 16.3292 18.8585C17.5898 17.8879 19.0171 16.7888 20.1833 15.4757C21.6395 13.836 22.75 11.8025 22.75 9.13701C22.75 6.42494 21.2153 4.07283 18.9992 3.05987C16.901 2.10078 14.3121 2.39015 12 4.45873Z" fill="#202020"/></svg>
					</a>
					<a href="" class="card-imovel">
						<figure>
							<img data-src="<?php echo base_url(); ?>assets/site/img/imovel.jpg" class="lazy lazy-cover" alt="Titulo">
							<small class="flag">Cód. 564622</small>
						</figure>

						<span class="imovel-text">
							<h3><strong>Nova Petrópolis</strong> <span>São Bernardo do Campo</span></h3>

							<ul>
								<li>
									<svg fill="#202020" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,12.184V4a1,1,0,0,0-2,0V5H5V4A1,1,0,0,0,3,4v8.184A3,3,0,0,0,1,15v5a1,1,0,0,0,2,0V19H21v1a1,1,0,0,0,2,0V15A3,3,0,0,0,21,12.184ZM19,12H18V10a1,1,0,0,0-1-1H7a1,1,0,0,0-1,1v2H5V7H19ZM8,12V11h3v1Zm5-1h3v1H13ZM3,15a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1v2H3Z"/></svg>
									<span>3 quartos</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5605 6.75L23.0305 4.28C23.1002 4.21044 23.1555 4.12782 23.1932 4.03688C23.2309 3.94593 23.2503 3.84845 23.2503 3.75C23.2503 3.65155 23.2309 3.55407 23.1932 3.46312C23.1555 3.37218 23.1002 3.28956 23.0305 3.22L20.6709 0.860352" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.75 23.25V5.25C3.75 4.85218 3.90804 4.47064 4.18934 4.18934C4.47064 3.90804 4.85218 3.75 5.25 3.75C5.25 3.75 16.7311 3.75 23 3.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M0.75 20.561L3.22 23.03C3.28965 23.0997 3.37235 23.155 3.46338 23.1927C3.5544 23.2304 3.65197 23.2498 3.7505 23.2498C3.84903 23.2498 3.9466 23.2304 4.03762 23.1927C4.12865 23.155 4.21135 23.0997 4.281 23.03L6.75 20.56" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.75 23.25C22.1478 23.25 22.5294 23.092 22.8107 22.8107C23.092 22.5294 23.25 22.1478 23.25 21.75" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.75 23.25H17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.25 23.25H12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.75 23.25H8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 18.75V17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 14.25V12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 9.75V8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>165m²</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>2 vagas</span>
								</li>
							</ul>

							<span class="va-code">
								<span class="va">R$ 2.650.000</span>
								<span class="code">Detalhes <svg fill="#f27321" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.2928932,7 L11.5,7 C11.2238576,7 11,6.77614237 11,6.5 C11,6.22385763 11.2238576,6 11.5,6 L17.5,6 C17.7761424,6 18,6.22385763 18,6.5 L18,12.5 C18,12.7761424 17.7761424,13 17.5,13 C17.2238576,13 17,12.7761424 17,12.5 L17,7.70710678 L6.85355339,17.8535534 C6.65829124,18.0488155 6.34170876,18.0488155 6.14644661,17.8535534 C5.95118446,17.6582912 5.95118446,17.3417088 6.14644661,17.1464466 L16.2928932,7 Z"/></svg></span>
							</span>
						</span>
					</a>
				</div>

				<div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3 box-imovel">
					<a href="" class="fav">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.62436 4.4241C3.96537 5.18243 2.75 6.98614 2.75 9.13701C2.75 11.3344 3.64922 13.0281 4.93829 14.4797C6.00072 15.676 7.28684 16.6675 8.54113 17.6345C8.83904 17.8642 9.13515 18.0925 9.42605 18.3218C9.95208 18.7365 10.4213 19.1004 10.8736 19.3647C11.3261 19.6292 11.6904 19.7499 12 19.7499C12.3096 19.7499 12.6739 19.6292 13.1264 19.3647C13.5787 19.1004 14.0479 18.7365 14.574 18.3218C14.8649 18.0925 15.161 17.8642 15.4589 17.6345C16.7132 16.6675 17.9993 15.676 19.0617 14.4797C20.3508 13.0281 21.25 11.3344 21.25 9.13701C21.25 6.98614 20.0346 5.18243 18.3756 4.4241C16.7639 3.68739 14.5983 3.88249 12.5404 6.02065C12.399 6.16754 12.2039 6.25054 12 6.25054C11.7961 6.25054 11.601 6.16754 11.4596 6.02065C9.40166 3.88249 7.23607 3.68739 5.62436 4.4241ZM12 4.45873C9.68795 2.39015 7.09896 2.10078 5.00076 3.05987C2.78471 4.07283 1.25 6.42494 1.25 9.13701C1.25 11.8025 2.3605 13.836 3.81672 15.4757C4.98287 16.7888 6.41022 17.8879 7.67083 18.8585C7.95659 19.0785 8.23378 19.292 8.49742 19.4998C9.00965 19.9036 9.55954 20.3342 10.1168 20.6598C10.6739 20.9853 11.3096 21.2499 12 21.2499C12.6904 21.2499 13.3261 20.9853 13.8832 20.6598C14.4405 20.3342 14.9903 19.9036 15.5026 19.4998C15.7662 19.292 16.0434 19.0785 16.3292 18.8585C17.5898 17.8879 19.0171 16.7888 20.1833 15.4757C21.6395 13.836 22.75 11.8025 22.75 9.13701C22.75 6.42494 21.2153 4.07283 18.9992 3.05987C16.901 2.10078 14.3121 2.39015 12 4.45873Z" fill="#202020"/></svg>
					</a>
					<a href="" class="card-imovel">
						<figure>
							<img data-src="<?php echo base_url(); ?>assets/site/img/imovel.jpg" class="lazy lazy-cover" alt="Titulo">
							<small class="flag">Cód. 564622</small>
						</figure>

						<span class="imovel-text">
							<h3><strong>Nova Petrópolis</strong> <span>São Bernardo do Campo</span></h3>

							<ul>
								<li>
									<svg fill="#202020" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,12.184V4a1,1,0,0,0-2,0V5H5V4A1,1,0,0,0,3,4v8.184A3,3,0,0,0,1,15v5a1,1,0,0,0,2,0V19H21v1a1,1,0,0,0,2,0V15A3,3,0,0,0,21,12.184ZM19,12H18V10a1,1,0,0,0-1-1H7a1,1,0,0,0-1,1v2H5V7H19ZM8,12V11h3v1Zm5-1h3v1H13ZM3,15a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1v2H3Z"/></svg>
									<span>3 quartos</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5605 6.75L23.0305 4.28C23.1002 4.21044 23.1555 4.12782 23.1932 4.03688C23.2309 3.94593 23.2503 3.84845 23.2503 3.75C23.2503 3.65155 23.2309 3.55407 23.1932 3.46312C23.1555 3.37218 23.1002 3.28956 23.0305 3.22L20.6709 0.860352" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.75 23.25V5.25C3.75 4.85218 3.90804 4.47064 4.18934 4.18934C4.47064 3.90804 4.85218 3.75 5.25 3.75C5.25 3.75 16.7311 3.75 23 3.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M0.75 20.561L3.22 23.03C3.28965 23.0997 3.37235 23.155 3.46338 23.1927C3.5544 23.2304 3.65197 23.2498 3.7505 23.2498C3.84903 23.2498 3.9466 23.2304 4.03762 23.1927C4.12865 23.155 4.21135 23.0997 4.281 23.03L6.75 20.56" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.75 23.25C22.1478 23.25 22.5294 23.092 22.8107 22.8107C23.092 22.5294 23.25 22.1478 23.25 21.75" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.75 23.25H17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.25 23.25H12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.75 23.25H8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 18.75V17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 14.25V12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 9.75V8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>165m²</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>2 vagas</span>
								</li>
							</ul>

							<span class="va-code">
								<span class="va">R$ 2.650.000</span>
								<span class="code">Detalhes <svg fill="#f27321" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.2928932,7 L11.5,7 C11.2238576,7 11,6.77614237 11,6.5 C11,6.22385763 11.2238576,6 11.5,6 L17.5,6 C17.7761424,6 18,6.22385763 18,6.5 L18,12.5 C18,12.7761424 17.7761424,13 17.5,13 C17.2238576,13 17,12.7761424 17,12.5 L17,7.70710678 L6.85355339,17.8535534 C6.65829124,18.0488155 6.34170876,18.0488155 6.14644661,17.8535534 C5.95118446,17.6582912 5.95118446,17.3417088 6.14644661,17.1464466 L16.2928932,7 Z"/></svg></span>
							</span>
						</span>
					</a>
				</div>

				<div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3 box-imovel">
					<a href="" class="fav">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.62436 4.4241C3.96537 5.18243 2.75 6.98614 2.75 9.13701C2.75 11.3344 3.64922 13.0281 4.93829 14.4797C6.00072 15.676 7.28684 16.6675 8.54113 17.6345C8.83904 17.8642 9.13515 18.0925 9.42605 18.3218C9.95208 18.7365 10.4213 19.1004 10.8736 19.3647C11.3261 19.6292 11.6904 19.7499 12 19.7499C12.3096 19.7499 12.6739 19.6292 13.1264 19.3647C13.5787 19.1004 14.0479 18.7365 14.574 18.3218C14.8649 18.0925 15.161 17.8642 15.4589 17.6345C16.7132 16.6675 17.9993 15.676 19.0617 14.4797C20.3508 13.0281 21.25 11.3344 21.25 9.13701C21.25 6.98614 20.0346 5.18243 18.3756 4.4241C16.7639 3.68739 14.5983 3.88249 12.5404 6.02065C12.399 6.16754 12.2039 6.25054 12 6.25054C11.7961 6.25054 11.601 6.16754 11.4596 6.02065C9.40166 3.88249 7.23607 3.68739 5.62436 4.4241ZM12 4.45873C9.68795 2.39015 7.09896 2.10078 5.00076 3.05987C2.78471 4.07283 1.25 6.42494 1.25 9.13701C1.25 11.8025 2.3605 13.836 3.81672 15.4757C4.98287 16.7888 6.41022 17.8879 7.67083 18.8585C7.95659 19.0785 8.23378 19.292 8.49742 19.4998C9.00965 19.9036 9.55954 20.3342 10.1168 20.6598C10.6739 20.9853 11.3096 21.2499 12 21.2499C12.6904 21.2499 13.3261 20.9853 13.8832 20.6598C14.4405 20.3342 14.9903 19.9036 15.5026 19.4998C15.7662 19.292 16.0434 19.0785 16.3292 18.8585C17.5898 17.8879 19.0171 16.7888 20.1833 15.4757C21.6395 13.836 22.75 11.8025 22.75 9.13701C22.75 6.42494 21.2153 4.07283 18.9992 3.05987C16.901 2.10078 14.3121 2.39015 12 4.45873Z" fill="#202020"/></svg>
					</a>
					<a href="" class="card-imovel">
						<figure>
							<img data-src="<?php echo base_url(); ?>assets/site/img/imovel.jpg" class="lazy lazy-cover" alt="Titulo">
							<small class="flag">Cód. 564622</small>
						</figure>

						<span class="imovel-text">
							<h3><strong>Nova Petrópolis</strong> <span>São Bernardo do Campo</span></h3>

							<ul>
								<li>
									<svg fill="#202020" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,12.184V4a1,1,0,0,0-2,0V5H5V4A1,1,0,0,0,3,4v8.184A3,3,0,0,0,1,15v5a1,1,0,0,0,2,0V19H21v1a1,1,0,0,0,2,0V15A3,3,0,0,0,21,12.184ZM19,12H18V10a1,1,0,0,0-1-1H7a1,1,0,0,0-1,1v2H5V7H19ZM8,12V11h3v1Zm5-1h3v1H13ZM3,15a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1v2H3Z"/></svg>
									<span>3 quartos</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5605 6.75L23.0305 4.28C23.1002 4.21044 23.1555 4.12782 23.1932 4.03688C23.2309 3.94593 23.2503 3.84845 23.2503 3.75C23.2503 3.65155 23.2309 3.55407 23.1932 3.46312C23.1555 3.37218 23.1002 3.28956 23.0305 3.22L20.6709 0.860352" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.75 23.25V5.25C3.75 4.85218 3.90804 4.47064 4.18934 4.18934C4.47064 3.90804 4.85218 3.75 5.25 3.75C5.25 3.75 16.7311 3.75 23 3.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M0.75 20.561L3.22 23.03C3.28965 23.0997 3.37235 23.155 3.46338 23.1927C3.5544 23.2304 3.65197 23.2498 3.7505 23.2498C3.84903 23.2498 3.9466 23.2304 4.03762 23.1927C4.12865 23.155 4.21135 23.0997 4.281 23.03L6.75 20.56" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.75 23.25C22.1478 23.25 22.5294 23.092 22.8107 22.8107C23.092 22.5294 23.25 22.1478 23.25 21.75" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.75 23.25H17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.25 23.25H12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.75 23.25H8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 18.75V17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 14.25V12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 9.75V8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>165m²</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>2 vagas</span>
								</li>
							</ul>

							<span class="va-code">
								<span class="va">R$ 2.650.000</span>
								<span class="code">Detalhes <svg fill="#f27321" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.2928932,7 L11.5,7 C11.2238576,7 11,6.77614237 11,6.5 C11,6.22385763 11.2238576,6 11.5,6 L17.5,6 C17.7761424,6 18,6.22385763 18,6.5 L18,12.5 C18,12.7761424 17.7761424,13 17.5,13 C17.2238576,13 17,12.7761424 17,12.5 L17,7.70710678 L6.85355339,17.8535534 C6.65829124,18.0488155 6.34170876,18.0488155 6.14644661,17.8535534 C5.95118446,17.6582912 5.95118446,17.3417088 6.14644661,17.1464466 L16.2928932,7 Z"/></svg></span>
							</span>
						</span>
					</a>
				</div>

				<div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3 box-imovel">
					<a href="" class="fav">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.62436 4.4241C3.96537 5.18243 2.75 6.98614 2.75 9.13701C2.75 11.3344 3.64922 13.0281 4.93829 14.4797C6.00072 15.676 7.28684 16.6675 8.54113 17.6345C8.83904 17.8642 9.13515 18.0925 9.42605 18.3218C9.95208 18.7365 10.4213 19.1004 10.8736 19.3647C11.3261 19.6292 11.6904 19.7499 12 19.7499C12.3096 19.7499 12.6739 19.6292 13.1264 19.3647C13.5787 19.1004 14.0479 18.7365 14.574 18.3218C14.8649 18.0925 15.161 17.8642 15.4589 17.6345C16.7132 16.6675 17.9993 15.676 19.0617 14.4797C20.3508 13.0281 21.25 11.3344 21.25 9.13701C21.25 6.98614 20.0346 5.18243 18.3756 4.4241C16.7639 3.68739 14.5983 3.88249 12.5404 6.02065C12.399 6.16754 12.2039 6.25054 12 6.25054C11.7961 6.25054 11.601 6.16754 11.4596 6.02065C9.40166 3.88249 7.23607 3.68739 5.62436 4.4241ZM12 4.45873C9.68795 2.39015 7.09896 2.10078 5.00076 3.05987C2.78471 4.07283 1.25 6.42494 1.25 9.13701C1.25 11.8025 2.3605 13.836 3.81672 15.4757C4.98287 16.7888 6.41022 17.8879 7.67083 18.8585C7.95659 19.0785 8.23378 19.292 8.49742 19.4998C9.00965 19.9036 9.55954 20.3342 10.1168 20.6598C10.6739 20.9853 11.3096 21.2499 12 21.2499C12.6904 21.2499 13.3261 20.9853 13.8832 20.6598C14.4405 20.3342 14.9903 19.9036 15.5026 19.4998C15.7662 19.292 16.0434 19.0785 16.3292 18.8585C17.5898 17.8879 19.0171 16.7888 20.1833 15.4757C21.6395 13.836 22.75 11.8025 22.75 9.13701C22.75 6.42494 21.2153 4.07283 18.9992 3.05987C16.901 2.10078 14.3121 2.39015 12 4.45873Z" fill="#202020"/></svg>
					</a>
					<a href="" class="card-imovel">
						<figure>
							<img data-src="<?php echo base_url(); ?>assets/site/img/imovel.jpg" class="lazy lazy-cover" alt="Titulo">
							<small class="flag">Cód. 564622</small>
						</figure>

						<span class="imovel-text">
							<h3><strong>Nova Petrópolis</strong> <span>São Bernardo do Campo</span></h3>

							<ul>
								<li>
									<svg fill="#202020" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,12.184V4a1,1,0,0,0-2,0V5H5V4A1,1,0,0,0,3,4v8.184A3,3,0,0,0,1,15v5a1,1,0,0,0,2,0V19H21v1a1,1,0,0,0,2,0V15A3,3,0,0,0,21,12.184ZM19,12H18V10a1,1,0,0,0-1-1H7a1,1,0,0,0-1,1v2H5V7H19ZM8,12V11h3v1Zm5-1h3v1H13ZM3,15a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1v2H3Z"/></svg>
									<span>3 quartos</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5605 6.75L23.0305 4.28C23.1002 4.21044 23.1555 4.12782 23.1932 4.03688C23.2309 3.94593 23.2503 3.84845 23.2503 3.75C23.2503 3.65155 23.2309 3.55407 23.1932 3.46312C23.1555 3.37218 23.1002 3.28956 23.0305 3.22L20.6709 0.860352" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.75 23.25V5.25C3.75 4.85218 3.90804 4.47064 4.18934 4.18934C4.47064 3.90804 4.85218 3.75 5.25 3.75C5.25 3.75 16.7311 3.75 23 3.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M0.75 20.561L3.22 23.03C3.28965 23.0997 3.37235 23.155 3.46338 23.1927C3.5544 23.2304 3.65197 23.2498 3.7505 23.2498C3.84903 23.2498 3.9466 23.2304 4.03762 23.1927C4.12865 23.155 4.21135 23.0997 4.281 23.03L6.75 20.56" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.75 23.25C22.1478 23.25 22.5294 23.092 22.8107 22.8107C23.092 22.5294 23.25 22.1478 23.25 21.75" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.75 23.25H17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.25 23.25H12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.75 23.25H8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 18.75V17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 14.25V12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 9.75V8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>165m²</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>2 vagas</span>
								</li>
							</ul>

							<span class="va-code">
								<span class="va">R$ 2.650.000</span>
								<span class="code">Detalhes <svg fill="#f27321" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.2928932,7 L11.5,7 C11.2238576,7 11,6.77614237 11,6.5 C11,6.22385763 11.2238576,6 11.5,6 L17.5,6 C17.7761424,6 18,6.22385763 18,6.5 L18,12.5 C18,12.7761424 17.7761424,13 17.5,13 C17.2238576,13 17,12.7761424 17,12.5 L17,7.70710678 L6.85355339,17.8535534 C6.65829124,18.0488155 6.34170876,18.0488155 6.14644661,17.8535534 C5.95118446,17.6582912 5.95118446,17.3417088 6.14644661,17.1464466 L16.2928932,7 Z"/></svg></span>
							</span>
						</span>
					</a>
				</div>

				<div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3 box-imovel">
					<a href="" class="fav">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.62436 4.4241C3.96537 5.18243 2.75 6.98614 2.75 9.13701C2.75 11.3344 3.64922 13.0281 4.93829 14.4797C6.00072 15.676 7.28684 16.6675 8.54113 17.6345C8.83904 17.8642 9.13515 18.0925 9.42605 18.3218C9.95208 18.7365 10.4213 19.1004 10.8736 19.3647C11.3261 19.6292 11.6904 19.7499 12 19.7499C12.3096 19.7499 12.6739 19.6292 13.1264 19.3647C13.5787 19.1004 14.0479 18.7365 14.574 18.3218C14.8649 18.0925 15.161 17.8642 15.4589 17.6345C16.7132 16.6675 17.9993 15.676 19.0617 14.4797C20.3508 13.0281 21.25 11.3344 21.25 9.13701C21.25 6.98614 20.0346 5.18243 18.3756 4.4241C16.7639 3.68739 14.5983 3.88249 12.5404 6.02065C12.399 6.16754 12.2039 6.25054 12 6.25054C11.7961 6.25054 11.601 6.16754 11.4596 6.02065C9.40166 3.88249 7.23607 3.68739 5.62436 4.4241ZM12 4.45873C9.68795 2.39015 7.09896 2.10078 5.00076 3.05987C2.78471 4.07283 1.25 6.42494 1.25 9.13701C1.25 11.8025 2.3605 13.836 3.81672 15.4757C4.98287 16.7888 6.41022 17.8879 7.67083 18.8585C7.95659 19.0785 8.23378 19.292 8.49742 19.4998C9.00965 19.9036 9.55954 20.3342 10.1168 20.6598C10.6739 20.9853 11.3096 21.2499 12 21.2499C12.6904 21.2499 13.3261 20.9853 13.8832 20.6598C14.4405 20.3342 14.9903 19.9036 15.5026 19.4998C15.7662 19.292 16.0434 19.0785 16.3292 18.8585C17.5898 17.8879 19.0171 16.7888 20.1833 15.4757C21.6395 13.836 22.75 11.8025 22.75 9.13701C22.75 6.42494 21.2153 4.07283 18.9992 3.05987C16.901 2.10078 14.3121 2.39015 12 4.45873Z" fill="#202020"/></svg>
					</a>
					<a href="" class="card-imovel">
						<figure>
							<img data-src="<?php echo base_url(); ?>assets/site/img/imovel.jpg" class="lazy lazy-cover" alt="Titulo">
							<small class="flag">Cód. 564622</small>
						</figure>

						<span class="imovel-text">
							<h3><strong>Nova Petrópolis</strong> <span>São Bernardo do Campo</span></h3>

							<ul>
								<li>
									<svg fill="#202020" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,12.184V4a1,1,0,0,0-2,0V5H5V4A1,1,0,0,0,3,4v8.184A3,3,0,0,0,1,15v5a1,1,0,0,0,2,0V19H21v1a1,1,0,0,0,2,0V15A3,3,0,0,0,21,12.184ZM19,12H18V10a1,1,0,0,0-1-1H7a1,1,0,0,0-1,1v2H5V7H19ZM8,12V11h3v1Zm5-1h3v1H13ZM3,15a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1v2H3Z"/></svg>
									<span>3 quartos</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5605 6.75L23.0305 4.28C23.1002 4.21044 23.1555 4.12782 23.1932 4.03688C23.2309 3.94593 23.2503 3.84845 23.2503 3.75C23.2503 3.65155 23.2309 3.55407 23.1932 3.46312C23.1555 3.37218 23.1002 3.28956 23.0305 3.22L20.6709 0.860352" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.75 23.25V5.25C3.75 4.85218 3.90804 4.47064 4.18934 4.18934C4.47064 3.90804 4.85218 3.75 5.25 3.75C5.25 3.75 16.7311 3.75 23 3.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M0.75 20.561L3.22 23.03C3.28965 23.0997 3.37235 23.155 3.46338 23.1927C3.5544 23.2304 3.65197 23.2498 3.7505 23.2498C3.84903 23.2498 3.9466 23.2304 4.03762 23.1927C4.12865 23.155 4.21135 23.0997 4.281 23.03L6.75 20.56" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.75 23.25C22.1478 23.25 22.5294 23.092 22.8107 22.8107C23.092 22.5294 23.25 22.1478 23.25 21.75" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.75 23.25H17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.25 23.25H12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.75 23.25H8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 18.75V17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 14.25V12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 9.75V8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>165m²</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>2 vagas</span>
								</li>
							</ul>

							<span class="va-code">
								<span class="va">R$ 2.650.000</span>
								<span class="code">Detalhes <svg fill="#f27321" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.2928932,7 L11.5,7 C11.2238576,7 11,6.77614237 11,6.5 C11,6.22385763 11.2238576,6 11.5,6 L17.5,6 C17.7761424,6 18,6.22385763 18,6.5 L18,12.5 C18,12.7761424 17.7761424,13 17.5,13 C17.2238576,13 17,12.7761424 17,12.5 L17,7.70710678 L6.85355339,17.8535534 C6.65829124,18.0488155 6.34170876,18.0488155 6.14644661,17.8535534 C5.95118446,17.6582912 5.95118446,17.3417088 6.14644661,17.1464466 L16.2928932,7 Z"/></svg></span>
							</span>
						</span>
					</a>
				</div>

				<div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3 box-imovel">
					<a href="" class="fav">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.62436 4.4241C3.96537 5.18243 2.75 6.98614 2.75 9.13701C2.75 11.3344 3.64922 13.0281 4.93829 14.4797C6.00072 15.676 7.28684 16.6675 8.54113 17.6345C8.83904 17.8642 9.13515 18.0925 9.42605 18.3218C9.95208 18.7365 10.4213 19.1004 10.8736 19.3647C11.3261 19.6292 11.6904 19.7499 12 19.7499C12.3096 19.7499 12.6739 19.6292 13.1264 19.3647C13.5787 19.1004 14.0479 18.7365 14.574 18.3218C14.8649 18.0925 15.161 17.8642 15.4589 17.6345C16.7132 16.6675 17.9993 15.676 19.0617 14.4797C20.3508 13.0281 21.25 11.3344 21.25 9.13701C21.25 6.98614 20.0346 5.18243 18.3756 4.4241C16.7639 3.68739 14.5983 3.88249 12.5404 6.02065C12.399 6.16754 12.2039 6.25054 12 6.25054C11.7961 6.25054 11.601 6.16754 11.4596 6.02065C9.40166 3.88249 7.23607 3.68739 5.62436 4.4241ZM12 4.45873C9.68795 2.39015 7.09896 2.10078 5.00076 3.05987C2.78471 4.07283 1.25 6.42494 1.25 9.13701C1.25 11.8025 2.3605 13.836 3.81672 15.4757C4.98287 16.7888 6.41022 17.8879 7.67083 18.8585C7.95659 19.0785 8.23378 19.292 8.49742 19.4998C9.00965 19.9036 9.55954 20.3342 10.1168 20.6598C10.6739 20.9853 11.3096 21.2499 12 21.2499C12.6904 21.2499 13.3261 20.9853 13.8832 20.6598C14.4405 20.3342 14.9903 19.9036 15.5026 19.4998C15.7662 19.292 16.0434 19.0785 16.3292 18.8585C17.5898 17.8879 19.0171 16.7888 20.1833 15.4757C21.6395 13.836 22.75 11.8025 22.75 9.13701C22.75 6.42494 21.2153 4.07283 18.9992 3.05987C16.901 2.10078 14.3121 2.39015 12 4.45873Z" fill="#202020"/></svg>
					</a>
					<a href="" class="card-imovel">
						<figure>
							<img data-src="<?php echo base_url(); ?>assets/site/img/imovel.jpg" class="lazy lazy-cover" alt="Titulo">
							<small class="flag">Cód. 564622</small>
						</figure>

						<span class="imovel-text">
							<h3><strong>Nova Petrópolis</strong> <span>São Bernardo do Campo</span></h3>

							<ul>
								<li>
									<svg fill="#202020" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,12.184V4a1,1,0,0,0-2,0V5H5V4A1,1,0,0,0,3,4v8.184A3,3,0,0,0,1,15v5a1,1,0,0,0,2,0V19H21v1a1,1,0,0,0,2,0V15A3,3,0,0,0,21,12.184ZM19,12H18V10a1,1,0,0,0-1-1H7a1,1,0,0,0-1,1v2H5V7H19ZM8,12V11h3v1Zm5-1h3v1H13ZM3,15a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1v2H3Z"/></svg>
									<span>3 quartos</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5605 6.75L23.0305 4.28C23.1002 4.21044 23.1555 4.12782 23.1932 4.03688C23.2309 3.94593 23.2503 3.84845 23.2503 3.75C23.2503 3.65155 23.2309 3.55407 23.1932 3.46312C23.1555 3.37218 23.1002 3.28956 23.0305 3.22L20.6709 0.860352" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.75 23.25V5.25C3.75 4.85218 3.90804 4.47064 4.18934 4.18934C4.47064 3.90804 4.85218 3.75 5.25 3.75C5.25 3.75 16.7311 3.75 23 3.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M0.75 20.561L3.22 23.03C3.28965 23.0997 3.37235 23.155 3.46338 23.1927C3.5544 23.2304 3.65197 23.2498 3.7505 23.2498C3.84903 23.2498 3.9466 23.2304 4.03762 23.1927C4.12865 23.155 4.21135 23.0997 4.281 23.03L6.75 20.56" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.75 23.25C22.1478 23.25 22.5294 23.092 22.8107 22.8107C23.092 22.5294 23.25 22.1478 23.25 21.75" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.75 23.25H17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.25 23.25H12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.75 23.25H8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 18.75V17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 14.25V12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 9.75V8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>165m²</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>2 vagas</span>
								</li>
							</ul>

							<span class="va-code">
								<span class="va">R$ 2.650.000</span>
								<span class="code">Detalhes <svg fill="#f27321" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.2928932,7 L11.5,7 C11.2238576,7 11,6.77614237 11,6.5 C11,6.22385763 11.2238576,6 11.5,6 L17.5,6 C17.7761424,6 18,6.22385763 18,6.5 L18,12.5 C18,12.7761424 17.7761424,13 17.5,13 C17.2238576,13 17,12.7761424 17,12.5 L17,7.70710678 L6.85355339,17.8535534 C6.65829124,18.0488155 6.34170876,18.0488155 6.14644661,17.8535534 C5.95118446,17.6582912 5.95118446,17.3417088 6.14644661,17.1464466 L16.2928932,7 Z"/></svg></span>
							</span>
						</span>
					</a>
				</div>

				<div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3 box-imovel">
					<a href="" class="fav">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.62436 4.4241C3.96537 5.18243 2.75 6.98614 2.75 9.13701C2.75 11.3344 3.64922 13.0281 4.93829 14.4797C6.00072 15.676 7.28684 16.6675 8.54113 17.6345C8.83904 17.8642 9.13515 18.0925 9.42605 18.3218C9.95208 18.7365 10.4213 19.1004 10.8736 19.3647C11.3261 19.6292 11.6904 19.7499 12 19.7499C12.3096 19.7499 12.6739 19.6292 13.1264 19.3647C13.5787 19.1004 14.0479 18.7365 14.574 18.3218C14.8649 18.0925 15.161 17.8642 15.4589 17.6345C16.7132 16.6675 17.9993 15.676 19.0617 14.4797C20.3508 13.0281 21.25 11.3344 21.25 9.13701C21.25 6.98614 20.0346 5.18243 18.3756 4.4241C16.7639 3.68739 14.5983 3.88249 12.5404 6.02065C12.399 6.16754 12.2039 6.25054 12 6.25054C11.7961 6.25054 11.601 6.16754 11.4596 6.02065C9.40166 3.88249 7.23607 3.68739 5.62436 4.4241ZM12 4.45873C9.68795 2.39015 7.09896 2.10078 5.00076 3.05987C2.78471 4.07283 1.25 6.42494 1.25 9.13701C1.25 11.8025 2.3605 13.836 3.81672 15.4757C4.98287 16.7888 6.41022 17.8879 7.67083 18.8585C7.95659 19.0785 8.23378 19.292 8.49742 19.4998C9.00965 19.9036 9.55954 20.3342 10.1168 20.6598C10.6739 20.9853 11.3096 21.2499 12 21.2499C12.6904 21.2499 13.3261 20.9853 13.8832 20.6598C14.4405 20.3342 14.9903 19.9036 15.5026 19.4998C15.7662 19.292 16.0434 19.0785 16.3292 18.8585C17.5898 17.8879 19.0171 16.7888 20.1833 15.4757C21.6395 13.836 22.75 11.8025 22.75 9.13701C22.75 6.42494 21.2153 4.07283 18.9992 3.05987C16.901 2.10078 14.3121 2.39015 12 4.45873Z" fill="#202020"/></svg>
					</a>
					<a href="" class="card-imovel">
						<figure>
							<img data-src="<?php echo base_url(); ?>assets/site/img/imovel.jpg" class="lazy lazy-cover" alt="Titulo">
							<small class="flag">Cód. 564622</small>
						</figure>

						<span class="imovel-text">
							<h3><strong>Nova Petrópolis</strong> <span>São Bernardo do Campo</span></h3>

							<ul>
								<li>
									<svg fill="#202020" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,12.184V4a1,1,0,0,0-2,0V5H5V4A1,1,0,0,0,3,4v8.184A3,3,0,0,0,1,15v5a1,1,0,0,0,2,0V19H21v1a1,1,0,0,0,2,0V15A3,3,0,0,0,21,12.184ZM19,12H18V10a1,1,0,0,0-1-1H7a1,1,0,0,0-1,1v2H5V7H19ZM8,12V11h3v1Zm5-1h3v1H13ZM3,15a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1v2H3Z"/></svg>
									<span>3 quartos</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5605 6.75L23.0305 4.28C23.1002 4.21044 23.1555 4.12782 23.1932 4.03688C23.2309 3.94593 23.2503 3.84845 23.2503 3.75C23.2503 3.65155 23.2309 3.55407 23.1932 3.46312C23.1555 3.37218 23.1002 3.28956 23.0305 3.22L20.6709 0.860352" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.75 23.25V5.25C3.75 4.85218 3.90804 4.47064 4.18934 4.18934C4.47064 3.90804 4.85218 3.75 5.25 3.75C5.25 3.75 16.7311 3.75 23 3.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M0.75 20.561L3.22 23.03C3.28965 23.0997 3.37235 23.155 3.46338 23.1927C3.5544 23.2304 3.65197 23.2498 3.7505 23.2498C3.84903 23.2498 3.9466 23.2304 4.03762 23.1927C4.12865 23.155 4.21135 23.0997 4.281 23.03L6.75 20.56" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.75 23.25C22.1478 23.25 22.5294 23.092 22.8107 22.8107C23.092 22.5294 23.25 22.1478 23.25 21.75" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.75 23.25H17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.25 23.25H12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.75 23.25H8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 18.75V17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 14.25V12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 9.75V8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>165m²</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>2 vagas</span>
								</li>
							</ul>

							<span class="va-code">
								<span class="va">R$ 2.650.000</span>
								<span class="code">Detalhes <svg fill="#f27321" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.2928932,7 L11.5,7 C11.2238576,7 11,6.77614237 11,6.5 C11,6.22385763 11.2238576,6 11.5,6 L17.5,6 C17.7761424,6 18,6.22385763 18,6.5 L18,12.5 C18,12.7761424 17.7761424,13 17.5,13 C17.2238576,13 17,12.7761424 17,12.5 L17,7.70710678 L6.85355339,17.8535534 C6.65829124,18.0488155 6.34170876,18.0488155 6.14644661,17.8535534 C5.95118446,17.6582912 5.95118446,17.3417088 6.14644661,17.1464466 L16.2928932,7 Z"/></svg></span>
							</span>
						</span>
					</a>
				</div>

				<div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3 box-imovel">
					<a href="" class="fav">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.62436 4.4241C3.96537 5.18243 2.75 6.98614 2.75 9.13701C2.75 11.3344 3.64922 13.0281 4.93829 14.4797C6.00072 15.676 7.28684 16.6675 8.54113 17.6345C8.83904 17.8642 9.13515 18.0925 9.42605 18.3218C9.95208 18.7365 10.4213 19.1004 10.8736 19.3647C11.3261 19.6292 11.6904 19.7499 12 19.7499C12.3096 19.7499 12.6739 19.6292 13.1264 19.3647C13.5787 19.1004 14.0479 18.7365 14.574 18.3218C14.8649 18.0925 15.161 17.8642 15.4589 17.6345C16.7132 16.6675 17.9993 15.676 19.0617 14.4797C20.3508 13.0281 21.25 11.3344 21.25 9.13701C21.25 6.98614 20.0346 5.18243 18.3756 4.4241C16.7639 3.68739 14.5983 3.88249 12.5404 6.02065C12.399 6.16754 12.2039 6.25054 12 6.25054C11.7961 6.25054 11.601 6.16754 11.4596 6.02065C9.40166 3.88249 7.23607 3.68739 5.62436 4.4241ZM12 4.45873C9.68795 2.39015 7.09896 2.10078 5.00076 3.05987C2.78471 4.07283 1.25 6.42494 1.25 9.13701C1.25 11.8025 2.3605 13.836 3.81672 15.4757C4.98287 16.7888 6.41022 17.8879 7.67083 18.8585C7.95659 19.0785 8.23378 19.292 8.49742 19.4998C9.00965 19.9036 9.55954 20.3342 10.1168 20.6598C10.6739 20.9853 11.3096 21.2499 12 21.2499C12.6904 21.2499 13.3261 20.9853 13.8832 20.6598C14.4405 20.3342 14.9903 19.9036 15.5026 19.4998C15.7662 19.292 16.0434 19.0785 16.3292 18.8585C17.5898 17.8879 19.0171 16.7888 20.1833 15.4757C21.6395 13.836 22.75 11.8025 22.75 9.13701C22.75 6.42494 21.2153 4.07283 18.9992 3.05987C16.901 2.10078 14.3121 2.39015 12 4.45873Z" fill="#202020"/></svg>
					</a>
					<a href="" class="card-imovel">
						<figure>
							<img data-src="<?php echo base_url(); ?>assets/site/img/imovel.jpg" class="lazy lazy-cover" alt="Titulo">
							<small class="flag">Cód. 564622</small>
						</figure>

						<span class="imovel-text">
							<h3><strong>Nova Petrópolis</strong> <span>São Bernardo do Campo</span></h3>

							<ul>
								<li>
									<svg fill="#202020" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,12.184V4a1,1,0,0,0-2,0V5H5V4A1,1,0,0,0,3,4v8.184A3,3,0,0,0,1,15v5a1,1,0,0,0,2,0V19H21v1a1,1,0,0,0,2,0V15A3,3,0,0,0,21,12.184ZM19,12H18V10a1,1,0,0,0-1-1H7a1,1,0,0,0-1,1v2H5V7H19ZM8,12V11h3v1Zm5-1h3v1H13ZM3,15a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1v2H3Z"/></svg>
									<span>3 quartos</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5605 6.75L23.0305 4.28C23.1002 4.21044 23.1555 4.12782 23.1932 4.03688C23.2309 3.94593 23.2503 3.84845 23.2503 3.75C23.2503 3.65155 23.2309 3.55407 23.1932 3.46312C23.1555 3.37218 23.1002 3.28956 23.0305 3.22L20.6709 0.860352" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.75 23.25V5.25C3.75 4.85218 3.90804 4.47064 4.18934 4.18934C4.47064 3.90804 4.85218 3.75 5.25 3.75C5.25 3.75 16.7311 3.75 23 3.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M0.75 20.561L3.22 23.03C3.28965 23.0997 3.37235 23.155 3.46338 23.1927C3.5544 23.2304 3.65197 23.2498 3.7505 23.2498C3.84903 23.2498 3.9466 23.2304 4.03762 23.1927C4.12865 23.155 4.21135 23.0997 4.281 23.03L6.75 20.56" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.75 23.25C22.1478 23.25 22.5294 23.092 22.8107 22.8107C23.092 22.5294 23.25 22.1478 23.25 21.75" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.75 23.25H17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.25 23.25H12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.75 23.25H8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 18.75V17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 14.25V12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 9.75V8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>165m²</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>2 vagas</span>
								</li>
							</ul>

							<span class="va-code">
								<span class="va">R$ 2.650.000</span>
								<span class="code">Detalhes <svg fill="#f27321" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.2928932,7 L11.5,7 C11.2238576,7 11,6.77614237 11,6.5 C11,6.22385763 11.2238576,6 11.5,6 L17.5,6 C17.7761424,6 18,6.22385763 18,6.5 L18,12.5 C18,12.7761424 17.7761424,13 17.5,13 C17.2238576,13 17,12.7761424 17,12.5 L17,7.70710678 L6.85355339,17.8535534 C6.65829124,18.0488155 6.34170876,18.0488155 6.14644661,17.8535534 C5.95118446,17.6582912 5.95118446,17.3417088 6.14644661,17.1464466 L16.2928932,7 Z"/></svg></span>
							</span>
						</span>
					</a>
				</div>

				<div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3 box-imovel">
					<a href="" class="fav">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.62436 4.4241C3.96537 5.18243 2.75 6.98614 2.75 9.13701C2.75 11.3344 3.64922 13.0281 4.93829 14.4797C6.00072 15.676 7.28684 16.6675 8.54113 17.6345C8.83904 17.8642 9.13515 18.0925 9.42605 18.3218C9.95208 18.7365 10.4213 19.1004 10.8736 19.3647C11.3261 19.6292 11.6904 19.7499 12 19.7499C12.3096 19.7499 12.6739 19.6292 13.1264 19.3647C13.5787 19.1004 14.0479 18.7365 14.574 18.3218C14.8649 18.0925 15.161 17.8642 15.4589 17.6345C16.7132 16.6675 17.9993 15.676 19.0617 14.4797C20.3508 13.0281 21.25 11.3344 21.25 9.13701C21.25 6.98614 20.0346 5.18243 18.3756 4.4241C16.7639 3.68739 14.5983 3.88249 12.5404 6.02065C12.399 6.16754 12.2039 6.25054 12 6.25054C11.7961 6.25054 11.601 6.16754 11.4596 6.02065C9.40166 3.88249 7.23607 3.68739 5.62436 4.4241ZM12 4.45873C9.68795 2.39015 7.09896 2.10078 5.00076 3.05987C2.78471 4.07283 1.25 6.42494 1.25 9.13701C1.25 11.8025 2.3605 13.836 3.81672 15.4757C4.98287 16.7888 6.41022 17.8879 7.67083 18.8585C7.95659 19.0785 8.23378 19.292 8.49742 19.4998C9.00965 19.9036 9.55954 20.3342 10.1168 20.6598C10.6739 20.9853 11.3096 21.2499 12 21.2499C12.6904 21.2499 13.3261 20.9853 13.8832 20.6598C14.4405 20.3342 14.9903 19.9036 15.5026 19.4998C15.7662 19.292 16.0434 19.0785 16.3292 18.8585C17.5898 17.8879 19.0171 16.7888 20.1833 15.4757C21.6395 13.836 22.75 11.8025 22.75 9.13701C22.75 6.42494 21.2153 4.07283 18.9992 3.05987C16.901 2.10078 14.3121 2.39015 12 4.45873Z" fill="#202020"/></svg>
					</a>
					<a href="" class="card-imovel">
						<figure>
							<img data-src="<?php echo base_url(); ?>assets/site/img/imovel.jpg" class="lazy lazy-cover" alt="Titulo">
							<small class="flag">Cód. 564622</small>
						</figure>

						<span class="imovel-text">
							<h3><strong>Nova Petrópolis</strong> <span>São Bernardo do Campo</span></h3>

							<ul>
								<li>
									<svg fill="#202020" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,12.184V4a1,1,0,0,0-2,0V5H5V4A1,1,0,0,0,3,4v8.184A3,3,0,0,0,1,15v5a1,1,0,0,0,2,0V19H21v1a1,1,0,0,0,2,0V15A3,3,0,0,0,21,12.184ZM19,12H18V10a1,1,0,0,0-1-1H7a1,1,0,0,0-1,1v2H5V7H19ZM8,12V11h3v1Zm5-1h3v1H13ZM3,15a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1v2H3Z"/></svg>
									<span>3 quartos</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5605 6.75L23.0305 4.28C23.1002 4.21044 23.1555 4.12782 23.1932 4.03688C23.2309 3.94593 23.2503 3.84845 23.2503 3.75C23.2503 3.65155 23.2309 3.55407 23.1932 3.46312C23.1555 3.37218 23.1002 3.28956 23.0305 3.22L20.6709 0.860352" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.75 23.25V5.25C3.75 4.85218 3.90804 4.47064 4.18934 4.18934C4.47064 3.90804 4.85218 3.75 5.25 3.75C5.25 3.75 16.7311 3.75 23 3.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M0.75 20.561L3.22 23.03C3.28965 23.0997 3.37235 23.155 3.46338 23.1927C3.5544 23.2304 3.65197 23.2498 3.7505 23.2498C3.84903 23.2498 3.9466 23.2304 4.03762 23.1927C4.12865 23.155 4.21135 23.0997 4.281 23.03L6.75 20.56" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.75 23.25C22.1478 23.25 22.5294 23.092 22.8107 22.8107C23.092 22.5294 23.25 22.1478 23.25 21.75" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.75 23.25H17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.25 23.25H12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.75 23.25H8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 18.75V17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 14.25V12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 9.75V8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>165m²</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>2 vagas</span>
								</li>
							</ul>

							<span class="va-code">
								<span class="va">R$ 2.650.000</span>
								<span class="code">Detalhes <svg fill="#f27321" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.2928932,7 L11.5,7 C11.2238576,7 11,6.77614237 11,6.5 C11,6.22385763 11.2238576,6 11.5,6 L17.5,6 C17.7761424,6 18,6.22385763 18,6.5 L18,12.5 C18,12.7761424 17.7761424,13 17.5,13 C17.2238576,13 17,12.7761424 17,12.5 L17,7.70710678 L6.85355339,17.8535534 C6.65829124,18.0488155 6.34170876,18.0488155 6.14644661,17.8535534 C5.95118446,17.6582912 5.95118446,17.3417088 6.14644661,17.1464466 L16.2928932,7 Z"/></svg></span>
							</span>
						</span>
					</a>
				</div>

				<div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3 box-imovel">
					<a href="" class="fav">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.62436 4.4241C3.96537 5.18243 2.75 6.98614 2.75 9.13701C2.75 11.3344 3.64922 13.0281 4.93829 14.4797C6.00072 15.676 7.28684 16.6675 8.54113 17.6345C8.83904 17.8642 9.13515 18.0925 9.42605 18.3218C9.95208 18.7365 10.4213 19.1004 10.8736 19.3647C11.3261 19.6292 11.6904 19.7499 12 19.7499C12.3096 19.7499 12.6739 19.6292 13.1264 19.3647C13.5787 19.1004 14.0479 18.7365 14.574 18.3218C14.8649 18.0925 15.161 17.8642 15.4589 17.6345C16.7132 16.6675 17.9993 15.676 19.0617 14.4797C20.3508 13.0281 21.25 11.3344 21.25 9.13701C21.25 6.98614 20.0346 5.18243 18.3756 4.4241C16.7639 3.68739 14.5983 3.88249 12.5404 6.02065C12.399 6.16754 12.2039 6.25054 12 6.25054C11.7961 6.25054 11.601 6.16754 11.4596 6.02065C9.40166 3.88249 7.23607 3.68739 5.62436 4.4241ZM12 4.45873C9.68795 2.39015 7.09896 2.10078 5.00076 3.05987C2.78471 4.07283 1.25 6.42494 1.25 9.13701C1.25 11.8025 2.3605 13.836 3.81672 15.4757C4.98287 16.7888 6.41022 17.8879 7.67083 18.8585C7.95659 19.0785 8.23378 19.292 8.49742 19.4998C9.00965 19.9036 9.55954 20.3342 10.1168 20.6598C10.6739 20.9853 11.3096 21.2499 12 21.2499C12.6904 21.2499 13.3261 20.9853 13.8832 20.6598C14.4405 20.3342 14.9903 19.9036 15.5026 19.4998C15.7662 19.292 16.0434 19.0785 16.3292 18.8585C17.5898 17.8879 19.0171 16.7888 20.1833 15.4757C21.6395 13.836 22.75 11.8025 22.75 9.13701C22.75 6.42494 21.2153 4.07283 18.9992 3.05987C16.901 2.10078 14.3121 2.39015 12 4.45873Z" fill="#202020"/></svg>
					</a>
					<a href="" class="card-imovel">
						<figure>
							<img data-src="<?php echo base_url(); ?>assets/site/img/imovel.jpg" class="lazy lazy-cover" alt="Titulo">
							<small class="flag">Cód. 564622</small>
						</figure>

						<span class="imovel-text">
							<h3><strong>Nova Petrópolis</strong> <span>São Bernardo do Campo</span></h3>

							<ul>
								<li>
									<svg fill="#202020" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,12.184V4a1,1,0,0,0-2,0V5H5V4A1,1,0,0,0,3,4v8.184A3,3,0,0,0,1,15v5a1,1,0,0,0,2,0V19H21v1a1,1,0,0,0,2,0V15A3,3,0,0,0,21,12.184ZM19,12H18V10a1,1,0,0,0-1-1H7a1,1,0,0,0-1,1v2H5V7H19ZM8,12V11h3v1Zm5-1h3v1H13ZM3,15a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1v2H3Z"/></svg>
									<span>3 quartos</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5605 6.75L23.0305 4.28C23.1002 4.21044 23.1555 4.12782 23.1932 4.03688C23.2309 3.94593 23.2503 3.84845 23.2503 3.75C23.2503 3.65155 23.2309 3.55407 23.1932 3.46312C23.1555 3.37218 23.1002 3.28956 23.0305 3.22L20.6709 0.860352" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.75 23.25V5.25C3.75 4.85218 3.90804 4.47064 4.18934 4.18934C4.47064 3.90804 4.85218 3.75 5.25 3.75C5.25 3.75 16.7311 3.75 23 3.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M0.75 20.561L3.22 23.03C3.28965 23.0997 3.37235 23.155 3.46338 23.1927C3.5544 23.2304 3.65197 23.2498 3.7505 23.2498C3.84903 23.2498 3.9466 23.2304 4.03762 23.1927C4.12865 23.155 4.21135 23.0997 4.281 23.03L6.75 20.56" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.75 23.25C22.1478 23.25 22.5294 23.092 22.8107 22.8107C23.092 22.5294 23.25 22.1478 23.25 21.75" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.75 23.25H17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.25 23.25H12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.75 23.25H8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 18.75V17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 14.25V12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 9.75V8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>165m²</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>2 vagas</span>
								</li>
							</ul>

							<span class="va-code">
								<span class="va">R$ 2.650.000</span>
								<span class="code">Detalhes <svg fill="#f27321" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.2928932,7 L11.5,7 C11.2238576,7 11,6.77614237 11,6.5 C11,6.22385763 11.2238576,6 11.5,6 L17.5,6 C17.7761424,6 18,6.22385763 18,6.5 L18,12.5 C18,12.7761424 17.7761424,13 17.5,13 C17.2238576,13 17,12.7761424 17,12.5 L17,7.70710678 L6.85355339,17.8535534 C6.65829124,18.0488155 6.34170876,18.0488155 6.14644661,17.8535534 C5.95118446,17.6582912 5.95118446,17.3417088 6.14644661,17.1464466 L16.2928932,7 Z"/></svg></span>
							</span>
						</span>
					</a>
				</div>

				<div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3 box-imovel">
					<a href="" class="fav">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.62436 4.4241C3.96537 5.18243 2.75 6.98614 2.75 9.13701C2.75 11.3344 3.64922 13.0281 4.93829 14.4797C6.00072 15.676 7.28684 16.6675 8.54113 17.6345C8.83904 17.8642 9.13515 18.0925 9.42605 18.3218C9.95208 18.7365 10.4213 19.1004 10.8736 19.3647C11.3261 19.6292 11.6904 19.7499 12 19.7499C12.3096 19.7499 12.6739 19.6292 13.1264 19.3647C13.5787 19.1004 14.0479 18.7365 14.574 18.3218C14.8649 18.0925 15.161 17.8642 15.4589 17.6345C16.7132 16.6675 17.9993 15.676 19.0617 14.4797C20.3508 13.0281 21.25 11.3344 21.25 9.13701C21.25 6.98614 20.0346 5.18243 18.3756 4.4241C16.7639 3.68739 14.5983 3.88249 12.5404 6.02065C12.399 6.16754 12.2039 6.25054 12 6.25054C11.7961 6.25054 11.601 6.16754 11.4596 6.02065C9.40166 3.88249 7.23607 3.68739 5.62436 4.4241ZM12 4.45873C9.68795 2.39015 7.09896 2.10078 5.00076 3.05987C2.78471 4.07283 1.25 6.42494 1.25 9.13701C1.25 11.8025 2.3605 13.836 3.81672 15.4757C4.98287 16.7888 6.41022 17.8879 7.67083 18.8585C7.95659 19.0785 8.23378 19.292 8.49742 19.4998C9.00965 19.9036 9.55954 20.3342 10.1168 20.6598C10.6739 20.9853 11.3096 21.2499 12 21.2499C12.6904 21.2499 13.3261 20.9853 13.8832 20.6598C14.4405 20.3342 14.9903 19.9036 15.5026 19.4998C15.7662 19.292 16.0434 19.0785 16.3292 18.8585C17.5898 17.8879 19.0171 16.7888 20.1833 15.4757C21.6395 13.836 22.75 11.8025 22.75 9.13701C22.75 6.42494 21.2153 4.07283 18.9992 3.05987C16.901 2.10078 14.3121 2.39015 12 4.45873Z" fill="#202020"/></svg>
					</a>
					<a href="" class="card-imovel">
						<figure>
							<img data-src="<?php echo base_url(); ?>assets/site/img/imovel.jpg" class="lazy lazy-cover" alt="Titulo">
							<small class="flag">Cód. 564622</small>
						</figure>

						<span class="imovel-text">
							<h3><strong>Nova Petrópolis</strong> <span>São Bernardo do Campo</span></h3>

							<ul>
								<li>
									<svg fill="#202020" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,12.184V4a1,1,0,0,0-2,0V5H5V4A1,1,0,0,0,3,4v8.184A3,3,0,0,0,1,15v5a1,1,0,0,0,2,0V19H21v1a1,1,0,0,0,2,0V15A3,3,0,0,0,21,12.184ZM19,12H18V10a1,1,0,0,0-1-1H7a1,1,0,0,0-1,1v2H5V7H19ZM8,12V11h3v1Zm5-1h3v1H13ZM3,15a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1v2H3Z"/></svg>
									<span>3 quartos</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5605 6.75L23.0305 4.28C23.1002 4.21044 23.1555 4.12782 23.1932 4.03688C23.2309 3.94593 23.2503 3.84845 23.2503 3.75C23.2503 3.65155 23.2309 3.55407 23.1932 3.46312C23.1555 3.37218 23.1002 3.28956 23.0305 3.22L20.6709 0.860352" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.75 23.25V5.25C3.75 4.85218 3.90804 4.47064 4.18934 4.18934C4.47064 3.90804 4.85218 3.75 5.25 3.75C5.25 3.75 16.7311 3.75 23 3.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M0.75 20.561L3.22 23.03C3.28965 23.0997 3.37235 23.155 3.46338 23.1927C3.5544 23.2304 3.65197 23.2498 3.7505 23.2498C3.84903 23.2498 3.9466 23.2304 4.03762 23.1927C4.12865 23.155 4.21135 23.0997 4.281 23.03L6.75 20.56" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.75 23.25C22.1478 23.25 22.5294 23.092 22.8107 22.8107C23.092 22.5294 23.25 22.1478 23.25 21.75" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.75 23.25H17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.25 23.25H12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.75 23.25H8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 18.75V17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 14.25V12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 9.75V8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>165m²</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>2 vagas</span>
								</li>
							</ul>

							<span class="va-code">
								<span class="va">R$ 2.650.000</span>
								<span class="code">Detalhes <svg fill="#f27321" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.2928932,7 L11.5,7 C11.2238576,7 11,6.77614237 11,6.5 C11,6.22385763 11.2238576,6 11.5,6 L17.5,6 C17.7761424,6 18,6.22385763 18,6.5 L18,12.5 C18,12.7761424 17.7761424,13 17.5,13 C17.2238576,13 17,12.7761424 17,12.5 L17,7.70710678 L6.85355339,17.8535534 C6.65829124,18.0488155 6.34170876,18.0488155 6.14644661,17.8535534 C5.95118446,17.6582912 5.95118446,17.3417088 6.14644661,17.1464466 L16.2928932,7 Z"/></svg></span>
							</span>
						</span>
					</a>
				</div>

				<div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3 box-imovel">
					<a href="" class="fav">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.62436 4.4241C3.96537 5.18243 2.75 6.98614 2.75 9.13701C2.75 11.3344 3.64922 13.0281 4.93829 14.4797C6.00072 15.676 7.28684 16.6675 8.54113 17.6345C8.83904 17.8642 9.13515 18.0925 9.42605 18.3218C9.95208 18.7365 10.4213 19.1004 10.8736 19.3647C11.3261 19.6292 11.6904 19.7499 12 19.7499C12.3096 19.7499 12.6739 19.6292 13.1264 19.3647C13.5787 19.1004 14.0479 18.7365 14.574 18.3218C14.8649 18.0925 15.161 17.8642 15.4589 17.6345C16.7132 16.6675 17.9993 15.676 19.0617 14.4797C20.3508 13.0281 21.25 11.3344 21.25 9.13701C21.25 6.98614 20.0346 5.18243 18.3756 4.4241C16.7639 3.68739 14.5983 3.88249 12.5404 6.02065C12.399 6.16754 12.2039 6.25054 12 6.25054C11.7961 6.25054 11.601 6.16754 11.4596 6.02065C9.40166 3.88249 7.23607 3.68739 5.62436 4.4241ZM12 4.45873C9.68795 2.39015 7.09896 2.10078 5.00076 3.05987C2.78471 4.07283 1.25 6.42494 1.25 9.13701C1.25 11.8025 2.3605 13.836 3.81672 15.4757C4.98287 16.7888 6.41022 17.8879 7.67083 18.8585C7.95659 19.0785 8.23378 19.292 8.49742 19.4998C9.00965 19.9036 9.55954 20.3342 10.1168 20.6598C10.6739 20.9853 11.3096 21.2499 12 21.2499C12.6904 21.2499 13.3261 20.9853 13.8832 20.6598C14.4405 20.3342 14.9903 19.9036 15.5026 19.4998C15.7662 19.292 16.0434 19.0785 16.3292 18.8585C17.5898 17.8879 19.0171 16.7888 20.1833 15.4757C21.6395 13.836 22.75 11.8025 22.75 9.13701C22.75 6.42494 21.2153 4.07283 18.9992 3.05987C16.901 2.10078 14.3121 2.39015 12 4.45873Z" fill="#202020"/></svg>
					</a>
					<a href="" class="card-imovel">
						<figure>
							<img data-src="<?php echo base_url(); ?>assets/site/img/imovel.jpg" class="lazy lazy-cover" alt="Titulo">
							<small class="flag">Cód. 564622</small>
						</figure>

						<span class="imovel-text">
							<h3><strong>Nova Petrópolis</strong> <span>São Bernardo do Campo</span></h3>

							<ul>
								<li>
									<svg fill="#202020" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,12.184V4a1,1,0,0,0-2,0V5H5V4A1,1,0,0,0,3,4v8.184A3,3,0,0,0,1,15v5a1,1,0,0,0,2,0V19H21v1a1,1,0,0,0,2,0V15A3,3,0,0,0,21,12.184ZM19,12H18V10a1,1,0,0,0-1-1H7a1,1,0,0,0-1,1v2H5V7H19ZM8,12V11h3v1Zm5-1h3v1H13ZM3,15a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1v2H3Z"/></svg>
									<span>3 quartos</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5605 6.75L23.0305 4.28C23.1002 4.21044 23.1555 4.12782 23.1932 4.03688C23.2309 3.94593 23.2503 3.84845 23.2503 3.75C23.2503 3.65155 23.2309 3.55407 23.1932 3.46312C23.1555 3.37218 23.1002 3.28956 23.0305 3.22L20.6709 0.860352" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.75 23.25V5.25C3.75 4.85218 3.90804 4.47064 4.18934 4.18934C4.47064 3.90804 4.85218 3.75 5.25 3.75C5.25 3.75 16.7311 3.75 23 3.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M0.75 20.561L3.22 23.03C3.28965 23.0997 3.37235 23.155 3.46338 23.1927C3.5544 23.2304 3.65197 23.2498 3.7505 23.2498C3.84903 23.2498 3.9466 23.2304 4.03762 23.1927C4.12865 23.155 4.21135 23.0997 4.281 23.03L6.75 20.56" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.75 23.25C22.1478 23.25 22.5294 23.092 22.8107 22.8107C23.092 22.5294 23.25 22.1478 23.25 21.75" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.75 23.25H17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.25 23.25H12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.75 23.25H8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 18.75V17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 14.25V12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 9.75V8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>165m²</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>2 vagas</span>
								</li>
							</ul>

							<span class="va-code">
								<span class="va">R$ 2.650.000</span>
								<span class="code">Detalhes <svg fill="#f27321" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.2928932,7 L11.5,7 C11.2238576,7 11,6.77614237 11,6.5 C11,6.22385763 11.2238576,6 11.5,6 L17.5,6 C17.7761424,6 18,6.22385763 18,6.5 L18,12.5 C18,12.7761424 17.7761424,13 17.5,13 C17.2238576,13 17,12.7761424 17,12.5 L17,7.70710678 L6.85355339,17.8535534 C6.65829124,18.0488155 6.34170876,18.0488155 6.14644661,17.8535534 C5.95118446,17.6582912 5.95118446,17.3417088 6.14644661,17.1464466 L16.2928932,7 Z"/></svg></span>
							</span>
						</span>
					</a>
				</div>

				<div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3 box-imovel">
					<a href="" class="fav">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.62436 4.4241C3.96537 5.18243 2.75 6.98614 2.75 9.13701C2.75 11.3344 3.64922 13.0281 4.93829 14.4797C6.00072 15.676 7.28684 16.6675 8.54113 17.6345C8.83904 17.8642 9.13515 18.0925 9.42605 18.3218C9.95208 18.7365 10.4213 19.1004 10.8736 19.3647C11.3261 19.6292 11.6904 19.7499 12 19.7499C12.3096 19.7499 12.6739 19.6292 13.1264 19.3647C13.5787 19.1004 14.0479 18.7365 14.574 18.3218C14.8649 18.0925 15.161 17.8642 15.4589 17.6345C16.7132 16.6675 17.9993 15.676 19.0617 14.4797C20.3508 13.0281 21.25 11.3344 21.25 9.13701C21.25 6.98614 20.0346 5.18243 18.3756 4.4241C16.7639 3.68739 14.5983 3.88249 12.5404 6.02065C12.399 6.16754 12.2039 6.25054 12 6.25054C11.7961 6.25054 11.601 6.16754 11.4596 6.02065C9.40166 3.88249 7.23607 3.68739 5.62436 4.4241ZM12 4.45873C9.68795 2.39015 7.09896 2.10078 5.00076 3.05987C2.78471 4.07283 1.25 6.42494 1.25 9.13701C1.25 11.8025 2.3605 13.836 3.81672 15.4757C4.98287 16.7888 6.41022 17.8879 7.67083 18.8585C7.95659 19.0785 8.23378 19.292 8.49742 19.4998C9.00965 19.9036 9.55954 20.3342 10.1168 20.6598C10.6739 20.9853 11.3096 21.2499 12 21.2499C12.6904 21.2499 13.3261 20.9853 13.8832 20.6598C14.4405 20.3342 14.9903 19.9036 15.5026 19.4998C15.7662 19.292 16.0434 19.0785 16.3292 18.8585C17.5898 17.8879 19.0171 16.7888 20.1833 15.4757C21.6395 13.836 22.75 11.8025 22.75 9.13701C22.75 6.42494 21.2153 4.07283 18.9992 3.05987C16.901 2.10078 14.3121 2.39015 12 4.45873Z" fill="#202020"/></svg>
					</a>
					<a href="" class="card-imovel">
						<figure>
							<img data-src="<?php echo base_url(); ?>assets/site/img/imovel.jpg" class="lazy lazy-cover" alt="Titulo">
							<small class="flag">Cód. 564622</small>
						</figure>

						<span class="imovel-text">
							<h3><strong>Nova Petrópolis</strong> <span>São Bernardo do Campo</span></h3>

							<ul>
								<li>
									<svg fill="#202020" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,12.184V4a1,1,0,0,0-2,0V5H5V4A1,1,0,0,0,3,4v8.184A3,3,0,0,0,1,15v5a1,1,0,0,0,2,0V19H21v1a1,1,0,0,0,2,0V15A3,3,0,0,0,21,12.184ZM19,12H18V10a1,1,0,0,0-1-1H7a1,1,0,0,0-1,1v2H5V7H19ZM8,12V11h3v1Zm5-1h3v1H13ZM3,15a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1v2H3Z"/></svg>
									<span>3 quartos</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5605 6.75L23.0305 4.28C23.1002 4.21044 23.1555 4.12782 23.1932 4.03688C23.2309 3.94593 23.2503 3.84845 23.2503 3.75C23.2503 3.65155 23.2309 3.55407 23.1932 3.46312C23.1555 3.37218 23.1002 3.28956 23.0305 3.22L20.6709 0.860352" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.75 23.25V5.25C3.75 4.85218 3.90804 4.47064 4.18934 4.18934C4.47064 3.90804 4.85218 3.75 5.25 3.75C5.25 3.75 16.7311 3.75 23 3.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M0.75 20.561L3.22 23.03C3.28965 23.0997 3.37235 23.155 3.46338 23.1927C3.5544 23.2304 3.65197 23.2498 3.7505 23.2498C3.84903 23.2498 3.9466 23.2304 4.03762 23.1927C4.12865 23.155 4.21135 23.0997 4.281 23.03L6.75 20.56" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.75 23.25C22.1478 23.25 22.5294 23.092 22.8107 22.8107C23.092 22.5294 23.25 22.1478 23.25 21.75" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.75 23.25H17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.25 23.25H12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.75 23.25H8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 18.75V17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 14.25V12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 9.75V8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>165m²</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>2 vagas</span>
								</li>
							</ul>

							<span class="va-code">
								<span class="va">R$ 2.650.000</span>
								<span class="code">Detalhes <svg fill="#f27321" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.2928932,7 L11.5,7 C11.2238576,7 11,6.77614237 11,6.5 C11,6.22385763 11.2238576,6 11.5,6 L17.5,6 C17.7761424,6 18,6.22385763 18,6.5 L18,12.5 C18,12.7761424 17.7761424,13 17.5,13 C17.2238576,13 17,12.7761424 17,12.5 L17,7.70710678 L6.85355339,17.8535534 C6.65829124,18.0488155 6.34170876,18.0488155 6.14644661,17.8535534 C5.95118446,17.6582912 5.95118446,17.3417088 6.14644661,17.1464466 L16.2928932,7 Z"/></svg></span>
							</span>
						</span>
					</a>
				</div>

				<div class="col-xl-3 col-lg-4 col-sm-6 col-12 my-3 box-imovel">
					<a href="" class="fav">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.62436 4.4241C3.96537 5.18243 2.75 6.98614 2.75 9.13701C2.75 11.3344 3.64922 13.0281 4.93829 14.4797C6.00072 15.676 7.28684 16.6675 8.54113 17.6345C8.83904 17.8642 9.13515 18.0925 9.42605 18.3218C9.95208 18.7365 10.4213 19.1004 10.8736 19.3647C11.3261 19.6292 11.6904 19.7499 12 19.7499C12.3096 19.7499 12.6739 19.6292 13.1264 19.3647C13.5787 19.1004 14.0479 18.7365 14.574 18.3218C14.8649 18.0925 15.161 17.8642 15.4589 17.6345C16.7132 16.6675 17.9993 15.676 19.0617 14.4797C20.3508 13.0281 21.25 11.3344 21.25 9.13701C21.25 6.98614 20.0346 5.18243 18.3756 4.4241C16.7639 3.68739 14.5983 3.88249 12.5404 6.02065C12.399 6.16754 12.2039 6.25054 12 6.25054C11.7961 6.25054 11.601 6.16754 11.4596 6.02065C9.40166 3.88249 7.23607 3.68739 5.62436 4.4241ZM12 4.45873C9.68795 2.39015 7.09896 2.10078 5.00076 3.05987C2.78471 4.07283 1.25 6.42494 1.25 9.13701C1.25 11.8025 2.3605 13.836 3.81672 15.4757C4.98287 16.7888 6.41022 17.8879 7.67083 18.8585C7.95659 19.0785 8.23378 19.292 8.49742 19.4998C9.00965 19.9036 9.55954 20.3342 10.1168 20.6598C10.6739 20.9853 11.3096 21.2499 12 21.2499C12.6904 21.2499 13.3261 20.9853 13.8832 20.6598C14.4405 20.3342 14.9903 19.9036 15.5026 19.4998C15.7662 19.292 16.0434 19.0785 16.3292 18.8585C17.5898 17.8879 19.0171 16.7888 20.1833 15.4757C21.6395 13.836 22.75 11.8025 22.75 9.13701C22.75 6.42494 21.2153 4.07283 18.9992 3.05987C16.901 2.10078 14.3121 2.39015 12 4.45873Z" fill="#202020"/></svg>
					</a>
					<a href="" class="card-imovel">
						<figure>
							<img data-src="<?php echo base_url(); ?>assets/site/img/imovel.jpg" class="lazy lazy-cover" alt="Titulo">
							<small class="flag">Cód. 564622</small>
						</figure>

						<span class="imovel-text">
							<h3><strong>Nova Petrópolis</strong> <span>São Bernardo do Campo</span></h3>

							<ul>
								<li>
									<svg fill="#202020" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,12.184V4a1,1,0,0,0-2,0V5H5V4A1,1,0,0,0,3,4v8.184A3,3,0,0,0,1,15v5a1,1,0,0,0,2,0V19H21v1a1,1,0,0,0,2,0V15A3,3,0,0,0,21,12.184ZM19,12H18V10a1,1,0,0,0-1-1H7a1,1,0,0,0-1,1v2H5V7H19ZM8,12V11h3v1Zm5-1h3v1H13ZM3,15a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1v2H3Z"/></svg>
									<span>3 quartos</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5605 6.75L23.0305 4.28C23.1002 4.21044 23.1555 4.12782 23.1932 4.03688C23.2309 3.94593 23.2503 3.84845 23.2503 3.75C23.2503 3.65155 23.2309 3.55407 23.1932 3.46312C23.1555 3.37218 23.1002 3.28956 23.0305 3.22L20.6709 0.860352" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.75 23.25V5.25C3.75 4.85218 3.90804 4.47064 4.18934 4.18934C4.47064 3.90804 4.85218 3.75 5.25 3.75C5.25 3.75 16.7311 3.75 23 3.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M0.75 20.561L3.22 23.03C3.28965 23.0997 3.37235 23.155 3.46338 23.1927C3.5544 23.2304 3.65197 23.2498 3.7505 23.2498C3.84903 23.2498 3.9466 23.2304 4.03762 23.1927C4.12865 23.155 4.21135 23.0997 4.281 23.03L6.75 20.56" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.75 23.25C22.1478 23.25 22.5294 23.092 22.8107 22.8107C23.092 22.5294 23.25 22.1478 23.25 21.75" stroke="#71717A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.75 23.25H17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.25 23.25H12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.75 23.25H8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 18.75V17.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 14.25V12.75" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M23.25 9.75V8.25" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>165m²</span>
								</li>
								<li>
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z" stroke="#202020" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
									<span>2 vagas</span>
								</li>
							</ul>

							<span class="va-code">
								<span class="va">R$ 2.650.000</span>
								<span class="code">Detalhes <svg fill="#f27321" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.2928932,7 L11.5,7 C11.2238576,7 11,6.77614237 11,6.5 C11,6.22385763 11.2238576,6 11.5,6 L17.5,6 C17.7761424,6 18,6.22385763 18,6.5 L18,12.5 C18,12.7761424 17.7761424,13 17.5,13 C17.2238576,13 17,12.7761424 17,12.5 L17,7.70710678 L6.85355339,17.8535534 C6.65829124,18.0488155 6.34170876,18.0488155 6.14644661,17.8535534 C5.95118446,17.6582912 5.95118446,17.3417088 6.14644661,17.1464466 L16.2928932,7 Z"/></svg></span>
							</span>
						</span>
					</a>
				</div>

				<div class="col-12 pg">
					<ul>
						<li><a href="javascript:void(0);">1</a></li>
						<li><a href="javascript:void(0);" class="active">2</a></li>
						<li><a href="javascript:void(0);">3</a></li>
						<li><a href="javascript:void(0);">4</a></li>
						<li><a href="javascript:void(0);">5</a></li>
						<li><a href="javascript:void(0);">6</a></li>
						<li><a href="javascript:void(0);">7</a></li>
						<li><a href="javascript:void(0);">8</a></li>
						<li><a href="javascript:void(0);">9</a></li>
						<li class="next"><a href="javascript:void(0);"><svg width="13" height="13" viewBox="0 0 192 144" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M160.015 64.1929L106.942 12.67L118.348 0.894287L192 72.3945L118.348 143.894L106.942 132.119L160.015 80.596H0V64.1929H160.015Z" fill="black"/></svg></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
    <!-- ################################ -->
    <!-- ################################ -->
<?php echo view('site/inc/rodape'); ?>